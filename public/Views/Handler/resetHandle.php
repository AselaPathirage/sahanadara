<?php
if(isset($_POST['submit'])){
    if(isset($_POST['e_email'])){
        $url = API."resetPassword";
        $ch = curl_init( $url );
        $email = $_POST['e_email'];
        $payload = json_encode( array( "email"=>"$email") );
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        $result = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($result,true);
        if(isset($response['code'])){
            if($response['code']== 806){
                header("location:".HOST."forget/reply/3");
                exit();
            }elseif($response['code']==815){
                header("location:".HOST."forget/reply/2");
                exit();
            }else{
                header("location:".HOST."forget/reply/4");
                exit();
            }
        }
    }else{
        header("location:".HOST."forget/reply/1");
        exit();
    }
}elseif(isset($_POST['reset'])){
    if(isset($_POST['newPass'])){
        $url = API."resetPassword";
        $ch = curl_init( $url );
        $password = $_POST['newPass'];
        $code = $_POST['code'];
        if(isset($_POST['otherDevice'])){
            $reset = 1;
        }else{
            $reset = 0;
        }
        $payload = json_encode( array( "code"=>"$code", "reset"=>"$reset", "password"=>"$password") );
        curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        $result = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($result,true);
        
        if(isset($response['code'])){
            if($response['code']== 806){
                header("location:".HOST."staff");
                exit();
            }elseif($response['code']==816){
                header("location:".HOST."ResetPassword/reply/2");
                exit();
            }else{
                header("location:".HOST."ResetPassword/reply/4");
                exit();
            }
        }
    }else{
        header("location:".HOST."ResetPassword/reply/1");
        exit();
    }
}