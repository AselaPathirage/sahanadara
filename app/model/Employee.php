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
        $sql = "SELECT l.empId,r.roleId FROM login l, role r WHERE l.nid ='$username' AND l.empPassword ='$password' AND l.roleId = r.roleId";
        $excute = $this->connection->query($sql);
        
        if($excute->num_rows>0){
            $secure = new Openssl_EncryptDecrypt();
            $data = $excute-> fetch_assoc();
            //$token_key = $this->tokenKey();
            $auth = true;
            $array = array("auth"=>$auth,"userRole"=> $data['roleId'],"issue"=>time());
            //print_r($data);exit();
            $string = json_encode($array);
            $encrpt = $secure->encrypt($string, ENCRYPTION_KEY);
            //echo is_string($encrpt);exit();
            $token = array("key"=> base64_encode($encrpt),"userRole"=> $data['roleId'],"userId"=> $data['empId']);
            $JSON = json_encode($token, JSON_UNESCAPED_UNICODE);
            echo $JSON;
            //echo $secure->decrypt(base64_decode($token['key']), ENCRYPTION_KEY);
        }else{
            echo json_encode(array("code"=>808));
        }
    }
    private function tokenKey($length=10){
        return substr(str_shuffle("abcdefghijklmnopqrst0123456789"),0,$length);
    }
    public function logout(){
        global $errorCode;
        echo json_encode($_SESSION);exit();
        session_unset();
        session_destroy();
        //echo json_encode(array("code"=>$errorCode['success']));
    }
}