<?php
class InventoryManager extends Noticer{
    public function __construct($con){
        parent::__construct($con);
    }

    public function addItem(array $data){
        global $errorCode;
        $itemName = $data['itemName'];
        $unitType = $data['unitType'];
        $sql = "INSERT INTO `item` (`itemName`, `unitType`) VALUES ('$itemName', $unitType);";
        $this->connection->query($sql);
        echo json_encode("{'code':".$errorCode['success']."}");
    }
    public function updateCompany(array $data){
        global $errorCode;
        $newValue = $data['person'];
        $id = $data['id'];
        $sql = "UPDATE company set caompanyName='$newValue' WHERE  consumerId = $id";
        $this->connection->query($sql);
        echo json_encode("{'code':".$errorCode['success']."}");
    }
    public function deleteCompany(array $data){
        global $errorCode;
        $id = $data['id'];
        $sql = "DELETE FROM company WHERE  consumerId = $id";
        $this->connection->query($sql);
        echo json_encode("{'code':".$sql."}");
        //echo json_encode("{'code':".$errorCode['success']."}");
    }
    public function getItem(){
        $sql = "SELECT * FROM `item`, `unit` WHERE item.unitType=unit.unitId";
        $excute = $this->connection->query($sql);
        $results = array();
        while($r = $excute-> fetch_assoc()) {
            $results[] = $r;
        }
        $json = json_encode($results);
        echo $json;
    }
    public function getUnit(){
        $sql = "SELECT * FROM `unit` ORDER BY unitName";
        $excute = $this->connection->query($sql);
        $results = array();
        while($r = $excute-> fetch_assoc()) {
            $results[] = $r;
        }
        $json = json_encode($results);
        echo $json;
    }
}