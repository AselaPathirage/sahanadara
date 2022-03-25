<?php
class GoodsRequest{
    public static function getId($input){
        $input =strtoupper($input);
        $id = explode("GR",$input);
        if(count($id)==2){
            return (int)$id[1];
        }
        return (int)$id[0];
    }
    public static function getGoodsRequest($id){
        $numlength = strlen((string)$id);
        $code = "GR".str_repeat("0",5-$numlength).$id;
        return $code;
    }
}