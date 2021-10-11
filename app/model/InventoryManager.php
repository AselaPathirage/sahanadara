<?php
class InventoryManager extends Noticer{
    public function __construct($con){
        parent::__construct($con);
    }

    public function addCompany($data){
        $companyName = $data[''];
        $email = $data[''];
        $sql = "INSERT INTO `company` (`consumerId`, `caompanyName`, `email`, `web`, `pass`, `companyState`, `authcode`, `username`) VALUES (NULL, '$companyName', '$email', NULL, NULL, NULL, NULL, NULL);";
        $this->connection->query($sql);
        echo json_encode("{'code':$sql}");
    }
    public function updateCompany($newValue,$id){
        $sql = "UPDATE company set caompanyName='$newValue' WHERE  consumerId = $id";
        $this->connection->query($sql);
        echo json_encode("{'code':$sql}");
    }
    public function getItem(){
        $sql = "SELECT * FROM `item`";
        $excute = $this->connection->query($sql);
        $results = array();
        while($r = $excute-> fetch_assoc()) {
            $results[] = $r;
        }
        $json = json_encode($results);
        echo $json;
    }
}