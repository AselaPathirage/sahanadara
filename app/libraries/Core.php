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
            $this->setParams();
            $this->filterRequest();
            if(!$this->requestAuthorization()){
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
        public function urlParams(){
            if(isset($_GET['reqeust'])){
                $url = rtrim($_SERVER['REQUEST_URI'], '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/', $url);
                array_shift($url);
                $temp = $url[count($url)-1];
                
            }
        }

}