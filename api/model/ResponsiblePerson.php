<?php
class ResponsiblePerson  extends Employee{
    protected $connection;
    public function __construct($con){
        parent::__construct($con);
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
}