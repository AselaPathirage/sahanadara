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
    public function getStats(array $data){
        global $errorCode;
        $uid = $data['userId'];
        $results = array();
        $sql = "SELECT i.itemId FROM inventoryitem v, item i, inventorymgtofficer m WHERE m.inventoryID = v.inventoryId AND v.itemId = i.itemId AND m.inventoryMgtOfficerID = $uid  GROUP BY v.itemId HAVING SUM(v.quantity) > 0";
        $excute = $this->connection->query($sql);
        $results['numberOfItems']= $excute->num_rows;
        $division = $this->getDivision($uid);
        $divisionId = $division['id'];
        $this->inventory->setInfo($uid);
        $inventoryId = $this->inventory->getId();
        $sql = "SELECT servicerequest.r_id AS `id`FROM servicerequest,divisionaloffice,inventory WHERE divisionaloffice.dvId = inventory.dvId AND inventory.inventoryId = servicerequest.inventoryId AND servicerequest.inventoryId <> $inventoryId AND servicerequest.currentStatus = 'p'  AND (servicerequest.requestingFrom = 0 OR servicerequest.requestingFrom =$divisionId) AND servicerequest.createdDate = CURDATE()  AND servicerequest.requestedDate >= CURDATE() AND servicerequest.r_id NOT IN (SELECT DISTINCT distributeservice.serviceRequestId FROM distributeservice)  ORDER BY id;";
        $excute = $this->connection->query($sql);
        $results['serviceRequest']= $excute->num_rows;
        $sql = "WITH cte AS (SELECT sf.safehouseId, ROW_NUMBER() OVER (PARTITION BY sf.safehouseId ORDER BY sf.createdDate DESC) AS rn FROM safehousestatusrequesteditem s, safehousestatus sf, gndivision gn, safehouse sh WHERE s.statusId = sf.r_id AND sf.safehouseId = gn.safeHouseID AND sh.isUsing <> 'n' AND gn.safeHouseID = sh.safeHouseID AND s.status ='n' AND gn.gndvId IN (SELECT gndivision.gndvId FROM gndivision,division WHERE gndivision.dvId = division.dvId AND division.dvId = 10) ORDER BY sf.createdDate)SELECT * FROM cte WHERE rn = 1;";
        $excute = $this->connection->query($sql);
        $results['aidRequests']= $excute->num_rows;
        $json = json_encode($results);
        echo $json;
    }
    public function addAidNotice(array $data){
        global $errorCode;
        $uid = $data['userId'];
        if(isset($data['title']) && isset($data['numOfFamillies']) && isset($data['numOfPeople']) && isset($data['safeHouseId']) && isset($data['item'])){
            $safeHouseId=SafeHouse::getId($data['safeHouseId']);
            foreach($data['item'] as $itemName => $quantity){
                $sql="SELECT item.itemId  FROM item WHERE item.itemName LIKE '%".$itemName."%' LIMIT 1";
                $excute = $this->connection->query($sql);
                $temp = $excute->fetch_assoc();
                $itemId = $temp['itemId'];
                $sql="SELECT safehousestatus.r_id,safehousestatusrequesteditem.quantity FROM safehousestatus,safehousestatusrequesteditem WHERE safehousestatusrequesteditem.statusId = safehousestatus.r_id AND safehousestatus.safehouseId = $safeHouseId AND safehousestatusrequesteditem.itemId =$itemId ORDER BY safehousestatus.createdDate DESC;";
                $excute = $this->connection->query($sql);
                while($r = $excute-> fetch_assoc()) {
                    if($quantity - $r['quantity'] >= 0){
                        $quantity -= $r['quantity'];
                        $r_id=$r['r_id'];
                        $sql="UPDATE safehousestatusrequesteditem SET safehousestatusrequesteditem.status='s' WHERE safehousestatusrequesteditem.statusId = $r_id AND safehousestatusrequesteditem.itemId = $itemId";
                        $this->connection->query($sql);//echo $sql;
                    }else if($quantity>0){
                        $r_id=$r['r_id'];
                        $quantity = $r['quantity'] - $quantity;
                        $sql="UPDATE safehousestatusrequesteditem SET safehousestatusrequesteditem.quantity=$quantity WHERE safehousestatusrequesteditem.statusId = $r_id AND safehousestatusrequesteditem.itemId = $itemId";
                        $this->connection->query($sql);//echo $sql;
                    }
                }
            }
            $this->addNotice($data);
        }else{
            http_response_code(200);  
            echo json_encode(array("code"=>$errorCode['attributeMissing']));
            exit();
        }
    }
    public function addDistributeStatus(array $data){
        global $errorCode;
        if(isset($data['safeHouseId']) && isset($data['item'])){
            $uid = $data['userId'];
            $safeHouseId=SafeHouse::getId($data['safeHouseId']);
            // $sql="INSERT INTO distributeitem(safeHouseId) VALUES ($safeHouseId);";
            // $this->connection->query($sql);
            // $sql = "SELECT LAST_INSERT_ID();";
            // $excute = $this->connection->query($sql);
            // $r = $excute-> fetch_assoc();
            // $distributeId = $r['LAST_INSERT_ID()']; //$id=Item::getId($id);
            // $this->inventory->setInfo($uid);
            // $inventoryId = $this->inventory->getId();
            $sql = "";
            foreach($data['item'] as $item=>$quantity){
                $itemId=Item::getId($item); 
                $sql="SELECT safehousestatus.r_id,safehousestatusrequesteditem.quantity FROM safehousestatus,safehousestatusrequesteditem WHERE safehousestatusrequesteditem.statusId = safehousestatus.r_id AND safehousestatus.safehouseId = $safeHouseId AND safehousestatusrequesteditem.itemId =$itemId ORDER BY safehousestatus.createdDate DESC;";
                $excute = $this->connection->query($sql);
                while($r = $excute-> fetch_assoc()) {
                    if($quantity - $r['quantity'] >= 0){
                        $quantity -= $r['quantity'];
                        $r_id=$r['r_id'];
                        $sql="UPDATE safehousestatusrequesteditem SET safehousestatusrequesteditem.status='s' WHERE safehousestatusrequesteditem.statusId = $r_id AND safehousestatusrequesteditem.itemId = $itemId";
                        $this->connection->query($sql);//echo $sql;
                    }else if($quantity>0){
                        $r_id=$r['r_id'];
                        $quantity = $r['quantity'] - $quantity;
                        $sql="UPDATE safehousestatusrequesteditem SET safehousestatusrequesteditem.quantity=$quantity WHERE safehousestatusrequesteditem.statusId = $r_id AND safehousestatusrequesteditem.itemId = $itemId";
                        $this->connection->query($sql);//echo $sql;
                    }
                }
            }
            $this->addDistribute($data);
        }else{
            http_response_code(200);  
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
        $sql = "SELECT i.itemId,i.itemName, unitName,SUM(v.quantity) AS inInventory FROM inventoryitem v, item i, inventorymgtofficer m, unit u WHERE m.inventoryID = v.inventoryId AND v.itemId = i.itemId AND m.inventoryMgtOfficerID = $uid  AND i.unitType =u.unitId GROUP BY v.itemId HAVING SUM(v.quantity) > 0 ORDER BY i.itemName";
        $excute = $this->connection->query($sql);
        $results = array();
        while($r = $excute-> fetch_assoc()) {
            $r['itemId'] = Item::getItemCode($r['itemId']);
            $results[] = $r;
        }
        $json = json_encode($results);
        echo $json;
    }
    public function addServiceRequest(array $data){
        global $errorCode;
        $uid = $data['userId'];
        if(isset($data['division']) && isset($data['requiredDate']) && isset($data['item'])){
            $division = $data['division'];
            $requiredDate = $data['requiredDate'];
            if(isset($data['note'])){
                $note = $data['note'];
            }else{
                $note = "";
            }
            $requestingFrom = $data['division'];
            $this->inventory->setInfo($uid);
            $inventoryId = $this->inventory->getId();
            $sql = "INSERT INTO servicerequest(inventoryId,requestedDate,requestingFrom,note) VALUES ($inventoryId,'$requiredDate',$requestingFrom,'$note'); SET @last_id_in_table = LAST_INSERT_ID();";
            foreach($data['item'] as $item => $quantity){
                $itemId=Item::getId(trim($item));
                $sql .="INSERT INTO  servicerequestitem(r_id,itemId,quantity) VALUES (@last_id_in_table,$itemId,$quantity);";
            }
            //echo $sql;
            $this->connection->multi_query($sql);
            echo json_encode(array("code"=>$errorCode['success']));
        }else{
            http_response_code(200);                       
            echo json_encode(array("code"=>$errorCode['attributeMissing']));
            exit();
        }
    }
    public function getServiceRequest(array $data){
        $uid = $data['userId'];
        $division = $this->getDivision($uid);
        $divisionId = $division['id'];
        $this->inventory->setInfo($uid);
        $inventoryId = $this->inventory->getId();
        if(count($data['receivedParams'])==1){
            $id = $data['receivedParams'][0];
            $id=ServiceRequestNotice::getId($id);
            $sql = "SELECT servicerequest.r_id AS `id`,divisionaloffice.divisionalSofficeName AS `name`,servicerequest.requestedDate,servicerequest.currentStatus AS `status`,servicerequest.note,servicerequest.requestingFrom FROM servicerequest,divisionaloffice,inventory WHERE divisionaloffice.dvId = inventory.dvId AND inventory.inventoryId = servicerequest.inventoryId AND servicerequest.r_id= $id AND (servicerequest.requestingFrom = 0 OR servicerequest.requestingFrom =$divisionId) ORDER BY id;";
        }else{
            $sql = "SELECT servicerequest.r_id AS `id`,divisionaloffice.divisionalSofficeName AS `name`,servicerequest.requestedDate,servicerequest.currentStatus AS `status`,servicerequest.note,servicerequest.requestingFrom FROM servicerequest,divisionaloffice,inventory WHERE divisionaloffice.dvId = inventory.dvId AND inventory.inventoryId = servicerequest.inventoryId AND servicerequest.inventoryId <> $inventoryId AND servicerequest.currentStatus = 'p'  AND (servicerequest.requestingFrom = 0 OR servicerequest.requestingFrom =$divisionId)  AND servicerequest.requestedDate >= CURDATE()  AND servicerequest.r_id NOT IN (SELECT DISTINCT distributeservice.serviceRequestId FROM distributeservice)  ORDER BY id;";
        }
        $excute = $this->connection->query($sql);
        $results = array();
        while($r = $excute-> fetch_assoc()) {
            $serviceRequestId = $r['id'];
            $sql= "(SELECT servicerequestitem.itemId,item.itemName,unit.unitName AS unit,servicerequestitem.quantity AS requestedAmount,SUM(inventoryitem.quantity) AS quantity
            FROM servicerequestitem,item,unit,inventoryitem
            WHERE servicerequestitem.itemId = item.itemId AND inventoryitem.itemId = item.itemId AND item.unitType = unit.unitId AND servicerequestitem.r_id = $serviceRequestId AND inventoryitem.inventoryId = $inventoryId GROUP BY servicerequestitem.r_id,servicerequestitem.itemId)
            UNION
            (SELECT servicerequestitem.itemId,item.itemName,unit.unitName AS unit,servicerequestitem.quantity AS requestedAmount, 0 AS quantity
             FROM servicerequestitem,item,unit
             WHERE servicerequestitem.itemId = item.itemId AND item.unitType = unit.unitId AND servicerequestitem.r_id = $serviceRequestId AND servicerequestitem.itemId NOT IN (SELECT inventoryitem.itemId FROM inventoryitem WHERE inventoryitem.inventoryId = $inventoryId GROUP BY inventoryitem.itemId));";
             $temp = $this->connection->query($sql);
             $requestItem = array();
             while($p = $temp-> fetch_assoc()) {
                $p['itemId'] = Item::getItemCode($p['itemId']);
                array_push($requestItem,$p);
             }
             $id = ServiceRequestNotice::getServiceRequestNoticeCode($r['id']);
             $r['id']= $id;
             if($r['requestingFrom']==0){
                $r['requestingFrom']='All';
             }else{
                $r['requestingFrom']='us';
             }
             $r['item'] = $requestItem;
             $results[] = $r;
        }
        $json = json_encode($results);
        echo $json;
    }
    public function acceptServiceRequest(array $data){
        global $errorCode;
        if(isset($data['requestId']) && isset($data['item'])){
            if(count($data['item'])>0){
                $uid = $data['userId'];
                $id = ServiceRequestNotice::getId($data['requestId']);
                $this->inventory->setInfo($uid);
                $inventoryId = $this->inventory->getId();
                $sql = "SELECT recordId  FROM distributeservice WHERE serviceRequestId=".$id;
                $query= $this->connection->query($sql);
                if($query->num_rows==0){
                    $sql = "INSERT INTO distributeservice(inventoryId,serviceRequestId) VALUES ($inventoryId,$id);";
                    $this->connection->query($sql);
                    $sql = "SELECT LAST_INSERT_ID();";
                    $excute = $this->connection->query($sql);
                    $r = $excute-> fetch_assoc();
                    $distributeserviceId = $r['LAST_INSERT_ID()'];
                    $sql = "";
                    foreach($data['item'] as $itemId => $quantity){
                        $itemId = $itemId=Item::getId(trim($itemId));
                        $quantity = -1*$quantity;
                        $sql .= "INSERT INTO inventoryitem(itemId,inventoryId,quantity) VALUES ($itemId,$inventoryId,$quantity);SET @last_id = LAST_INSERT_ID();INSERT INTO servicedistributeitemrecord VALUES ($distributeserviceId,@last_id);";
                    }
                    $this->connection->multi_query($sql);
                }
                echo json_encode(array("code"=>$errorCode['success']));
            }else{
                http_response_code(200);                       
                echo json_encode(array("code"=>$errorCode['attributeMissing']));
                exit();
            }
        }else{
            http_response_code(200);                       
            echo json_encode(array("code"=>$errorCode['attributeMissing']));
            exit();
        }  
    }
    public function declineServiceRequest(array $data){
        global $errorCode;
        $uid = $data['userId'];
        $division = $this->getDivision($uid);
        $divisionId = $division['id'];
        if(count($data['receivedParams'])>0){
            $id = ServiceRequestNotice::getId($data['receivedParams'][0]);
            $sql = "UPDATE servicerequest
            SET servicerequest.currentStatus ='r'
            WHERE servicerequest.r_id = $id AND servicerequest.requestingFrom = $divisionId";
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
    public function getInventoryOffices(array $data){
        $uid = $data['userId'];
        $district = $this->getDistrict($uid);
        $districtId = $district['id'];
        $sql = "SELECT division.dvId,division.dvName FROM inventory,division WHERE division.dvId = inventory.dvId AND division.dsId =".$districtId;
        $excute = $this->connection->query($sql);
        $results = array();
        while($r = $excute-> fetch_assoc()) {
            $r['id'] = $r['dvId'];
            $r['division'] = $r['dvName']; 
            array_shift($r);
            array_shift($r);
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
    public function addDistribute(array $data){
        global $errorCode;
        $uid = $data['userId'];
        if(isset($data['safeHouseId']) && isset($data['item'])){
            if(count($data['item'])==0){
                http_response_code(200);                       
                echo json_encode(array("code"=>$errorCode['attributeMissing']));
                exit();
            }else{
                $safeHouseId=SafeHouse::getId($data['safeHouseId']);
                $sql = "INSERT INTO  distributeitem(safeHouseId) VALUES (".$safeHouseId.")";
                $this->connection->query($sql);
                $sql = "SELECT LAST_INSERT_ID();";
                $execute = $this->connection->query($sql);
                $r = $execute-> fetch_assoc();
                $distributeId = $r["LAST_INSERT_ID()"];
                $this->inventory->setInfo($uid);
                $inventoryId = $this->inventory->getId();
                $sql ="";
                foreach($data['item'] as $item => $quantity){
                    $itemId=Item::getId(trim($item));
                    $quantity = -1*$quantity;
                    $sql .="INSERT INTO  inventoryitem(itemId,inventoryId,quantity) VALUES ($itemId,$inventoryId,$quantity);SET @last_id_in_table = LAST_INSERT_ID();INSERT INTO distributeitemrecord VALUES ($distributeId, @last_id_in_table);";
                }
                $this->connection->multi_query($sql);
                echo json_encode(array("code"=>$errorCode['success']));
            }
        }else{
            http_response_code(200);                       
            echo json_encode(array("code"=>$errorCode['attributeMissing']));
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
                $r['inInventory'] = 0;
                $sql = "SELECT u.unitName FROM item i,unit u WHERE u.unitId = i.unitType AND i.itemId =".$itemId;
                $tempQuery = $this->connection->query($sql);
                if($tempQuery->num_rows >0){
                    $data = $tempQuery-> fetch_assoc();
                    $r['unit'] = $data['unitName'];
                }else{
                    $r['unit']="units";
                }
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
        $sql = "WITH cte AS (SELECT sf.safehouseId,sh.safeHouseName,sf.adultMale+sf.adultFemale+sf.children+sf.disabledPerson AS quantity, DATE(sf.createdDate) AS createdDate, ROW_NUMBER() OVER (PARTITION BY sf.safehouseId ORDER BY sf.createdDate DESC) AS rn FROM safehousestatusrequesteditem s, safehousestatus sf, gndivision gn, safehouse sh WHERE s.statusId = sf.r_id AND sf.safehouseId = gn.safeHouseID AND sh.isUsing <> 'n' AND gn.safeHouseID = sh.safeHouseID AND s.status ='n' AND gn.gndvId IN (SELECT gndivision.gndvId FROM gndivision,division WHERE gndivision.dvId = division.dvId AND division.dvId = 10) ORDER BY sf.createdDate)SELECT * FROM cte WHERE rn = 1;";
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