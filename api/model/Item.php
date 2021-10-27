<?php
class Item{
    private $itemCode;

    public function setItemCode($id){
        $numlength = strlen((string)$id);
        $code = "II0".str_repeat("0",2-$numlength).$id;
        $this->itemCode = $code;
    }
    public static function getId($input){
        $input =strtoupper($input);
        $id = explode("II0",$input);
        if(count($id)==2){
            return (int)$id[1];
        }
        return (int)$id[0];
    }
    public function getItemCode(){
        return $this->itemCode;
    }
}