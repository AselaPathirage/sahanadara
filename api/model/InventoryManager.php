<?php
class InventoryManager extends Noticer{
    private $inventory = null;

    public function __construct($con){
        parent::__construct($con);
        $this->inventory = new Inventory();
    }
    public function addItem(array $data){
        global $errorCode;
        if(isset($data['itemName']) && isset($data['unitType'])){
            if($data['itemName']=="" || !is_int($data['unitType'])){
                echo json_encode(array("code"=>$errorCode['attributeMissing']));
                exit();
            }
            $itemName = $data['itemName'];
            $unitType = $data['unitType']; 
            $sql = "INSERT INTO `item` (`itemName`, `unitType`) VALUES ('$itemName', $unitType);";
            $this->connection->query($sql);
            echo json_encode(array("code"=>$errorCode['success']));
        }else{
            echo json_encode(array("code"=>$errorCode['attributeMissing']));
            exit();
        }
    }
    public function getItem(array $data){
        if(count($data['receivedParams'])==1){
            $id = $data['receivedParams'][0];
            $id=Item::getId($id);
            $sql = "SELECT * FROM `item`, `unit` WHERE item.unitType=unit.unitId AND item.itemId=$id ORDER BY item.itemId";
        }else{
            $sql = "SELECT * FROM `item`, `unit` WHERE item.unitType=unit.unitId  ORDER BY item.itemId";
        }
        
        $excute = $this->connection->query($sql);
        $results = array();
        while($r = $excute-> fetch_assoc()) {
            $item = new Item();
            $item->setItemCode($r['itemId']);
            $r['itemId'] = $item->getItemCode();
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
    public function addInventory(array $data){
        global $errorCode;
        if(isset($data['itemId']) && isset($data['quantity'])){
            $itemId = $data['itemId'];
            $itemId = Item::getId($itemId);
            $quantity = $data['quantity'];
            $uid = $data['userId'];
            if(isset($data['release'])){
                
                $sql = "SELECT SUM(v.quantity) AS quantity FROM inventoryitem v, item i, inventorymgtofficer m, unit u WHERE m.inventoryID = v.inventoryId AND v.itemId = i.itemId AND m.inventoryMgtOfficerID = $uid  AND v.itemId = $itemId  AND i.unitType =u.unitId GROUP BY v.itemId";
                $excute = $this->connection->query($sql);
                $array = $excute-> fetch_assoc();
                $q = $array['quantity'];
                if($q<$quantity){
                    http_response_code(200); 
                    echo json_encode(array("code"=>$errorCode['unableToHandle']));
                    exit();
                }
                $quantity *= -1;
            }
            $sql = "SELECT inventoryID  FROM  inventorymgtofficer WHERE inventoryMgtOfficerID = $uid";
            $excute = $this->connection->query($sql);
            $array = $excute-> fetch_assoc();
            $id = $array['inventoryID'];
            $date= date('Y-m-d H:i:s',strtotime("-1 days"));
            $sql = "INSERT INTO inventoryitem(itemId,inventoryId ,quantity,transactionDate) VALUES ($itemId,$id,$quantity,'$date') ";
            $this->connection->query($sql);
            http_response_code(200); 
            echo json_encode(array("code"=>$errorCode['success']));
            exit();
        }else{
            http_response_code(200);                       
            echo json_encode(array("code"=>$errorCode['attributeMissing']));
            exit();
        }
    }
    public function updateInventory(array $data){
        //print_r($data);
    }
    public function getInventory(array $data){
        $uid = $data['userId'];
        if(count($data['receivedParams'])==1){
            $id = $data['receivedParams'][0];
            $id=Item::getId($id);
            $sql = "SELECT i.itemId,i.itemName,SUM(v.quantity) AS quantity, unitName FROM inventoryitem v, item i, inventorymgtofficer m, unit u WHERE m.inventoryID = v.inventoryId AND v.itemId = i.itemId AND m.inventoryMgtOfficerID = $uid  AND v.itemId = $id  AND i.unitType =u.unitId GROUP BY v.itemId HAVING SUM(v.quantity) > 0";
        }else{
            $sql = "SELECT i.itemId,i.itemName,SUM(v.quantity) AS quantity, unitName FROM inventoryitem v, item i, inventorymgtofficer m, unit u WHERE m.inventoryID = v.inventoryId AND v.itemId = i.itemId AND m.inventoryMgtOfficerID = $uid  AND i.unitType =u.unitId GROUP BY v.itemId HAVING SUM(v.quantity) > 0";
        }
        $excute = $this->connection->query($sql);
        $results = array();
        while($r = $excute-> fetch_assoc()) {
            $item = new Item();
            $item->setItemCode($r['itemId']);
            $r['itemId'] = $item->getItemCode();
            $results[] = $r;
        }
        $json = json_encode($results);
        echo $json;
    }
    public function getSafeHouse(){

    }
    public function getDvOfficeList(){
        
    }
    public function availableItem(array $data){
        $uid = $data['userId'];
        $sql = "SELECT i.itemId,i.itemName, unitName FROM inventoryitem v, item i, inventorymgtofficer m, unit u WHERE m.inventoryID = v.inventoryId AND v.itemId = i.itemId AND m.inventoryMgtOfficerID = $uid  AND i.unitType =u.unitId GROUP BY v.itemId HAVING SUM(v.quantity) > 0";
        $excute = $this->connection->query($sql);
        $results = array();
        while($r = $excute-> fetch_assoc()) {
            $item = new Item();
            $item->setItemCode($r['itemId']);
            $r['itemId'] = $item->getItemCode();
            $results[] = $r;
        }
        $json = json_encode($results);
        echo $json;
    }
}