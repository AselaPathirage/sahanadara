<?php
class InventoryManager extends Noticer{
    private $inventory = null;

    public function __construct($con){
        parent::__construct($con);
        $this->inventory = new Inventory();
    }
    public function addItem(array $data){
        global $errorCode;
        $itemName = $data['itemName'];
        $unitType = $data['unitType'];
        $sql = "INSERT INTO `item` (`itemName`, `unitType`) VALUES ('$itemName', $unitType);";
        $this->connection->query($sql);
        echo json_encode(array("code"=>$errorCode['success']));
    }
    public function getItem(array $data){
        if(count($data['receivedParams'])==1){
            $id = $data['receivedParams'][0];
            $sql = "SELECT * FROM `item`, `unit` WHERE item.unitType=unit.unitId AND item.itemId=$id";
        }else{
            $sql = "SELECT * FROM `item`, `unit` WHERE item.unitType=unit.unitId";
        }
        
        $excute = $this->connection->query($sql);
        $results = array();
        while($r = $excute-> fetch_assoc()) {
            $results[] = $r;
        }
        $json = json_encode($results);
        echo $json;
    }
    public function getUnit(array $data){
        if(count($data['receivedParams'])==1){
            $id = $data['receivedParams'][0];
            $sql = "SELECT * FROM `unit` WHERE unitId=$id";
        }else{
            $sql = "SELECT * FROM `unit` ORDER BY unitName";
        }
        $excute = $this->connection->query($sql);
        $results = array();
        while($r = $excute-> fetch_assoc()) {
            $results[] = $r;
        }
        $json = json_encode($results);
        echo $json;
    }
}