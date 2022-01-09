<?php
class ResponsiblePerson  extends Employee{
    protected $connection;
    public function __construct($con){
        parent::__construct($con);
    }  
    public function getAllItem(array $data){
        $sql = "SELECT * FROM `item`, `unit` WHERE item.unitType=unit.unitId  ORDER BY item.itemId";
        $excute = $this->connection->query($sql);
        $results = array();
        while($r = $excute-> fetch_assoc()) {
            $r['itemId'] = Item::getItemCode($r['itemId']);
            $results[] = $r;
        }
        $json = json_encode($results);
        echo $json;
    }
}