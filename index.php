<?php
session_start();
define("baseUrl","sahanadara");
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