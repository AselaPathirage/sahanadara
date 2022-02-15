<?php
class Notice{
    private $connection;

    public function __construct($con){
        $this->connection = $con;
    }
    public static function getId($input){
        $input =strtoupper($input);
        $id = explode("DN0",$input);
        if(count($id)==2){
            return (int)$id[1];
        }
        return (int)$id[0];
    }
    public static function getNoticeCode($id){
        $numlength = strlen((string)$id);
        $code = "DN0".str_repeat("0",2-$numlength).$id;
        return $code;
    }
}