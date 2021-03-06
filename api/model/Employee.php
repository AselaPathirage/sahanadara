<?php
class Employee
{
    protected $connection;

    public function __construct($con)
    {
        $this->connection = $con;
    }
    public function checkAssigned($userId, $userRole)
    {
        global $errorCode;
        if ($userRole == 8) {
            $sql = "SELECT isAssigned FROM responsibleperson WHERE responsiblePersonID = $userId AND isAssigned='y'";
            $excute = $this->connection->query($sql);
            if ($excute->num_rows == 0) {
                echo json_encode(array("code" => $errorCode['userCreadentialWrong']));
                exit();
            }
        }
    }
    public function login(array $data)
    {
        global $errorCode;

        if ((!isset($data['username']) || (!isset($data['password'])))) {
            echo json_encode(array("code" => $errorCode['attributeMissing']));
            exit();
        }
        $username = md5(strtolower($data['username']));
        $usernameToCapital = md5(strtoupper($data['username']));
        $password = md5($data['password']);
        $sql = "SELECT l.empId,r.roleId,l.keyAuth FROM login l, role r WHERE (l.nid ='$username' or l.nid ='$usernameToCapital') AND l.empPassword ='$password' AND l.roleId = r.roleId";
        $excute = $this->connection->query($sql);

        if ($excute->num_rows > 0) {
            $secure = new Openssl_EncryptDecrypt();
            $data = $excute->fetch_assoc();
            $id = $data['empId'];
            $userRole = $data['roleId'];
            //$this->checkAssigned($id, $userRole);
            switch ($data['roleId']) {
                case 1:
                    $sql = "SELECT empName FROM gramaniladari WHERE gramaNiladariID = $id AND isAssigned='y'";
                    break;
                case 2:
                    $sql = "SELECT empName FROM inventorymgtofficer WHERE 	inventoryMgtOfficerID = $id AND isAssigned='y'";
                    break;
                case 3:
                    $sql = "SELECT empName FROM districtsecretariat WHERE districtSecretariatID = $id AND isAssigned='y'";
                    break;
                case 4:
                    $sql = "SELECT empName FROM divisionalsecretariat WHERE divisionalSecretariatID = $id AND isAssigned='y'";
                    break;
                case 5:
                    $sql = "SELECT empName FROM admin WHERE 	adminID = $id AND isAssigned='y'";
                    break;
                case 6:
                    $sql = "SELECT empName FROM dismgtofficer WHERE disMgtOfficerID = $id AND isAssigned='y'";
                    break;
                case 7:
                    $sql = "SELECT empName FROM dmc WHERE dmcID = $id AND isAssigned='y'";
                    break;
                case 8:
                    $sql = "SELECT empName FROM responsibleperson WHERE responsiblePersonID = $id AND isAssigned='y'";
                    break;
            }
            $excute = $this->connection->query($sql);
            if($excute->num_rows >0){
                $userName = $excute->fetch_assoc()['empName'];
                $auth = true;
                $array = array("auth" => $auth, "userRole" => $data['roleId'], "issue" => time(), "tokenKey" => $data['keyAuth'], "userId" => $data['empId']);
                $string = json_encode($array);
                $encrpt = $secure->encrypt($string, ENCRYPTION_KEY);
                //echo is_string($encrpt);exit(); 
                $token = array("key" => base64_encode($encrpt), "userRole" => $data['roleId'], "userId" => $data['empId'], "userName" => $userName);
                $JSON = json_encode($token, JSON_UNESCAPED_UNICODE);
                echo $JSON;
            }else{
                echo json_encode(array("code" => $errorCode['attributeMissing']));
                exit();
            }

        } else {
            echo json_encode(array("code" => $errorCode['userCreadentialWrong']));
            exit();
        }
    }
    protected function tokenKey($length = 10)
    {
        return substr(str_shuffle("aAQEWAbcERWREdefghiHLafgdffhvcJHjklmnopqrSFSEREESGSEGst0123456789"), 0, $length);
    }
    public function rewoke(array $data)
    {
        global $errorCode;
        if ((!isset($data['username']) || (!isset($data['password'])))) {
            echo json_encode(array("code" => $errorCode['attributeMissing']));
            exit();
        }
        $username1 = md5(strtolower($data['username']));
        $username2 = md5(strtoupper($data['username']));
        $password = md5($data['password']);
        $sql = "SELECT l.empId,r.roleId FROM login l, role r WHERE (l.nid ='$username1' OR l.nid ='$username2') AND l.empPassword ='$password' AND l.roleId = r.roleId";
        $excute = $this->connection->query($sql);//echo $sql;
        if ($excute->num_rows > 0) {
            $secure = new Openssl_EncryptDecrypt();
            $data = $excute->fetch_assoc();
            $token_key = $this->tokenKey();
            $sql = "UPDATE login SET keyAuth='" . $token_key . "' WHERE empId=" . $data['empId'] . " AND roleId =" . $data['roleId'];
            $this->connection->query($sql);
            $array = array("auth" => 1, "userRole" => $data['roleId'], "issue" => time(), "tokenKey" => $token_key, "userId" => $data['empId']);
            $string = json_encode($array);
            $encrpt = $secure->encrypt($string, ENCRYPTION_KEY);
            $token = array("key" => base64_encode($encrpt), "userRole" => $data['roleId'], "userId" => $data['empId']);
            $JSON = json_encode($token, JSON_UNESCAPED_UNICODE);
            echo $JSON;
        } else {
            echo json_encode(array("code" => $errorCode['userCreadentialWrong']));
            exit();
        }
    }
    public function renew(array $data)
    {
        global $errorCode;
        $key = base64_decode($data['key']);
        $secure = new Openssl_EncryptDecrypt();
        $decrypted = $secure->decrypt($key, ENCRYPTION_KEY);
        if ($decrypted) {
            $lifetime = 60 * 60;
            $data = json_decode($decrypted, true);
            if (time() - $data['issue'] < $lifetime) {
                $array = array("auth" => 1, "userRole" => $data['userRole'], "issue" => time(), "tokenKey" => $data['tokenKey'], "userId" => $data['userId']);
                $string = json_encode($array);
                $encrpt = $secure->encrypt($string, ENCRYPTION_KEY);
                $token = array("key" => base64_encode($encrpt), "userRole" => $data['userRole'], "userId" => $data['userId']);
                $JSON = json_encode($token, JSON_UNESCAPED_UNICODE);
                echo $JSON;
            } else {
                http_response_code(401);
                echo json_encode(array("code" => $errorCode['tokenExpired']));
                exit();
            }
        } else {
            http_response_code(401);
            echo json_encode(array("code" => $errorCode['apiKeyError']));
            exit();
        }
    }
    public function resetPassword(array $data)
    {
        global $errorCode;
        //echo json_encode($data);
        // exit;
        if (isset($data['email'])) {
            $roleTable = array(
                1 => array("tableName" => "gramaniladari", "primaryKey" => "gramaNiladariID"),
                2 => array("tableName" => "inventorymgtofficer", "primaryKey" => "inventoryMgtOfficerID"),
                3 => array("tableName" => "districtsecretariat", "primaryKey" => "districtSecretariatID"),
                4 => array("tableName" => "divisionalsecretariat", "primaryKey" => "divisionalSecretariatID"),
                5 => array("tableName" => "admin", "primaryKey" => "adminID"),
                6 => array("tableName" => "dismgtofficer", "primaryKey" => "disMgtOfficerID"),
                7 => array("tableName" => "dmc", "primaryKey" => "dmcID"),
                8 => array("tableName" => "responsibleperson", "primaryKey" => "responsiblePersonID")
            );
            $email = $data['email'];
            $sql = "(SELECT " . $roleTable[1]['primaryKey'] . " as empId,empEmail,empName,roleId FROM gramaniladari,role WHERE empEmail = '$email' AND roleId= 1 )
                    UNION
                    (SELECT " . $roleTable[2]['primaryKey'] . " as empId,empEmail,empName,roleId FROM inventorymgtofficer,role WHERE empEmail = '$email'  AND roleId= 2 )
                    UNION
                    (SELECT " . $roleTable[3]['primaryKey'] . " as empId,empEmail,empName,roleId FROM districtsecretariat,role WHERE empEmail = '$email'  AND roleId= 3 )
                    UNION
                    (SELECT " . $roleTable[4]['primaryKey'] . " as empId,empEmail,empName,roleId FROM divisionalsecretariat,role WHERE empEmail = '$email'  AND roleId= 4 )
                    UNION
                    (SELECT " . $roleTable[5]['primaryKey'] . " as empId,empEmail,empName,roleId FROM admin,role WHERE empEmail = '$email'  AND roleId= 5 )
                    UNION
                    (SELECT " . $roleTable[6]['primaryKey'] . " as empId,empEmail,empName,roleId FROM dismgtofficer,role WHERE empEmail = '$email'  AND roleId= 6 )
                    UNION
                    (SELECT " . $roleTable[7]['primaryKey'] . " as empId,empEmail,empName,roleId FROM dmc,role WHERE empEmail = '$email'  AND roleId= 7 )
                    UNION
                    (SELECT " . $roleTable[8]['primaryKey'] . " as empId,empEmail,empName,roleId FROM responsibleperson,role WHERE empEmail = '$email'  AND roleId= 8 )";
            $excute = $this->connection->query($sql);
            //echo $sql;
            if ($excute->num_rows == 0) {
                http_response_code(412);
                echo json_encode(array("code" => $errorCode['emailNotInUse']));
                exit();
            }
            $value = $this->tokenKey(50);
            $results = $excute->fetch_assoc();
            $dateTime = date('Y-m-d H:i:s', time());
            $empId = $results['empId'];
            $roleId = $results['roleId'];
            $sql = "INSERT INTO resetpass(empId,roleId,createdTime,valueIdentity) VALUES ($empId,$roleId,'$dateTime','$value')";
            $this->connection->query($sql);
            $mail = new mail();
            $body = "Please follow this link to reset your password. Link is valid only for one day.If you didn't request for password change,please ignore this.Thank you!.<br> <a href='" . HOST . "ResetPassword/token/" . $value . "'>Click here</a>";
            $mail->emailBody("Password reset Guidelines", "Dear " . $results['empName'], $body);
            $mail->sendMail($email, "Reset Password");
            echo json_encode(array("code" => $errorCode['success']));
            exit();
        } else {
            http_response_code(400);
            echo json_encode(array("code" => $errorCode['attributeMissing']));
            exit();
        }
    }
    public function getRole(array $data)
    {
        if (count($data['receivedParams']) == 1) {
            $id = $data['receivedParams'][0];
            $sql = "SELECT * FROM `role` WHERE roleId=$id";
        } else {
            $sql = "SELECT * FROM `role`";
        }
        $excute = $this->connection->query($sql);
        $results = array();
        while ($r = $excute->fetch_assoc()) {
            $results[] = $r;
        }
        $json = json_encode($results);
        echo $json;
    }
    public function updatePassword(array $data)
    {
        global $errorCode;

        if (isset($data['code']) && isset($data['password'])) {
            $code = $data['code'];
            $password = $data['password'];
            $reset = $data['reset'];
            $valid = date('Y-m-d H:i:s', strtotime("-1 days"));
            $sql = "SELECT recordId,empId,roleId FROM resetpass WHERE valueIdentity ='$code' AND createdTime>'$valid' AND active ='a'";
            $excute = $this->connection->query($sql);
            if ($excute->num_rows == 0) {
                http_response_code(412);
                echo json_encode(array("code" => $errorCode['urlTokenExpired']));
                exit();
            }
            $results = $excute->fetch_assoc();
            $empId = $results['empId'];
            $roleId = $results['roleId'];
            $record = $results['recordId'];
            $newPass = md5($password);
            $sql = "UPDATE login SET empPassword = '$newPass' WHERE empId = $empId AND roleId = $roleId;";
            $this->connection->query($sql);
            $sql = "UPDATE resetpass SET active = 'e' WHERE recordId = $record";
            $this->connection->query($sql);
            if ($reset == 1) {
                $token_key = $this->tokenKey();
                $sql = "UPDATE login SET keyAuth='$token_key' WHERE empId= $empId AND roleId = $roleId";
                $this->connection->query($sql);
            }
            echo json_encode(array("code" => $errorCode['success']));
            exit();
        } else {
            http_response_code(400);
            echo json_encode(array("code" => $errorCode['attributeMissing']));
            exit();
        }
    }
    public function report(array $data)
    {
        $report = new Report();
        $report->generatePdf();
        http_response_code(200);
        echo json_encode(array("url" => $report->getFileUrl()));
        exit();
    }
    public static function getEmployeeId($input, $role)
    {
        $input = strtoupper($input);
        if ($role == 1) {
            $id = explode("EG0", $input);
        } elseif ($role == 2) {
            $id = explode("EI0", $input);
        } elseif ($role == 3) {
            $id = explode("ED0", $input);
        } elseif ($role == 4) {
            $id = explode("ES0", $input);
        } elseif ($role == 5) {
            $id = explode("EA0", $input);
        } elseif ($role == 6) {
            $id = explode("EO0", $input);
        } elseif ($role == 7) {
            $id = explode("EM0", $input);
        } elseif ($role == 8) {
            $id = explode("ER0", $input);
        }
        if (count($id) == 2) {
            return (int)$id[1];
        }
        return (int)$id[0];
    }
    public static function getEmployeeCode($id, $role)
    {
        $numlength = strlen((string)$id);
        if ($role == 1) {
            $code = "EG0" . str_repeat("0", 5 - $numlength) . $id;
        } elseif ($role == 2) {
            $code = "EI0" . str_repeat("0", 5 - $numlength) . $id;
        } elseif ($role == 3) {
            $code = "ED0" . str_repeat("0", 5 - $numlength) . $id;
        } elseif ($role == 4) {
            $code = "ES0" . str_repeat("0", 5 - $numlength) . $id;
        } elseif ($role == 5) {
            $code = "EA0" . str_repeat("0", 5 - $numlength) . $id;
        } elseif ($role == 6) {
            $code = "EO0" . str_repeat("0", 5 - $numlength) . $id;
        } elseif ($role == 7) {
            $code = "EM0" . str_repeat("0", 5 - $numlength) . $id;
        } elseif ($role == 8) {
            $code = "ER0" . str_repeat("0", 5 - $numlength) . $id;
        }
        return $code;
    }
// Admin - EA  5
// inventory - EI 2
// grama niladara - EG 1
// responsible - ER 8
// district - ED 3
// divisional - ES 4
// disaster o - EO 6
// dmc - EM 7
}