<?php
require_once("public/Controller/Router.php");
session_start();

function renew(){
    if(isset($_SESSION['key']) && isset($_SESSION['userRole']) && isset($_SESSION['userId']) && isset($_SESSION['createdTime'])){
        $pre = 60*45;
        if(time() - $_SESSION['createdTime'] > $pre){
            $url = API."renew";
            $ch = curl_init( $url );
            $key = $_SESSION['key'];
            $payload = json_encode( array( "key"=>$key) );
            curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
            $headers = array(
                "Accept: application/json",
                "HTTP_KEY: ".$_SESSION['key'],
            );
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
            $result = curl_exec($ch);
            curl_close($ch);
            $response = json_decode($result,true);
            if(key_exists('code',$response)){
                session_unset();
                session_destroy();
                session_start();
            }else{
                
                $_SESSION['createdTime'] = time();
                $_SESSION['key'] = $response['key'];
                $_SESSION['userRole']= $response['userRole'];
                $_SESSION['userId']= $response['userId'];
            }
        }
    }
}

renew();
$control = new Router();