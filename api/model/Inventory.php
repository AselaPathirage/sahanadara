<?php
class Inventory{
    private $inventoryId;
    private $inventoryAddress;
    private $connection;
    private $district;
    private $division;

    public function __construct(){
        global $mysqli;
        $this->connection = $mysqli;
    }
    public function setInfo($userId){ 
        $sql = "SELECT inventory.inventoryId AS inventoryId,division.dvId AS dvId,division.dvName FROM inventorymgtofficer,inventory,division 
                WHERE inventoryMgtOfficerID = $userId AND inventorymgtofficer.inventoryID = inventory.inventoryId 
                AND inventory.dvId = division.dvId";
        $excute = $this->connection->query($sql);
        $excute = $excute-> fetch_assoc();
        $this->inventoryId = $excute['inventoryId'];
        $this->division = array('dvName'=>$excute['dvName'],'dvId'=>$excute['dvId']);
        $sql = "SELECT dsName,district.dsId FROM district,division WHERE division.dsId = district.dsId AND dvId =".$excute['dvId'];
        $excute = $this->connection->query($sql);
        $this->district = $excute-> fetch_assoc();
    }
    public function setAddress(){
        $inventoryId=$this->inventoryId;
        $sql = "SELECT inventoryAddress  FROM inventory WHERE inventoryId  = $inventoryId";
        $excute = $this->connection->query($sql);
        $excute = $excute-> fetch_assoc();
        $this->inventoryAddress = $excute['inventoryAddress'];
    }
    public function getId(){
        return $this->inventoryId;
    }
    public function getAddress(){
        return $this->inventoryAddress;
    }
    public function getDistrict(){
        return $this->district;
    }
    public function getDivision(){
        return $this->division;
    }
    public static function getInventoryId($input){
        $input =strtoupper($input);
        $id = explode("WH0",$input);
        if(count($id)==2){
            return (int)$id[1];
        }
        return (int)$id[0];
    }
    public function getInventoryCode(){
        $id=$this->inventoryId;
        $numlength = strlen((string)$id);
        $code = "WH0".str_repeat("0",3-$numlength).$id;
        return $code;
    }
}