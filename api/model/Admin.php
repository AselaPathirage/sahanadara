<?php
class Admin extends Employee{
    public function __construct($con){
        parent::__construct($con);
    }
    public function register(array $data){
        global $errorCode;
        if(isset($data['firstname']) && isset($data['lastname']) && isset($data['NIC']) && isset($data['email']) && isset($data['address']) && isset($data['TP_number']) && isset($data['user_role'])){
            $mail = new mail();
            $name = $data['firstname']." ".$data['lastname'];
    
            switch ($data['user_role']) {
                case 1:
                    $sql0 = "SELECT empEmail FROM gramaniladari WHERE empEmail = '".$data['email']."'";
                    $sql ="INSERT INTO gramaniladari (empName,empAddress,empEmail,empTele) VALUES ('$name','".$data['address']."','".$data['email']."','".$data['TP_number']."');";
                    break;
                case 3:
                    $sql0 = "SELECT empEmail FROM districtsecretariat WHERE empEmail = '".$data['email']."'";
                    $sql ="INSERT INTO districtsecretariat (empName,empAddress,empEmail,empTele) VALUES ('$name','".$data['address']."','".$data['email']."','".$data['TP_number']."');";
                    break;
                case 4:
                    $sql0 = "SELECT empEmail FROM divisionalsecretariat WHERE empEmail = '".$data['email']."'";
                    $sql ="INSERT INTO divisionalsecretariat (empName,empAddress,empEmail,empTele) VALUES ('$name','".$data['address']."','".$data['email']."','".$data['TP_number']."');";
                    break;
                case 6:
                    $sql0 = "SELECT empEmail FROM dismgtofficer WHERE empEmail = '".$data['email']."'";
                    $sql ="INSERT INTO dismgtofficer (empName,empAddress,empEmail,empTele) VALUES ('$name','".$data['address']."','".$data['email']."','".$data['TP_number']."');";
            }
            $query = $this->connection->query($sql0);
            if($query->num_rows==0){
                $this->connection->query($sql);
                $tokenKey= $this->tokenKey(10);
                $password = $this->tokenKey(8);
                $sql = "SELECT LAST_INSERT_ID();";
                $execute = $this->connection->query($sql);
                $r = $execute-> fetch_assoc();
                $userId = $r["LAST_INSERT_ID()"];
                $role = $data['user_role'];
                $sql = "INSERT INTO login VALUES ($userId,'".md5($data['NIC'])."','".md5($password)."','$tokenKey',$role)";
                $this->connection->query($sql);
                switch ($role) {
                    case 1:
                        $gnId = $data['Gndivision'];
                        $sql ="UPDATE gndivision SET gramaNiladariID = $userId WHERE gndvId = $gnId";
                        break;
                    case 3:
                        $dsId = $data['District'];
                        $sql ="UPDATE districtsoffice SET districtSecretariat = $userId WHERE dsId = $dsId";
                        break;
                    case 4:
                        $dvId = $data['Division'];
                        $sql ="UPDATE divisionaloffice SET divisionalSecretariatID = $userId WHERE dvId = $dvId";
                        break;
                    case 6:
                        $dvId = $data['Division'];
                        $sql ="UPDATE divisionaloffice SET disasterManager = $userId WHERE dvId = $dvId";
                        break;
                }
                $this->connection->query($sql);
                $body ="Please use these creadentials to login Sahanadara. You need to change your password after the login.<ul><li>User Name: ".$data['NIC']." </li><li>Password: $password </li></ul>";
                $mail->emailBody("About your account","Dear ".$data['firstname'],$body);
                $mail->sendMail($data['email'],"Account Information");
                echo json_encode(array("code"=>$errorCode['success']));
                exit();
            }else{
                echo json_encode(array("code"=>$errorCode['emailAlreadyInUse']));
                exit();   
            }
        }else{ 
            echo json_encode(array("code"=>$errorCode['attributeMissing']));
            exit();
        }
    }
    public function searchUser(array $data){
        $roleTable = array( 1=>array("tableName"=>"gramaniladari","primaryKey" => "gramaNiladariID"),
                            2=>array("tableName"=>"inventorymgtofficer","primaryKey" => "inventoryMgtOfficerID"),
                            3=>array("tableName"=>"districtsecretariat","primaryKey" => "districtSecretariatID"),
                            4=>array("tableName"=>"divisionalsecretariat","primaryKey" => "divisionalSecretariatID"),
                            5=>array("tableName"=>"admin","primaryKey" => "adminID"),
                            6=>array("tableName"=>"dismgtofficer","primaryKey" => "disMgtOfficerID"),
                            7=>array("tableName"=>"dmc","primaryKey" => "dmcID"),
                            8=>array("tableName"=>"responsibleperson","primaryKey" => "responsiblePersonID"));
        if(count($data['receivedParams'])==1){
            $sql = "SELECT ".$roleTable[$data['receivedParams'][0]]['primaryKey']." AS empId, empName,empAddress,empEmail,empTele,roleName,roleId FROM ".$roleTable[$data['receivedParams'][0]]['tableName'].",role WHERE roleId=".$data['receivedParams'][0];
        }elseif(count($data['receivedParams'])==2){
            $sql = "SELECT ".$roleTable[$data['receivedParams'][0]]['primaryKey']." AS empId, empName,empAddress,empEmail,empTele,roleName,roleId FROM ".$roleTable[$data['receivedParams'][0]]['tableName'].",role WHERE ".$roleTable[$data['receivedParams'][0]]['primaryKey']."=".$data['receivedParams'][1]." AND roleId=".$data['receivedParams'][0];
        }else{
            $sql = "(SELECT gramaniladari.".$roleTable[1]['primaryKey']." as empId,empName,empAddress,empEmail,empTele,roleName,roleId,gndvId,division.dvId,district.dsId FROM gramaniladari,role,gndivision,division,district WHERE roleId = 1 AND gndivision.gramaNiladariID = gramaniladari.gramaNiladariID AND gndivision.dvId = division.dvId AND division.dsId = district.dsId)
                    UNION
                    (SELECT ".$roleTable[2]['primaryKey']." as empId,empName,empAddress,empEmail,empTele,roleName,roleId,NULL AS gndvId,division.dvId,district.dsId FROM inventorymgtofficer,inventory,role,gndivision,division,district WHERE roleId = 2 AND inventorymgtofficer.inventoryID = inventory.inventoryId AND inventory.dvId = division.dvId AND division.dsId = district.dsId AND gndivision.dvId = division.dvId GROUP BY district.dsId,division.dvId)
                    UNION
                    (SELECT ".$roleTable[3]['primaryKey']." as empId,empName,empAddress,empEmail,empTele,roleName,roleId,NULL AS gndvId,NULL AS dvId,district.dsId FROM districtsecretariat,role,district,districtsoffice WHERE roleId = 3 AND districtsecretariat.districtSecretariatID = districtsoffice.districtSecretariat AND districtsoffice.dsId = district.dsId)
                    UNION
                    (SELECT divisionalsecretariat.".$roleTable[4]['primaryKey']." as empId,empName,empAddress,empEmail,empTele,roleName,roleId,NULL as gndvId,division.dvId,district.dsId FROM divisionalsecretariat,role,division,district,divisionaloffice WHERE roleId = 4 AND divisionalsecretariat.divisionalSecretariatID = divisionaloffice.divisionalSecretariatID AND divisionaloffice.dvId = division.dvId AND division.dsId = district.dsId)
                    UNION
                    (SELECT ".$roleTable[5]['primaryKey']." as empId,empName,empAddress,empEmail,empTele,roleName,roleId,NULL as gndvId,NULL as dvId,NULL as dsId FROM admin,role WHERE roleId = 5)
                    UNION
                    (SELECT dismgtofficer.".$roleTable[6]['primaryKey']." as empId,empName,empAddress,empEmail,empTele,roleName,roleId,NULL as gndvId,division.dvId,district.dsId FROM dismgtofficer,role,division,district,divisionaloffice WHERE roleId = 6 AND dismgtofficer.disMgtOfficerID = divisionaloffice.disasterManager AND divisionaloffice.dvId = division.dvId AND division.dsId = district.dsId)
                    UNION
                    (SELECT ".$roleTable[7]['primaryKey']." as empId,empName,empAddress,empEmail,empTele,roleName,roleId,NULL as gndvId,NULL as dvId,NULL as dsId FROM dmc,role WHERE roleId = 7)
                    UNION
                    (SELECT responsibleperson.".$roleTable[8]['primaryKey']." as empId,empName,empAddress,empEmail,empTele,roleName,roleId,gndvId,division.dvId,district.dsId FROM responsibleperson,role,division,district,gndivision WHERE roleId = 8 AND responsibleperson.safeHouseID = gndivision.safeHouseID AND gndivision.dvId = division.dvId AND division.dsId = district.dsId)";
        }

        $excute = $this->connection->query($sql);
        $results = array();
        while($r = $excute-> fetch_assoc()) {
            $results[] = $r;
        }
        $json = json_encode($results);
        echo $json;
    }
    public function getDistrict(array $data){

    }
    public function getDivision(array $data){

    }
    public function getGnDivision(array $data){

    }
    public function DBtoJson(){
        $sql = "SELECT d.dsId,d.dsName FROM district d WHERE d.dsId IN (SELECT DISTINCT dv.dsId FROM division dv)";
        $excute = $this->connection->query($sql);
        $results = array();
        while($r = $excute-> fetch_assoc()) {
            $temp = array('dsId'=> $r['dsId'], 'name'=>$r['dsName'], 'division'=>array());
            $sql = "SELECT dv.dvId,dv.dvName FROM division dv WHERE dv.dvId IN (SELECT DISTINCT gn.dvId FROM gndivision gn) AND dv.dsId=".$r['dsId'];
            $divisionQuery = $this->connection->query($sql);
            while($p = $divisionQuery-> fetch_assoc()) {
                $temp2= array('dvId'=> $p['dvId'], 'name'=>$p['dvName'], 'gnArea'=>array());
                $sql = "SELECT gn.gndvId,gn.gnDvName FROM gndivision gn WHERE gn.dvId=".$p['dvId'];
                $gnQuery = $this->connection->query($sql);
                while($q = $gnQuery-> fetch_assoc()) {
                    $temp3 = array('gndvId'=>$q['gndvId'], 'name'=>$q['gnDvName']);
                    array_push($temp2['gnArea'],$temp3);
                }
                array_push($temp['division'],$temp2);
            }
            array_push($results,$temp);
        }
        $json = json_encode($results);
        echo $json;
    }
    
    public function updateProfileDetails(array $data){
        global $errorCode;
        if(isset($data['roleId']) && isset($data['empId'])){
            $name = $data['firstname']." ".$data['lastname'];
            $address = $data['address'];
            $email = $data['email'];
            $phone = $data['tpnumber'];
            $uid = $data['empId'];
            $password = md5($data['updatepass']);
            $sql = "SELECT l.empId,r.roleId,l.keyAuth FROM login l, role r WHERE l.empPassword ='$password' AND l.roleId = '".$data['roleId']."' AND  l.empId = '".$data['empId']."'";
            $excute = $this->connection->query($sql);
            if ($excute->num_rows > 0) {
                $sql1 = "UPDATE `admin` SET `empName`='$name', `empAddress`='$address', `empEmail`='$email',`empTele`='$phone' WHERE `adminID`='$uid' ";
                $this->connection->query($sql1);
                echo json_encode(array("code" => $errorCode['success']));
                exit();
            }else{
                echo json_encode(array("code" => $errorCode['userCreadentialWrong']));
                exit();
            }            
        } else {
            echo json_encode(array("code" => $errorCode['attributeMissing']));
            exit();
        }
    }

    public function updatePassword(array $data){
        global $errorCode;
        if(isset($data['roleId']) && isset($data['empId'])){
            $newpass = md5($data['newpass']);
            $uid = $data['empId'];
            $password = md5($data['oldpass']);
            $sql = "SELECT l.empId,r.roleId,l.keyAuth FROM login l, role r WHERE l.empPassword ='$password' AND l.roleId = '".$data['roleId']."' AND  l.empId = '".$data['empId']."'";
            $excute = $this->connection->query($sql);
            if ($excute->num_rows > 0) {
                $sql1 = "UPDATE login SET empPassword='" . $newpass . "' WHERE empId=" . $data['empId'] . " AND roleId =" . $data['roleId'];
                $this->connection->query($sql1);
                echo json_encode(array("code" => $errorCode['success']));
                exit();
            }else{
                echo json_encode(array("code" => $errorCode['userCreadentialWrong']));
                exit();
            }  
            echo json_encode(array("code" => $errorCode['success']));
            exit();
        } else {
            echo json_encode(array("code" => $errorCode['attributeMissing']));
            exit();
        }
    }

    public function getUserCount(array $data){
        global $errorCode;
        $roleId = $data['receivedParams'][0];
        switch ($roleId) {
            case 1:
                $sql ="SELECT COUNT(gramaniladari.gramaNiladariID) as total FROM gramaniladari";
                break;
            case 3:
                $sql ="SELECT COUNT(districtsecretariat.districtSecretariatID) as total FROM districtsecretariat";
                break;
            case 4:
                $sql ="SELECT COUNT(divisionalsecretariat.divisionalSecretariatID) as total FROM divisionalsecretariat";
                break;
            case 6:
                $sql ="SELECT COUNT(dmc.dmcID) as total FROM dmc;";
                break;
        }
        $excute = $this->connection->query($sql);
        $results = $excute-> fetch_assoc();
        $json = json_encode($results);
        echo $json;
    }

    public function getFilteredUser(array $data){
        global $errorCode;
        $roleId = $data['receivedParams'][0];
        switch ($roleId) {
            case 1:
                $sql0 = "SELECT gramaniladari.gramaNiladariID as empId, gramaniladari.empName, gramaniladari.empAddress, gramaniladari.empEmail, gramaniladari.empTele , role.roleName, role.roleName  FROM gramaniladari INNER JOIN gndivision ON gndivision.gramaNiladariID = gramaniladari.gramaNiladariID, role WHERE role.roleId = 1 AND gndivision.gndvId = '".$data['receivedParams'][1]."' ";
                break;
            case 3:
                $sql0 = "SELECT districtsecretariat.districtSecretariatID as empId, districtsecretariat.empName, districtsecretariat.empAddress, districtsecretariat.empEmail, districtsecretariat.empTele, role.roleName, role.roleName FROM districtsecretariat INNER JOIN districtsoffice on districtsoffice.districtSecretariat = districtsecretariat.districtSecretariatID , role WHERE role.roleId = 3 AND districtsoffice.dsId = '".$data['receivedParams'][1]."'";
                break;
            case 4:
                $sql0 = "SELECT divisionalsecretariat.divisionalSecretariatID as empId, divisionalsecretariat.empName, divisionalsecretariat.empAddress, divisionalsecretariat.empEmail, divisionalsecretariat.empTele, role.roleName, role.roleName FROM divisionalsecretariat INNER JOIN divisionaloffice on divisionaloffice.divisionalSecretariatID = divisionalsecretariat.divisionalSecretariatID , role WHERE role.roleId = 4 AND divisionaloffice.dvId = '".$data['receivedParams'][1]."'";
                break;
            case 6:
                $sql0 = "SELECT dmc.dmcID as empId, dmc.empName, dmc.empAddress, dmc.empEmail, dmc.empTele, role.roleName, role.roleName FROM dmc INNER JOIN divisionaloffice on divisionaloffice.disasterManager = dmc.dmcID , role WHERE role.roleId = 6 AND divisionaloffice.dvId = '".$data['receivedParams'][1]."'";
        }
        $excute = $this->connection->query($sql0);
        $results = array();
        while($r = $excute-> fetch_assoc()) {
            $results[] = $r;
        }
        $json = json_encode($results);
        echo $json;
    }

} 


// $sql = "SELECT d.dsId,d.dsName,dv.dvId,dv.dvName,gn.gndvId,gn.gnDvName FROM district d,division dv,gndivision gn 
// WHERE d.dsId = dv.dsId AND dv.dvId = gn.dvId";
// $excute = $this->connection->query($sql);
// $results = array("district"=>array());
// while($r = $excute-> fetch_assoc()) {
// if(!isset($results["district"][$r["dsName"]])) {
//     $results["district"][$r["dsName"]]["dsId"] = $r["dsId"];
// }
// if(!isset($results["district"][$r["dsName"]]["division"][$r["dvName"]])) {
//     $results["district"][$r["dsName"]]["division"][$r["dvName"]]["dvId"] = $r["dvId"];
// }
// $results["district"][$r["dsName"]]["division"][$r["dvName"]]["gnArea"][$r["gnDvName"]]["gndvId"] = $r["gndvId"];
// }
// $json = json_encode($results);
// echo $json;