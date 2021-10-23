<?php
class Employee{
    protected $connection;

    public function __construct($con){
        $this->connection = $con;
    }
    public function login(array $data){
        global $errorCode;
        
        if((! isset($data['username']) || (! isset($data['password'])))){
            echo json_encode("{'code':".$errorCode['attributeMissing']."}");
            exit();
        } 
        $username = md5($data['username']);
        $password = md5($data['password']);
        $sql = "SELECT l.empId,r.roleId,l.keyAuth FROM login l, role r WHERE l.nid ='$username' AND l.empPassword ='$password' AND l.roleId = r.roleId";
        $excute = $this->connection->query($sql);
        
        if($excute->num_rows>0){
            $secure = new Openssl_EncryptDecrypt();
            $data = $excute-> fetch_assoc();
            $id = $data['empId'];
            switch ($data['roleId']) {
                case 1:
                    $sql ="SELECT empName FROM gramaniladari WHERE gramaNiladariID = $id";
                    break;
                case 2:
                    $sql ="SELECT empName FROM inventorymgtofficer WHERE 	inventoryMgtOfficerID = $id";
                    break;
                case 3:
                    $sql ="SELECT empName FROM districtsecretariat WHERE districtSecretariatID = $id";
                    break;
                case 4:
                    $sql ="SELECT empName FROM divisionalsecretariat WHERE divisionalSecretariatID = $id";
                    break;
                case 5:
                    $sql ="SELECT empName FROM admin WHERE 	adminID = $id";
                    break;
                case 6:
                    $sql ="SELECT empName FROM dismgtofficer WHERE disMgtOfficerID = $id";
                    break;
                case 7:
                    $sql ="SELECT empName FROM dmc WHERE dmcID = $id";
                    break;
                case 8:
                    $sql ="SELECT empName FROM responsibleperson WHERE responsiblePersonID = $id";
                    break;
            }
            $excute = $this->connection->query($sql);
            $userName = $excute-> fetch_assoc()['empName'];
            $auth = true;
            $array = array("auth"=>$auth,"userRole"=> $data['roleId'],"issue"=>time(),"tokenKey"=>$data['keyAuth'],"userId"=> $data['empId']);
            $string = json_encode($array);
            $encrpt = $secure->encrypt($string, ENCRYPTION_KEY);
            //echo is_string($encrpt);exit(); 
            $token = array("key"=> base64_encode($encrpt),"userRole"=> $data['roleId'],"userId"=> $data['empId'],"userName"=> $userName);
            $JSON = json_encode($token, JSON_UNESCAPED_UNICODE);
            echo $JSON;
        }else{
            echo json_encode(array("code"=>$errorCode['userCreadentialWrong']));
            exit();
        }
    }
    protected function tokenKey($length=10){
        return substr(str_shuffle("abcdefghijklmnopqrst0123456789"),0,$length);
    }
    public function logout(){
        
    }
    public function rewoke(array $data){
        global $errorCode;
        if((! isset($data['username']) || (! isset($data['password'])))){
            echo json_encode(array("code"=>$errorCode['attributeMissing']));
            exit();
        }        
        $username = md5($data['username']);
        $password = md5($data['password']);
        $sql = "SELECT l.empId,r.roleId FROM login l, role r WHERE l.nid ='$username' AND l.empPassword ='$password' AND l.roleId = r.roleId";
        $excute = $this->connection->query($sql);
        if($excute->num_rows>0){
            $secure = new Openssl_EncryptDecrypt();
            $data = $excute-> fetch_assoc();
            $token_key = $this->tokenKey();
            $sql = "UPDATE login SET keyAuth='".$token_key."' WHERE empId=".$data['empId']." AND roleId =".$data['roleId'];
            $this->connection->query($sql);
            $array = array("auth"=>1,"userRole"=> $data['roleId'],"issue"=>time(),"tokenKey"=>$token_key,"userId"=> $data['empId']);
            $string = json_encode($array);
            $encrpt = $secure->encrypt($string, ENCRYPTION_KEY);
            $token = array("key"=> base64_encode($encrpt),"userRole"=> $data['roleId'],"userId"=> $data['empId']);
            $JSON = json_encode($token, JSON_UNESCAPED_UNICODE);
            echo $JSON;
        }else{ 
            echo json_encode(array("code"=>$errorCode['userCreadentialWrong']));
            exit();
        }
    }
    public function renew(array $data){
        global $errorCode;
        $key = base64_decode($data['key']);
        $secure = new Openssl_EncryptDecrypt();
        $decrypted = $secure->decrypt($key,ENCRYPTION_KEY);
        if($decrypted){
            $lifetime = 60*60;
            $data = json_decode($decrypted,true);
            if(time() - $data['issue'] < $lifetime){
                $array = array("auth"=>1,"userRole"=> $data['userRole'],"issue"=>time(),"tokenKey"=>$data['tokenKey'],"userId"=> $data['userId']);
                $string = json_encode($array);
                $encrpt = $secure->encrypt($string, ENCRYPTION_KEY);
                $token = array("key"=> base64_encode($encrpt),"userRole"=> $data['userRole'],"userId"=> $data['userId']);
                $JSON = json_encode($token, JSON_UNESCAPED_UNICODE);
                echo $JSON;
            }else{
                http_response_code(401);
                echo json_encode(array("code"=>$errorCode['tokenExpired']));
                exit();
            }
        }else{    
            http_response_code(401);                       
            echo json_encode(array("code"=>$errorCode['apiKeyError']));
            exit();
        }
    }
    public function resetPassword(array $data){
        
    }
    public function getRole(array $data){
        if(count($data['receivedParams'])==1){
            $id = $data['receivedParams'][0];
            $sql = "SELECT * FROM `role` WHERE roleId=$id";
        }else{
            $sql = "SELECT * FROM `role`";
        }
        $excute = $this->connection->query($sql);
        $results = array();
        while($r = $excute-> fetch_assoc()) {
            $results[] = $r;
        }
        $json = json_encode($results);
        echo $json;
    }
}