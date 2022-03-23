<?php
class Core{
        protected $currentModel = "Home";
        protected $currentMethod = "viewDonations";
        protected $nonSecure = ['Home','Employee']; // releasing no login required classes
        protected $params = [];
        protected $requestRoute;
        protected $connection; 
        protected $permission = array(
                                    'Admin' => 5,
                                    'DisasterOfficer' => 6,
                                    'DistrictSecretariat' => 3,
                                    'DivisionalSecretariat' => 4,
                                    'Dmc' => 7,
                                    'GramaNiladari' => 1,
                                    'InventoryManager' => 2,
                                    'ResponsiblePerson' => 8
                                );
        private $userType=0;
        private $userId=0;

        public function __construct($mysqli){
            //echo $_SERVER['REQUEST_URI'];
            //print_r($_GET) ;
            global $errorCode;
            $this->connection = $mysqli;
            $this->authorization();
            $this->setParams(); // adding json data to array
            $this->urlParams(); // adding url data to array
            $this->setClass();
            $method = new ReflectionMethod($this->currentModel, $this->currentMethod);
            $parameters = $method->getParameters();
            if (count($parameters)==0) {
                $this->params = [];
            }
            call_user_func_array([$this->currentModel, $this->currentMethod], array($this->params));
        }        
        public function  setParams(){
            $json = file_get_contents('php://input');
		    $this->params = json_decode($json,true);
            if(is_null($this->params)){
                $this->params = [];
            }
            //print_r($this->params);
        }
        public function urlParams(){
            if(isset($_GET['request'])){
                if($_GET['request']=="index.php"){
                    $_GET['request'] = "/";
                }
                $url = rtrim($_GET['request'], '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $this->requestRoute = explode("/api/",strtolower($url))[0]; 
                if($this->requestRoute ==""){
                    $this->requestRoute ="/";
                }
                $url = explode('/', $url);
                $this->params['receivedParams'] = $url;
                //print_r($url);
            }
        } 
        public function  setClass(){
            global $errorCode;
            global $route;
            $url = trim($this->requestRoute);
            $return = $route->checkAvailibility($url);
            $array = $return['output'];
            $userTypeByNameIndex = array_search($this->userType,array_values($this->permission));
            $userTypeByName = array_keys($this->permission)[$userTypeByNameIndex];
            //$contains = preg_grep("/\b".$userTypeByName."/",$array); "/\b".$userTypeByName."/"
            $contains = $this->array_key_lookup($array,"/\b".$userTypeByName."/",1);//print_r($contains);
            if(count($contains) > 0){
                foreach($array as $item) {
                    $temp = explode("@", $item);
                    if(in_array($temp[0],array_keys($this->permission))){
                        if($this->userType == $this->permission[$temp[0]]){
                            $this->currentModel = $temp[0];
                            $this->currentModel =  new $this->currentModel($this->connection);
                            $this->setMthod($temp[1]);
                            $route = $return['route'];
                            if (str_contains($route, '{')) { 
                                $strip = strtok($route,"{");
                                $strip=str_replace('/','\/',$strip);
                                $url=preg_replace('/^'.$strip.'/i', '',$url);
                                $data = explode('/', $url);
                                unset($this->params['receivedParams']);
                                $this->params['receivedParams']=$data;
                            }else{
                                array_shift($this->params['receivedParams']);
                            }
                            $this->params['userId'] = $this->userId;
                            $this->params['userType'] = $this->userType;
                            return;
                        }
                    }
                }
            }else{
                foreach($array as $item) {
                    $temp = explode("@", $item);
                    if(in_array($temp[0],$this->nonSecure)){
                        $this->currentModel = $temp[0];
                        $this->currentModel =  new $this->currentModel($this->connection);
                        $this->setMthod($temp[1]);
                        $route = $return['route'];
                        if (str_contains($route, '{')) { 
                            $strip = strtok($route,"{");
                            $strip=str_replace('/','\/',$strip);
                            $url=preg_replace('/^'.$strip.'/i', '',$url);
                            $data = explode('/', $url);
                            unset($this->params['receivedParams']);
                            $this->params['receivedParams']=$data;
                        }else{
                            array_shift($this->params['receivedParams']);
                        }
                        //unset($this->params['receivedParams'][0]);
                        return;
                    }
                }
            }
            // foreach($array as $item) {
            //     $temp = explode("@", $item);
            //     if(in_array($temp[0],array_keys($this->permission))){
            //         if($this->userType == $this->permission[$temp[0]]){
            //             $this->currentModel = $temp[0];
            //             $this->currentModel =  new $this->currentModel($this->connection);
            //             $this->setMthod($temp[1]);
            //             array_shift($this->params['receivedParams']);
            //             $this->params['userId'] = $this->userId;
            //             $this->params['userType'] = $this->userType;
            //             //unset($this->params['receivedParams'][0]);
            //             return;
            //         }
            //     }else if(in_array($temp[0],$this->nonSecure)){
            //         $this->currentModel = $temp[0];
            //         $this->currentModel =  new $this->currentModel($this->connection);
            //         $this->setMthod($temp[1]);
            //         array_shift($this->params['receivedParams']);
            //         //unset($this->params['receivedParams'][0]);
            //         return;
            //     }
            // }
            http_response_code(403);
            echo json_encode(array("code"=>$errorCode['permissionError']));
            exit();
        }
        public function  setMthod($method){
            global $errorCode;
            if(method_exists($this->currentModel,$method)){
                $this->currentMethod = $method;
            }else{
                http_response_code(404);
                echo json_encode(array("code"=>$errorCode['methodNotFound']));
                exit();
            }
        }       
        public function  authorization(){
            global $errorCode;
            $headers = apache_request_headers();
            //print_r($headers);//exit();
            $http_list = $this->array_key_lookup($headers);
            if(count($http_list) == 1){ //isset($headers['HTTP_APIKEY'])
                $lifetime = 60*60;
                $arrayKey = array_keys($http_list);
                $key = base64_decode($headers[$arrayKey[0]]); // $headers['HTTP_APIKEY']
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
                                    $this->userType=$role;
                                    $this->userId = $data['userId'];
                                }else{
                                    http_response_code(401);
                                    echo json_encode(array("code"=>$errorCode['tokenRewoked']));
                                    exit();
                                }
                            }else{
                                http_response_code(401);
                                echo json_encode(array("code"=>$errorCode['tokenExpired']));
                                exit();
                            }
                        }
                    }
                }else{
                    http_response_code(401);
                    echo json_encode(array("code"=>$errorCode['apiKeyError']));
                    exit();
                }                            
            }else{
                $this->userType=0;
            }
        }
        public function backlog(){
            
        }
        //https://stackoverflow.com/questions/41196639/filtering-an-associative-array-keys-by-regex/41206896
        private function array_key_lookup($haystack,$pattern = "/HTTP_APIKEY/i",$check=0){
            if($check==0){
                $matches = preg_grep($pattern, array_keys($haystack)); //match array keys to get which contains http api key
                return array_intersect_key($haystack, array_flip($matches));
            }else{
                $matches = preg_grep($pattern, $haystack); //match array keys to get which contains http api key
                return $matches;
            }
        }
}