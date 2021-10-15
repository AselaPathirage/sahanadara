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
            global $_SESSION;
            $data = $excute-> fetch_assoc();
            $token_key = $this->tokenKey();
            //echo json_encode($_SESSION);exit();
            if(isset($_SESSION['token'])){
                unset($_SESSION['token']);
            }
            //$_SESSION['token']=$token_key;
            
            $token_key = md5($token_key);
            //$token_key = md5("ABCD");
            $_SESSION['userId'] = $data['empId'];
            $_SESSION['userRole'] = $data['roleId'];
            //echo json_encode($_SESSION);exit();
            $token = array("key"=>"$token_key","userRole"=> $data['roleId']);
            $JSON = json_encode($token);
            echo $JSON;
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