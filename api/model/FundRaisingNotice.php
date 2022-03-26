<?php
class FundRaisingNotice extends Notice{
    public static function getId($input){
        $input =strtoupper($input);
        $id = explode("FR0",$input);
        if(count($id)==2){
            return (int)$id[1];
        }
        return (int)$id[0];
    }
    public static function getNoticeCode($id){
        $numlength = strlen((string)$id);
        $code = "FR0".str_repeat("0",4-$numlength).$id;
        return $code;
    }
}