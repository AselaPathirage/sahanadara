<?php
class ServiceRequestNotice{
    public static function getId($input){
        $input =strtoupper($input);
        $id = explode("SR",$input);
        if(count($id)==2){
            return (int)$id[1];
        }
        return (int)$id[0];
    }
    public static function getServiceRequestNoticeCode($id){
        $numlength = strlen((string)$id);
        $code = "SR".str_repeat("0",5-$numlength).$id;
        return $code;
    }
}