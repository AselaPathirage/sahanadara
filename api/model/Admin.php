<?php
class Admin extends Employee{
    public function __construct($con){
        parent::__construct($con);
    }
    public function register(array $data){
        global $errorCode;
        if(isset($data['firstname']) && isset($data['lastname']) && isset($data['NIC']) && isset($data['email']) && isset($data['address']) && isset($data['TP_number']) && isset($data['user_role'])){
            $mail = new mail();
            $name = $data['firstname']." ".$data['lastname'];
            switch ($data['user_role']) {
                case 1:
                    $sql ="INSERT INTO gramaniladari (empName,empAddress,empEmail) VALUES ('$name','".$data['address']."','".$data['email']."');";
                    break;
                case 3:
                    $sql ="INSERT INTO districtsecretariat (empName,empAddress,empEmail) VALUES ('$name','".$data['address']."','".$data['email']."');";
                    break;
                case 4:
                    $sql ="INSERT INTO divisionalsecretariat (empName,empAddress,empEmail) VALUES ('$name','".$data['address']."','".$data['email']."');";
                    break;
            }
            $this->connection->query($sql);
            $tokenKey= $this->tokenKey(10);
            $password = $this->tokenKey(8);
            $sql = "SELECT LAST_INSERT_ID();";
            $execute = $this->connection->query($sql);
            $r = $execute-> fetch_assoc();
            $userId = $r["LAST_INSERT_ID()"];
            $role = $data['user_role'];
            $sql = "INSERT INTO login VALUES ($userId,'".md5($data['NIC'])."','".md5($password)."','$tokenKey',$role)";
            $this->connection->query($sql);
            $body ="Please use these creadentials to login DMS. You need to change your password after the login.<ul><li>User Name: ".$data['NIC']." </li><li>Password: $password </li></ul>";
            $mail->emailBody("About your account","Dear ".$data['firstname'],$body);
            $mail->sendMail($data['email'],"Account Information");
            echo json_encode(array("code"=>$errorCode['success']));
            exit();
        }else{
            http_response_code(406);
            echo json_encode(array("code"=>$errorCode['attributeMissing']));
            exit();
        }
    }
    public function searchUser(array $data){

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