<?php
class Router{
    protected static $defaultController = array(

                                                "public" => "index.php",
                                                "test" => "test.php",
                                                "404" => "404.php",
                                                "a" => "a.php",
                                                "noPermission" => "noPermission.php",
                                                "help" => "help.php",
                                                "donate" => "donate.php",
                                                "staff" => "staff.php",
                                                "about" => "about.php",
                                                "forget" => "forget.php",
                                                "logout"=>"logout.php"
                                            );
    protected static $routes = array(
                                    'Admin' => array(),
                                    'DisasterOfficer' => array('SafeHouse','Dashboard','Report','Notice'),
                                    'DistrictSecretariat' => array(),
                                    'DivisionalSecretariat' => array('Dashboard','Notice','Report'),
                                    'DMC' => array('Report'),
                                    'GramaNiladari' => array('Report'),
                                    'InventoryManager' => array('SafeHouse', 'Inventory', 'Report', 'Notice'),
                                    'ResponsiblePerson' => array('SafeHouse', 'Report'),
                                    'Handler' => array()
                                );
    protected $permission = array(
                                    'Admin' => 5,
                                    'DisasterOfficer' => 6,
                                    'DistrictSecretariat' => 3,
                                    'DivisionalSecretariat' => 4,
                                    'DMC' => 7,
                                    'GramaNiladari' => 1,
                                    'InventoryManager' => 2,
                                    'ResponsiblePerson' => 8
                                );

    protected $currentController;

    public function __construct(){
        $url = $this->getUrl();
        //print_r($url);exit;
        if (array_key_exists($url[0], Router::$defaultController) && count($url) == 1) {
            $this->currentController = 'public/Views/' . Router::$defaultController[$url[0]];
        } else if (array_key_exists($url[0], Router::$defaultController)) {
            //if (array_key_exists($url[1], Router::$defaultController)) {
                //$this->currentController = 'public/Views/' . Router::$defaultController[$url[0]];
            //}
            $this->currentController = 'public/Views/' . Router::$defaultController[$url[0]];
        } else if (array_key_exists($url[0], Router::$routes)) {
            if (count($url) > 2) {
                if (in_array($url[1], Router::$routes[$url[0]])) {
                    if (file_exists('public/Views/' . $url[0] . '/' . $url[1] . '/' . $url[2] . '.php')) {
                        if(isset($_SESSION['userRole'])){
                            if($this->checkPermission($this->permission[$url[0]],$url[0])){                        
                                $this->currentController = 'public/Views/' . $url[0] . '/' . $url[1] . '/' . $url[2] . '.php';
                            }else{
                                $this->currentController = 'public/Views/noPermission.php';
                            }
                        }else{
                            $this->currentController = 'public/Views/staff.php';
                        }
                    } else {
                        $this->currentController = 'public/Views/404.php';
                    }
                } else {
                    //if requested page not in routes array
                    if (file_exists('public/Views/' . $url[0] . '/' . $url[1] . '.php')) {
                        $this->currentController = 'public/Views/' . $url[0] . '/' . $url[1] . '.php';
                    } else {
                        $this->currentController = 'public/Views/404.php';
                    }
                }
            } else if (count($url) == 2) {
                if (file_exists('public/Views/' . $url[0] . '/' . $url[1] . '.php')) {
                    if(isset($_SESSION['userRole'])){
                        if($this->checkPermission($this->permission[$url[0]],$url[0])){                        
                            $this->currentController = 'public/Views/' . $url[0] . '/' . $url[1] . '.php';
                        }else{
                            $this->currentController = 'public/Views/noPermission.php';
                        }
                    }elseif($url[0]=="Handler"){
                        $this->currentController = 'public/Views/' . $url[0] . '/' . $url[1] . '.php';
                    }else{
                        $this->currentController = 'public/Views/staff.php';
                    }
                } else if (file_exists('public/Views/' . $url[0] . '/' . $url[1] . '/index.php')) {
                    if(isset($_SESSION['userRole'])){
                        if($this->checkPermission($this->permission[$url[0]],$url[0])){                        
                            $this->currentController = 'public/Views/' . $url[0] . '/' . $url[1] . '/index.php';
                        }else{
                            $this->currentController = 'public/Views/noPermission.php';
                        }
                    }else{
                        $this->currentController = 'public/Views/staff.php';
                    }
                } else {
                    $this->currentController = 'public/Views/404.php';
                }
            } else {
                if (file_exists('public/Views/' . $url[0] . '/index.php')) {
                    if(isset($_SESSION['userRole'])){
                        if($this->checkPermission($this->permission[$url[0]],$url[0])){                        
                            $this->currentController = 'public/Views/' . $url[0] . '/index.php';
                        }else{
                            $this->currentController = 'public/Views/noPermission.php';
                        }
                    }else{
                        $this->currentController = 'public/Views/staff.php';
                    }
                } else {
                    $this->currentController = 'public/Views/404.php';
                }
            }
        } else {
            $this->currentController = 'public/Views/404.php';
        }
        require_once($this->currentController);
    }

    public function getUrl(){
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }

    public function checkPermission($requiredUserType,$url){
        if(isset($_SESSION['key']) && isset($_SESSION['userRole']) && isset($_SESSION['createdTime'])){
            if($_SESSION['userRole']==$requiredUserType){
                return true;
            }elseif($url == "Handler"){
                return true;
            }
        }
        return false;
    }
}
