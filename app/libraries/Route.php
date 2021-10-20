<?php
class Route{
    private static $_instance;
    private static $get=[];
    private static $put=[];
    private static $post=[];
    private static $delete=[];

    
    public static function getInstance(){
		if(!self::$_instance) { // If no instance then make one
			self::$_instance = new self();
		}
		return self::$_instance;
	}
    private function __construct(){
        require_once("config/apiRoutes.php");
	}
    public function checkAvailibility($requestName){
        global $errorCode;
        if($_SERVER['REQUEST_METHOD'] =="POST"){
            $key = array_keys(self::$post);
            foreach($key as $item) {
                if(strcasecmp($item,$requestName) == 0){
                    return self::$post[$item];     
                }
            }
            echo json_encode(array("code"=>$errorCode['routeNotFound']));
            exit();
        }elseif($_SERVER['REQUEST_METHOD'] =="GET"){
            $key = array_keys(self::$get);
            foreach($key as $item) {
                if(strcasecmp($item,$requestName) == 0){
                    return self::$get[$item];     
                }
            }
            echo json_encode(array("code"=>$errorCode['routeNotFound']));
            exit();
        }elseif($_SERVER['REQUEST_METHOD'] =="PUT"){
            $key = array_keys(self::$put);
            foreach($key as $item) {
                if(strcasecmp($item,$requestName) == 0){
                    return self::$put[$item];     
                }
            }
            echo json_encode(array("code"=>$errorCode['routeNotFound']));
            exit();
        }elseif($_SERVER['REQUEST_METHOD'] =="DELETE"){
            $key = array_keys(self::$delete);
            foreach($key as $item) {
                if(strcasecmp($item,$requestName) == 0){
                    return self::$delete[$item];     
                }
            }
            echo json_encode(array("code"=>$errorCode['routeNotFound']));
            exit();
        }else{ 
            echo json_encode(array("code"=>$errorCode['unhandledRequestingMetod']));
            exit();
        }
    }
    public static function GET($url,$return){
        self::$get[$url]=$return;
    }
    public static function POST($url,$return){
        self::$post[$url]=$return;
    }
    public static function PUT($url,$return){
        self::$put[$url]=$return;
    }
    public static function DELETE($url,$return){
        self::$delete[$url]=$return;
    }
}