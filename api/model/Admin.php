<?php
class Admin extends Employee{
    public function __construct($con){
        parent::__construct($con);
    }
    public function register(array $data){
        echo "efsdfsd";
    }
    public function searchUser(array $data){
        $mail = new mail();
        $mail->emailBody("About your account","Dear Naween","use this item");
        $mail->sendMail("htnaweenpasindu@gmail.com","login credeantials");
    }
    public function getDistrict(array $data){
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
    public function getDivision(array $data){
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
    public function getGnDivision(array $data){
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
    public function DBtoJson(){
        $sql = "SELECT d.dsId,d.dsName,dv.dvId,dv.dvName,gn.gndvId,gn.gnDvName FROM district d,division dv,gndivision gn 
                WHERE d.dsId = dv.dsId AND dv.dvId = gn.dvId";
        $excute = $this->connection->query($sql);
        $results = array("district"=>array());
        while($r = $excute-> fetch_assoc()) {
            if(!isset($results["district"][$r["dsName"]])) {
                $results["district"][$r["dsName"]] = array("dsId"=>$r["dsId"]);
            }
            if(!isset($results["district"][$r["dsName"]]["division"][$r["dvName"]])) {
                $results["district"][$r["dsName"]]["division"][$r["dvName"]] = array("dvId"=>$r["dvId"]);
            }
            $results["district"][$r["dsName"]]["division"][$r["dvName"]]["gnArea"][$r["gnDvName"]]["gndvId"] = $r["gndvId"];
        }
        $json = json_encode($results);
        echo $json;
    }
}
// if(!isset($results[$r["dsName"]])) {
//     $results[$r["dsName"]] = array("dsId"=>$r["dsId"]);
// }
// if(!isset($results[$r["dsName"]][$r["dvName"]])) {
//     $results[$r["dsName"]][$r["dvName"]] = array("dvId"=>$r["dvId"]);
// }
// $results[$r["dsName"]][$r["dvName"]][$r["gnDvName"]]["gndvId"] = $r["gndvId"];

// if(!isset($results["district"][$r["dsName"]])) {
//     $results["district"][$r["dsName"]] = array("dsId"=>$r["dsId"]);
// }
// if(!isset($results["district"][$r["dsName"]]["division"][$r["dvName"]])) {
//     $results["district"][$r["dsName"]]["division"][$r["dvName"]] = array("dvId"=>$r["dvId"]);
// }
// $results["district"][$r["dsName"]]["division"][$r["dvName"]]["gnArea"][$r["gnDvName"]]["gndvId"] = $r["gndvId"];