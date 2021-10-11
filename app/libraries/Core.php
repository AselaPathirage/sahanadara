<?php
class Core{
        protected $currentModel = "Home";
        protected $currentMethod = "viewDonations";
        protected $params = [];
        protected $connection;

        public function __construct($mysqli){
            global $errorCode;
            $this->connection = $mysqli;
            $this->currentModel = $this->getClass();
            
            if(!$this->authorization()){
                if(!strcmp($this->currentModel,"Home")){
                    echo json_encode("{'code':".$errorCode['userKeyError']."}");
                    exit();
                }
            }

            if(!$this->requestAuthorization()){
                echo json_encode("{'code':".$errorCode['apiKeyError']."}");
                exit();
            }

            if(!class_exists($this->currentModel)) {
                echo json_encode("{'code':".$errorCode['classNotFound']."}");
                exit();
            }

            $this->currentModel =  new $this->currentModel($this->connection);
            $method = $this->getMethod();

            if(method_exists($this->currentModel,$method)){
                $this->currentMethod = $method;
            }else{
                echo json_encode("{'code':".$errorCode['methodNotFound']."}");
                exit();
            }

            if(count(array_slice(array_values($_POST),1))> 0){  //if request = array slice  = 4
                $this->params = array_slice(array_values($_POST),1);
            }else{
                $this->params =  []; 
            }  
            $method = new ReflectionMethod($this->currentModel, $this->currentMethod);
            $parameters = $method->getParameters();

            if (count($this->params) != count($parameters)) {
                echo json_encode("{'code':".$errorCode['attributeMissing']."}");
                exit();
            }

            call_user_func_array([$this->currentModel, $this->currentMethod], $this->params);
        }

        public function  getClass(){
            $class =$_REQUEST['class'];
            return $class;
        }

        public function  getMethod(){
            $method =$_REQUEST['method'];
            return $method;
        }

        public function  authorization(){
            if(isset($_POST['key'])){
                $key = $_POST['key'];
                if(isset($_SESSION['token'])){
                    if($_SESSION['token']==$key){
                        return true;
                    }
                }
            }
            return false;
        }

        public function  requestAuthorization(){
            if(isset($_REQUEST['api_key'])){
                $key = $_REQUEST['api_key'];
                if(API_KEY==$key){
                    return true;
                }
            }
            return false;
        }
}