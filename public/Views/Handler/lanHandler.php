<?php
if(isset($_POST['lan'])){
    $lan = $_POST['lan'];
    if(isset($_COOKIE['lan'])){
        unset($_COOKIE['lan']); 
        setcookie("lan",$lan,-1,'/');
    }
    setcookie("lan",$lan,time()+3600*24*30,'/');
}
?>