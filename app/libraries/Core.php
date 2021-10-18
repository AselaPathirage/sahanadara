<?php
class Core{
        protected $currentModel = "Home";
        protected $currentMethod = "viewDonations";
        protected $nonSecure = ['Home','Employee']; // releasing no login required classes
        protected $params = [];
        protected $connection; 
        protected $permission = array(
                                    'Admin' => 5,
                                    'DisasterOfficer' => 6,
                                    'DistrictSecratarists'=>3,
                                    'DivisionalSecretariat' => 4,
                                    'Dmc' => 7,
                                    'GramaNiladari' => 1,
                                    'InventoryManager' => 2,
                                    'ResponsiblePerson'=> 8
                                );

        public function __construct($mysqli){
            //echo $_SERVER['REQUEST_URI'];exit();
            global $errorCode;
            $this->connection = $mysqli;
            $this->urlParams();
        }        
        public function  setParams(){
            $json = file_get_contents('php://input');
		    $this->params = json_decode($json,true);
            if(is_null($this->params)){
                $this->params = [];
            }
        }
        public function urlParams(){
            if(isset($_GET['reqeust'])){
                $url = rtrim($_SERVER['REQUEST_URI'], '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/', $url);
                array_shift($url);
                print_r($url);
                exit();
            }
        } 
        public function  setClass($class){
            $this->currentModel = $class;
        }
        public function  setMthod($method){
            $this->currentMethod = $method;
        }       
        public function  authorization(){
            global $errorCode;
            $headers = apache_request_headers();
            if(isset($headers['HTTP_APIKEY'])){
                $lifetime = 60*60*60;
                $key = base64_decode($headers['HTTP_APIKEY']);
                $secure = new Openssl_EncryptDecrypt();
                $decrypted = $secure->decrypt($key,ENCRYPTION_KEY);
                if($decrypted){
                    $data = json_decode($decrypted,true);
                    if(isset($data['auth'])){
                        if($data['auth']){
                            if(time() - $data['issue'] < $lifetime){
                                $id = $data['userId'];
                                $role = $data['userRole'];
                                $sql = "SELECT l.keyAuth FROM login l WHERE l.empId = $id AND l.roleId = $role";
                                $excute = $this->connection->query($sql);
                                $data2 = $excute-> fetch_assoc();
                                if(!strcmp($data['tokenKey'],$data2['keyAuth'])){
                                    if(array_key_exists($this->currentModel,$this->permission)){
                                        if($data['userRole'] != $this->permission[$this->currentModel]){
                                            echo json_encode(array("code"=>$errorCode['permissionError']));
                                            exit();
                                        }  
                                    }
                                    return true;
                                }
                                echo json_encode(array("code"=>$errorCode['tokenRewoked']));
                                exit();
                            }
                            echo json_encode(array("code"=>$errorCode['tokenExpired']));
                            exit();
                        }
                    }
                }                            
                echo json_encode(array("code"=>$errorCode['apiKeyError']));
                exit();
            }else if(in_array($this->currentModel,$this->nonSecure)){
                return true;
            }
            return false;
        }
}