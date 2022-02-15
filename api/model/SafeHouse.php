<?php
class SafeHouse{
    private $safeHouseId;
    private $safeHouseLocation;
    private $responsiblePerson;

    public static function getId($input){
        $input =strtoupper($input);
        $id = explode("SH",$input);
        if(count($id)==2){
            return (int)$id[1];
        }
        return (int)$id[0];
    }
    public static function getSafeHouseCode($id){
        $numlength = strlen((string)$id);
        $code = "SH".str_repeat("0",5-$numlength).$id;
        return $code;
    }
}