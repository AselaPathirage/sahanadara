<?php
class DistrictSecretariat extends Employee{
    public function __construct($con){
        parent::__construct($con);
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
            $sql = "(SELECT gramaniladari.".$roleTable[1]['primaryKey']." as empId,empName,empAddress,empEmail,empTele,roleName,roleId,gndvId,division.dvId,district.dsId FROM gramaniladari,role,gndivision,division,district WHERE roleId = 1 AND gndivision.gramaNiladariID = gramaniladari.gramaNiladariID AND gndivision.dvId = division.dvId AND division.dsId = district.dsId)
                    UNION
                    (SELECT ".$roleTable[2]['primaryKey']." as empId,empName,empAddress,empEmail,empTele,roleName,roleId,NULL AS gndvId,division.dvId,district.dsId FROM inventorymgtofficer,inventory,role,gndivision,division,district WHERE roleId = 2 AND inventorymgtofficer.inventoryID = inventory.inventoryId AND inventory.dvId = division.dvId AND division.dsId = district.dsId AND gndivision.dvId = division.dvId GROUP BY district.dsId,division.dvId)
                    UNION
                    (SELECT ".$roleTable[3]['primaryKey']." as empId,empName,empAddress,empEmail,empTele,roleName,roleId,NULL AS gndvId,NULL AS dvId,district.dsId FROM districtsecretariat,role,district,districtsoffice WHERE roleId = 3 AND districtsecretariat.districtSecretariatID = districtsoffice.districtSecretariat AND districtsoffice.dsId = district.dsId)
                    UNION
                    (SELECT divisionalsecretariat.".$roleTable[4]['primaryKey']." as empId,empName,empAddress,empEmail,empTele,roleName,roleId,NULL as gndvId,division.dvId,district.dsId FROM divisionalsecretariat,role,division,district,divisionaloffice WHERE roleId = 4 AND divisionalsecretariat.divisionalSecretariatID = divisionaloffice.divisionalSecretariatID AND divisionaloffice.dvId = division.dvId AND division.dsId = district.dsId)
                    UNION
                    (SELECT ".$roleTable[5]['primaryKey']." as empId,empName,empAddress,empEmail,empTele,roleName,roleId,NULL as gndvId,NULL as dvId,NULL as dsId FROM admin,role WHERE roleId = 5)
                    UNION
                    (SELECT dismgtofficer.".$roleTable[6]['primaryKey']." as empId,empName,empAddress,empEmail,empTele,roleName,roleId,NULL as gndvId,division.dvId,district.dsId FROM dismgtofficer,role,division,district,divisionaloffice WHERE roleId = 6 AND dismgtofficer.disMgtOfficerID = divisionaloffice.disasterManager AND divisionaloffice.dvId = division.dvId AND division.dsId = district.dsId)
                    UNION
                    (SELECT ".$roleTable[7]['primaryKey']." as empId,empName,empAddress,empEmail,empTele,roleName,roleId,NULL as gndvId,NULL as dvId,NULL as dsId FROM dmc,role WHERE roleId = 7)
                    UNION
                    (SELECT responsibleperson.".$roleTable[8]['primaryKey']." as empId,empName,empAddress,empEmail,empTele,roleName,roleId,gndvId,division.dvId,district.dsId FROM responsibleperson,role,division,district,gndivision WHERE roleId = 8 AND responsibleperson.safeHouseID = gndivision.safeHouseID AND gndivision.dvId = division.dvId AND division.dsId = district.dsId)";
        }

        $excute = $this->connection->query($sql);
        $results = array();
        while($r = $excute-> fetch_assoc()) {
            $results[] = $r;
        }
        $json = json_encode($results);
        echo $json;
    }
    
    public function getProfileDetails(array $data)
    {
        $uid = $data['userId'];
        $sql = "SELECT * from districtsecretariat d JOIN districtsoffice o ON d.districtSecretariatID = o.districtSecretariat LEFT JOIN districtofficecontact c ON c.districtSOfficeID = o.districtSOfficeID WHERE d.districtSecretariatID = ".$uid;
        $excute = $this->connection->query($sql);
        while ($r = $excute->fetch_assoc()) {
            $results[] = $r;
        }
        $json = json_encode($results);
        echo $json;
    }
}