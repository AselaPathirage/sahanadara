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
                    $sql0 = "SELECT empEmail FROM gramaniladari WHERE empEmail = '".$data['email']."'";
                    $sql ="INSERT INTO gramaniladari (empName,empAddress,empEmail,empTele) VALUES ('$name','".$data['address']."','".$data['email']."','".$data['TP_number']."');";
                    break;
                case 3:
                    $sql0 = "SELECT empEmail FROM districtsecretariat WHERE empEmail = '".$data['email']."'";
                    $sql ="INSERT INTO districtsecretariat (empName,empAddress,empEmail,empTele) VALUES ('$name','".$data['address']."','".$data['email']."','".$data['TP_number']."');";
                    break;
                case 4:
                    $sql0 = "SELECT empEmail FROM divisionalsecretariat WHERE empEmail = '".$data['email']."'";
                    $sql ="INSERT INTO divisionalsecretariat (empName,empAddress,empEmail,empTele) VALUES ('$name','".$data['address']."','".$data['email']."','".$data['TP_number']."');";
                    break;
            }
            $query = $this->connection->query($sql0);
            if($query->num_rows==0){
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
                switch ($role) {
                    case 1:
                        $gnId = $data['Gndivision'];
                        $sql ="UPDATE gndivision SET gramaNiladariID = $userId WHERE gndvId = $gnId";
                        break;
                    case 3:
                        $dsId = $data['District'];
                        $sql ="UPDATE districtsoffice SET districtSecretariat = $userId WHERE dsId = $dsId";
                        break;
                    case 4:
                        $dvId = $data['Division'];
                        $sql ="UPDATE divisionaloffice SET divisionalSecretariatID = $userId WHERE dvId = $dvId";
                        break;
                }
                $this->connection->query($sql);
                $body ="Please use these creadentials to login Sahanadara. You need to change your password after the login.<ul><li>User Name: ".$data['NIC']." </li><li>Password: $password </li></ul>";
                $mail->emailBody("About your account","Dear ".$data['firstname'],$body);
                $mail->sendMail($data['email'],"Account Information");
                echo json_encode(array("code"=>$errorCode['success']));
                exit();
            }else{
                http_response_code(400);
                echo json_encode(array("code"=>$errorCode['emailAlreadyInUse']));
                exit();   
            }
        }else{ 
            http_response_code(406);
            echo json_encode(array("code"=>$errorCode['attributeMissing']));
            exit();
        }
    }
    public function searchUser(array $data){
        $roleTable = array( 1=>array("tableName"=>"gramaniladari","primaryKey" => "gramaNiladariID"),
                            2=>array("tableName"=>"inventorymgtofficer","primaryKey" => "inventoryMgtOfficerID"),
                            3=>array("tableName"=>"districtsecretariat","primaryKey" => "districtSecretariatID"),
                            4=>array("tableName"=>"divisionalsecretariat","primaryKey" => "divisionalSecretariatID"),
                            5=>array("tableName"=>"admin","primaryKey" => "adminID"),
                            6=>array("tableName"=>"dismgtofficer","primaryKey" => "disMgtOfficerID"),
                            7=>array("tableName"=>"dmc","primaryKey" => "dmcID"),
                            8=>array("tableName"=>"responsibleperson","primaryKey" => "responsiblePersonID"));
        if(count($data['receivedParams'])==1){
            $sql = "SELECT ".$roleTable[$data['receivedParams'][0]]['primaryKey']." AS empId, empName,empAddress,empEmail,empTele,roleName,roleId FROM ".$roleTable[$data['receivedParams'][0]]['tableName'].",role WHERE roleId=".$data['receivedParams'][0];
        }elseif(count($data['receivedParams'])==2){
            $sql = "SELECT ".$roleTable[$data['receivedParams'][0]]['primaryKey']." AS empId, empName,empAddress,empEmail,empTele,roleName,roleId FROM ".$roleTable[$data['receivedParams'][0]]['tableName'].",role WHERE ".$roleTable[$data['receivedParams'][0]]['primaryKey']."=".$data['receivedParams'][1]." AND roleId=".$data['receivedParams'][0];
        }else{
            $sql = "(SELECT ".$roleTable[1]['primaryKey']." as empId,empName,empAddress,empEmail,empTele,roleName,roleId FROM gramaniladari,role WHERE roleId = 1)
                    UNION
                    (SELECT ".$roleTable[2]['primaryKey']." as empId,empName,empAddress,empEmail,empTele,roleName,roleId FROM inventorymgtofficer,role WHERE roleId = 2)
                    UNION
                    (SELECT ".$roleTable[3]['primaryKey']." as empId,empName,empAddress,empEmail,empTele,roleName,roleId FROM districtsecretariat,role WHERE roleId = 3)
                    UNION
                    (SELECT ".$roleTable[4]['primaryKey']." as empId,empName,empAddress,empEmail,empTele,roleName,roleId FROM divisionalsecretariat,role WHERE roleId = 4)
                    UNION
                    (SELECT ".$roleTable[5]['primaryKey']." as empId,empName,empAddress,empEmail,empTele,roleName,roleId FROM admin,role WHERE roleId = 5)
                    UNION
                    (SELECT ".$roleTable[6]['primaryKey']." as empId,empName,empAddress,empEmail,empTele,roleName,roleId FROM dismgtofficer,role WHERE roleId = 6)
                    UNION
                    (SELECT ".$roleTable[7]['primaryKey']." as empId,empName,empAddress,empEmail,empTele,roleName,roleId FROM dmc,role WHERE roleId = 7)
                    UNION
                    (SELECT ".$roleTable[8]['primaryKey']." as empId,empName,empAddress,empEmail,empTele,roleName,roleId FROM responsibleperson,role WHERE roleId = 8)";
        }
        $excute = $this->connection->query($sql);
        $results = array();
        while($r = $excute-> fetch_assoc()) {
            $results[] = $r;
        }
        $json = json_encode($results);
        echo $json;
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
