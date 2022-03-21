<?php
class SafeHouseStatusReport{
    private $safeHouseStatusId;

    public static function getId($input){
        $input =strtoupper($input);
        $id = explode("SS",$input);
        if(count($id)==2){
            return (int)$id[1];
        }
        return (int)$id[0];
    }
    public static function getSafeHouseCode($id){
        $numlength = strlen((string)$id);
        $code = "SS".str_repeat("0",5-$numlength).$id;
        return $code;
    }
}