<?php
define("baseUrl","sahanadara");
session_set_cookie_params([
    'path' => '/',
    'domain' => $_SERVER['HTTP_HOST'],
    'secure' => true,
    'httponly' => true,
]);
session_start();

//require  "app/index.php";
if($_SERVER['REQUEST_METHOD'] === 'PUT' || $_SERVER['REQUEST_METHOD'] === 'DELETE' || $_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_GET['formControl'])){
        require  "public/index.php";
    }else{
        require  "app/index.php";
    }
    
}else{
    require  "public/index.php";
} 