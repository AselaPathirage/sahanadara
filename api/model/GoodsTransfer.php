<?php
class GoodsTransfer{
    public static function getId($input){
        $input =strtoupper($input);
        $id = explode("GT",$input);
        if(count($id)==2){
            return (int)$id[1];
        }
        return (int)$id[0];
    }
    public static function getGoodsTransfer($id){
        $numlength = strlen((string)$id);
        $code = "GT".str_repeat("0",5-$numlength).$id;
        return $code;
    }
}