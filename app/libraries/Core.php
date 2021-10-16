<?php
class Core{
        protected $currentModel = "Home";
        protected $currentMethod = "viewDonations";
        protected $nonSecure = ['Home','Employee']; // releasing no login required classes
        protected $params = [];
        protected $connection; 

        public function __construct($mysqli){
            global $errorCode;
            $this->connection = $mysqli;
            $this->setParams();
            $this->filterRequest();
            if(!$this->requestAuthorization()){
                //echo json_encode("{'code':".$errorCode['apiKeyError']."}");
                echo json_encode(array("code"=>$errorCode['apiKeyError']));
                exit();
            }
            $method = new ReflectionMethod($this->currentModel, $this->currentMethod);
            $parameters = $method->getParameters();
            if (count($parameters)==0) {
                $this->params = [];
            }
            
            call_user_func_array([$this->currentModel, $this->currentMethod], array($this->params));
        }
        public function filterRequest(){
            global $errorCode;
            if(isset($_SERVER['REQUEST_URI'])){
                $url = rtrim($_SERVER['REQUEST_URI'], '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/', $url);
                $temp = explode('_', $url[count($url)-2]);
                //$count = count($temp);
                if(!class_exists($temp[0])) {
                    //echo json_encode("{'code':".$errorCode['classNotFound']."}");
                    //echo json_encode("{'code':".$temp[0]."}");
                    echo json_encode(array("code"=>$errorCode['classNotFound']));
                    exit();
                }
                $this->setClass($temp[0]);
                if(!$this->authorization()){
                    //echo json_encode("{'code':".$errorCode['userKeyError']."}");
                    echo json_encode(array("code"=>$errorCode['userKeyError']));
                    exit();
                }
                $this->currentModel =  new $this->currentModel($this->connection);
                if(method_exists($this->currentModel,$temp[1])){
                    $this->setMthod($temp[1]);
                }else{
                    //echo json_encode("{'code':".$errorCode['methodNotFound']."}");
                    echo json_encode(array("code"=>$errorCode['methodNotFound']));
                    exit();
                }
            }else{
               //echo json_encode("{'code':".$errorCode['unknownError']."}");
                echo json_encode(array("code"=>$errorCode['unknownError']));
                exit();
            }
        }
        public function  setParams(){
            $json = file_get_contents('php://input');
		    $this->params = json_decode($json,true);
            if(is_null($this->params)){
                $this->params = [];
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
            if(isset($this->params['key'])){
                $lifetime = 60*60*60*24;
                $key = base64_decode($this->params['key']);
                unset($this->params['key']);
                $secure = new Openssl_EncryptDecrypt();
                $decrypted = $secure->decrypt($key,ENCRYPTION_KEY);
                if($decrypted){
                    $data = json_decode($decrypted,true);
                    if(isset($data['auth'])){
                        if($data['auth']){
                            if(time() - $data['issue'] > 0){
                            return true;
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
        public function  requestAuthorization(){
            if(isset($_SERVER['REQUEST_URI'])){
                $url = rtrim($_SERVER['REQUEST_URI'], '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/', $url);
                array_shift($url);
                $temp = $url[count($url)-1];
                if(API_KEY==$temp){
                    return true;
                }
                return false;
            }
        }
}