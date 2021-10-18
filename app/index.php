<?php
header("Content-Type: application/json; charset=UTF-8");
define("HOST","http://localhost/sahanadara/");
include_once("./libraries/vendor/autoload.php");
include_once("./config/config.php");

function loader($class)
{
    $filename = $class. '.php';
    $file ='./libraries/' . $filename;
    if (!file_exists($file))
    {
        $file ='./model/'. $filename;
        if (!file_exists($file)){
            return false;
        }
    }
    include $file;
}
spl_autoload_register('loader'); // set class auto loader

if(isset($_GET['reqeust'])){
    $url = rtrim($_GET['reqeust'], '/');
    $url = filter_var($url, FILTER_SANITIZE_URL);
    $url = explode('/', $url);
    print_r($url);
}
exit();
ini_set("log_errors", 1);
ini_set("error_log", "./error.log"); //create a error log file
$db = Database::getInstance();
$mysqli = $db->getConnection(); // set db connection
$core = new Core($mysqli);