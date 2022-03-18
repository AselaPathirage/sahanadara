<?php
class InventoryManager extends Employee{
    private $inventory = null;
    use Noticer;
    use Viewer;

    public function __construct($con){
        parent::__construct($con);
        $this->inventory = new Inventory();
    }
    public function addItem(array $data){
        global $errorCode;
        if(isset($data['itemName']) && isset($data['unitType'])){
            $data['unitType'] = (int)$data['unitType'];
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
    public function updateItem(array $data){
        global $errorCode;
        if(isset($data['value']) && count($data['receivedParams'])==1){
            if($data['value']==""){
                echo json_encode(array("code"=>$errorCode['attributeMissing']));
                exit();
            }
            $itemName = $data['value'];
            $itemId = $data['receivedParams'][0]; 
            $itemId = Item::getId($itemId);
            $sql = "UPDATE `item` SET `itemName`='$itemName' WHERE itemId =$itemId;";
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
            $r['itemId'] = Item::getItemCode($r['itemId']);
            $results[] = $r;
        }
        $json = json_encode($results);
        echo $json;
    }
    public function getAllItem(array $data){
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
            $r['itemId'] = Item::getItemCode($r['itemId']);
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
            $r['itemId'] = Item::getItemCode($r['itemId']);
            $results[] = $r;
        }
        $json = json_encode($results);
        echo $json;
    }
    public function getDvOfficeList(array $data){
        $uid = $data['userId'];
        $sql = "SELECT dv.dvId AS id,dv.dvName AS division FROM division dv
        WHERE dv.dsId  IN (SELECT d.dsId AS id FROM inventorymgtofficer mn,inventory i,division d
        WHERE mn.inventoryID = i.inventoryId  AND mn.inventoryMgtOfficerID = $uid AND i.dvId = d.dvId) ORDER BY division";
        $excute = $this->connection->query($sql);
        $results = array();
        while ($r = $excute->fetch_assoc()) {
            $results[] = $r;
        }
        $json = json_encode($results);
        echo $json;
    }
    public function availableItem(array $data){
        $uid = $data['userId'];
        $sql = "SELECT i.itemId,i.itemName, unitName FROM inventoryitem v, item i, inventorymgtofficer m, unit u WHERE m.inventoryID = v.inventoryId AND v.itemId = i.itemId AND m.inventoryMgtOfficerID = $uid  AND i.unitType =u.unitId GROUP BY v.itemId HAVING SUM(v.quantity) > 0";
        $excute = $this->connection->query($sql);
        $results = array();
        while($r = $excute-> fetch_assoc()) {
            $r['itemId'] = Item::getItemCode($r['itemId']);
            $results[] = $r;
        }
        $json = json_encode($results);
        echo $json;
    }
    public function getneighbourInventoryItem(array $data){
        $uid = $data['userId'];
        $this->inventory->setInfo($uid);
        $division = $this->getDivision($uid)['id'];
        if(count($data['receivedParams'])==1){
            $id = $data['receivedParams'][0];
            $sql = "SELECT i.inventoryId,d.dvName AS division,item.itemId,item.itemName
            FROM inventory i,division d,item,inventoryitem
            WHERE  d.dvId IN (SELECT dvId FROM division,district WHERE division.dsId = district.dsId AND division.dsId=(SELECT dsId FROM division WHERE dvId = $division))
            AND inventoryitem.inventoryId = i.inventoryId AND item.itemId = inventoryitem.itemId
            AND i.dvId = d.dvId AND i.inventoryId = $id
            GROUP BY i.inventoryId,division,itemId HAVING SUM(inventoryitem.quantity) > 0";
        }else{
            $sql = "SELECT i.inventoryId,d.dvName AS division,item.itemId,item.itemName
            FROM inventory i,division d,item,inventoryitem
            WHERE  d.dvId IN (SELECT dvId FROM division,district WHERE division.dsId = district.dsId AND division.dsId=(SELECT dsId FROM division WHERE dvId = $division))
            AND inventoryitem.inventoryId = i.inventoryId AND item.itemId = inventoryitem.itemId
            AND i.dvId = d.dvId
            GROUP BY i.inventoryId,division,itemId HAVING SUM(inventoryitem.quantity) > 0";
        }
        $excute = $this->connection->query($sql);
        $results = array("inventory"=>array());
        while($r = $excute-> fetch_assoc()) {
            if(!isset($results["inventory"][$r["division"]])) {
                $results["inventory"][$r["division"]]["inventoryId"] = $r["inventoryId"];
            }
            $results["inventory"][$r["division"]][$r["itemName"]]["id"] = $r["itemId"];
        }
        $sql = "SELECT i.inventoryId,item.itemId,item.itemName
                FROM inventory i,division d,item,inventoryitem
                WHERE d.dvId IN (SELECT dvId FROM division,district WHERE division.dsId = district.dsId AND division.dsId=(SELECT dsId FROM division WHERE dvId = 1))
                AND item.itemId = inventoryitem.itemId
                AND i.dvId = d.dvId AND i.inventoryId = inventoryitem.inventoryId
                GROUP BY i.inventoryId,itemId HAVING SUM(inventoryitem.quantity) > 0";
        $excute = $this->connection->query($sql);
        $results['all'] = array();
        while($r = $excute-> fetch_assoc()) {
            $results["all"][$r["itemName"]]["id"] = $r["itemId"];
        }
        $json = json_encode($results);
        echo $json;
    }
    public function countItem(array $data){
        $uid = $data['userId'];
        $sql = "SELECT i.itemId,i.itemName, unitName FROM inventoryitem v, item i, inventorymgtofficer m, unit u WHERE m.inventoryID = v.inventoryId AND v.itemId = i.itemId AND m.inventoryMgtOfficerID = $uid  AND i.unitType =u.unitId GROUP BY v.itemId HAVING SUM(v.quantity) > 0";
        $excute = $this->connection->query($sql);
        $results = array();
        $results['item'] = $excute->num_rows;
        $json = json_encode($results);
        echo $json;
    }
    public function getMySelf(array $data){
        global $errorCode;
        $uid = $data['userId'];
        if(count($data['receivedParams'])==2){
            if(strcasecmp("self",$data['receivedParams'][0])==0){
                if(strcasecmp("district",$data['receivedParams'][1])==0){
                    $output = $this->getDistrict($uid);
                }else if(strcasecmp("division",$data['receivedParams'][1])==0){
                    $output = $this->getDivision($uid);
                }else{
                    http_response_code(200);                       
                    echo json_encode(array("code"=>$errorCode['unableToHandle']));
                    exit();
                }
                $json = json_encode($output);
                echo $json;
            }else{
                http_response_code(200);                       
                echo json_encode(array("code"=>$errorCode['permissionError']));
                exit();   
            }
        }else{
            http_response_code(200);                       
            echo json_encode(array("code"=>$errorCode['unableToHandle']));
            exit();
        }
    }   
    public function getGNDivision(array $data){
        $id = $data['userId'];
        $sql = "SELECT g.* FROM gndivision g,divisionaloffice d,dismgtofficer m 
        WHERE m.disMgtOfficerID = d.disasterManager AND g.dvId = d.dvId AND m.disMgtOfficerID = $id  AND g.safeHouseID IS NULL";
        $excute = $this->connection->query($sql);
        $results = array();
        while($r = $excute-> fetch_assoc()) {
            $results[] = $r;
        }
        $json = json_encode($results);
        echo $json;
    }
    public function getAids(array $data){
        $uid = $data['userId'];
        $this->inventory->setInfo($uid);
        $division = $this->getDivision($uid)['id'];
        if(count($data['receivedParams'])==1){
            $id = $data['receivedParams'][0];
            $id = SafeHouse::getId($id);
            $sql = "SELECT sf.safehouseId,s.statusId, i.itemId,i.itemName, SUM(s.quantity) AS quantity FROM safehousestatusrequesteditem s,item i, safehousestatus sf, gndivision gn WHERE s.statusId = sf.r_id AND s.itemId = i.itemId AND sf.safehouseId = gn.safeHouseID AND sf.safehouseId = $id AND s.status ='n' AND gn.gndvId IN (SELECT gndivision.gndvId FROM gndivision,division WHERE gndivision.dvId = division.dvId AND division.dvId = $division) GROUP BY sf.safehouseId,i.itemId ORDER BY sf.createdDate DESC;";
        }else{
            $sql = "SELECT sf.safehouseId,s.statusId, i.itemId,i.itemName, SUM(s.quantity) AS quantity FROM safehousestatusrequesteditem s,item i, safehousestatus sf, gndivision gn WHERE s.statusId = sf.r_id AND s.itemId = i.itemId AND sf.safehouseId = gn.safeHouseID AND s.status ='n' AND gn.gndvId IN (SELECT gndivision.gndvId FROM gndivision,division WHERE gndivision.dvId = division.dvId AND division.dvId = $division) GROUP BY sf.safehouseId,i.itemId ORDER BY sf.createdDate DESC;";
        }
        $excute = $this->connection->query($sql);
        $results = array();
        while($r = $excute-> fetch_assoc()) {
            $safeHouseId = SafeHouse::getSafeHouseCode($r['safehouseId']);
            $r['safehouseId'] = $safeHouseId;
            $itemId = $r['itemId'];
            $quantity = $r['quantity'];
            $sql = "SELECT i.itemId,SUM(v.quantity) AS quantity,u.unitName FROM inventoryitem v, item i, inventorymgtofficer m, unit u WHERE m.inventoryID = v.inventoryId AND v.itemId = i.itemId AND i.unitType =u.unitId AND m.inventoryMgtOfficerID = $uid  AND v.itemId = $itemId GROUP BY v.itemId";
            $tempQuery = $this->connection->query($sql);
            if($tempQuery->num_rows >0){
                $data = $tempQuery-> fetch_assoc();
                if($data['quantity'] >= $quantity){
                    $r['availability'] = "Yes";
                }else{
                    $r['availability'] = "No";
                }
                $r['inInventory'] = $data['quantity'];
                $r['unit'] = $data['unitName'];
            }else{
                $r['availability'] = "No";  
            } 
            $r['itemId'] = Item::getItemCode($r['itemId']);
            $results[] = $r;
        }
        $json = json_encode($results);
        echo $json;
    }
    public function getAidsSafeHouse(array $data){
        $uid = $data['userId'];
        $this->inventory->setInfo($uid);
        $division = $this->getDivision($uid)['id'];
        $sql = "WITH cte AS (SELECT sf.safehouseId,sh.safeHouseName,sf.adultMale+sf.adultFemale+sf.children+sf.disabledPerson AS quantity, DATE(sf.createdDate) AS createdDate, ROW_NUMBER() OVER (PARTITION BY sf.safehouseId ORDER BY sf.createdDate DESC) AS rn FROM safehousestatusrequesteditem s, safehousestatus sf, gndivision gn, safehouse sh WHERE s.statusId = sf.r_id AND sf.safehouseId = gn.safeHouseID AND gn.safeHouseID = sh.safeHouseID AND s.status ='n' AND gn.gndvId IN (SELECT gndivision.gndvId FROM gndivision,division WHERE gndivision.dvId = division.dvId AND division.dvId = 10) ORDER BY sf.createdDate)SELECT * FROM cte WHERE rn = 1;";
        $excute = $this->connection->query($sql);
        $results = array();
        while($r = $excute-> fetch_assoc()) {
            $safeHouseId = SafeHouse::getSafeHouseCode($r['safehouseId']);
            $r['safehouseId'] = $safeHouseId;
            unset($r['rn']);
            if($r['quantity']<20){
                $priority = 'low';
            }elseif($r['quantity']<50){
                $priority = 'medium';
            }else{
                $priority = 'high';
            }
            $r['priority'] = $priority;
            $results[] = $r;
        }
        $json = json_encode($results);
        echo $json;
    }
    public function getDistrict($userId){
        $this->inventory->setInfo($userId);
        $temp = $this->inventory->getDistrict();
        $district['name'] = $temp['dsName'];
        $district['id'] = $temp['dsId'];
        return $district;
    }
    public function getDivision($userId){
        $this->inventory->setInfo($userId);
        $temp = $this->inventory->getDivision();
        $division['name'] = $temp['dvName'];
        $division['id'] = $temp['dvId'];
        return $division;
    }
}