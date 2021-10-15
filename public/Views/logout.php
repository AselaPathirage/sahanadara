<?php
$url = "localhost/sahanadara/Employee_logout/1234";
$ch = curl_init( $url );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
$result = curl_exec($ch);
curl_close($ch);
//setcookie("key",0,-time()-24*3600*60, '/', NULL, 0 );
header("location:./");