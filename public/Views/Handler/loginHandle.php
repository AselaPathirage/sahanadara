<?php
if(isset($_POST['submit'])){
    $routes = array(
                5=>'Admin',
                6=>'DisasterOfficer',
                3=>'DistrictSecretariat',
                4=>'DivisionalSecretariat',
                7=>'DMC',
                1=>'GramaNiladari',
                2=>'InventoryManager',
                8=>'ResponsiblePerson'
            );
    $url = API."login";
    $ch = curl_init( $url );
    $username = $_POST['username'];
    $password = $_POST['password'];
    $payload = json_encode( array( "username"=>"$username","password"=> "$password" ) );
    curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
    curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
    $result = curl_exec($ch);
    curl_close($ch);
    $response = json_decode($result,true);
    //print_r($response);exit();
    //print_r($_SESSION);
    //$res = session_save_path();
    //echo $res;
    if(key_exists('code',$response)){
        //header("location:../staff?error=wrong password");
        exit();
    }else{
        $time = time();
        $_SESSION['createdTime'] = $time;
        $_SESSION['key'] = $response['key'];
        $_SESSION['userRole']= $response['userRole'];
        $_SESSION['userId']= $response['userId'];
        $_SESSION['name']= $response['userName'];
        //print_r($_SESSION);
        header("location:".HOST.$routes[$response['userRole']]);
    }
}