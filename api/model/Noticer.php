<?php
trait Noticer{
    public function addNotice(array $data){
        global $errorCode;
        if(isset($data['title']) && isset($data['numOfFamillies']) && isset($data['numOfPeople']) && isset($data['safeHouseId']) && isset($data['item'])){
            $title = $data['title'];
            $numOfFamillies = $data['numOfFamillies'];
            $numOfPeople = $data['numOfPeople'];
            $safeHouseId = SafeHouse::getId($data['safeHouseId']);
            $description = "";
            if(isset($data['description'])){
                $description = $data['description'];
            }
            $sql = "INSERT INTO `donationreqnotice` (`safehouseId`, `title`, `numOfFamilies`, `numOfPeople`, `note`) VALUES ($safeHouseId, '$title', '$numOfFamillies', '$numOfPeople', '$description');";
            $this->connection->query($sql);
            if(count($data['item'])>0){
                $sql = "SELECT LAST_INSERT_ID();";
                $execute = $this->connection->query($sql);
                $r = $execute-> fetch_assoc();
                $noticeId = $r["LAST_INSERT_ID()"];
                $len = count($data['item']);
                $items = array_keys($data['item']);
                $values = array_values($data['item']);
                $sql ="INSERT INTO `noticeitem` (`noticeId`, `itemName`, `quantitity`) VALUES ";
                for ($x = 0; $x < $len; $x++) { 
                    $item = $items[$x];
                    $sql0 = "SELECT itemId FROM item WHERE itemName = '$item' LIMIT 1;";
                    $execute = $this->connection->query($sql0);
                    if($execute->num_rows == 0){
                        $sql1 = "INSERT INTO item( itemName, unitType ) VALUES ('$item' , 4);";
                        $this->connection->query($sql1);
                    }
                    $value = $values[$x];
                    $sql  .= "($noticeId, '$item', $value)";
                    if(($x+1) != $len){
                        $sql .= ", ";
                    }
                }
                $this->connection->query($sql);
            }
            echo json_encode(array("code"=>$errorCode['success']));
            exit();
        }else{
            http_response_code(200);                       
            echo json_encode(array("code"=>$errorCode['attributeMissing']));
            exit();
        }
    }
    public function updateNotice(array $data){
        global $errorCode;
    }
    public function deleteNotice(array $data){
        global $errorCode;
        if(count($data['receivedParams'])==1){
            $id = $data['receivedParams'][0];
            $pk = Notice::getId($id);
            $sql = "UPDATE donationreqnotice SET donationreqnotice.appovalStatus = 'd' WHERE donationreqnotice.recordId = $pk;";
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
    public function viewNotice(array $data){
        global $errorCode;
        $userId = $data['userId'];
        $division = $this->getDivision()['id'];
        $sql = "SELECT n.* FROM donationreqnotice n,division d,gndivision g WHERE g.safeHouseID IN (SELECT safeHouseID FROM gndivision WHERE dvId = $division)";
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
    public function getItemFiltered($data){
        global $errorCode;
        if(count($data['receivedParams'])==1){
            $filter = $data['receivedParams'][0];
            if(strtolower($filter)=="id"){
                $sql = "SELECT itemId  FROM item ORDER BY itemId";
                $temp = "itemId";
            }elseif(strtolower($filter)=="value"){
                $sql = "SELECT itemName  FROM item ORDER BY itemName";
                $temp = "itemName";
            }elseif(preg_match('~[0-9]+~', $filter)){
                $this->getItem($data);
                exit();
            }else{
                http_response_code(200);                       
                echo json_encode(array("code"=>$errorCode['unableToHandle']));
                exit();
            }
            $excute = $this->connection->query($sql);
            $results = array();
            while($r = $excute-> fetch_assoc()) {
                $results[] = $r[$temp];
            }
            $json = json_encode($results);
            echo $json;
        }else{
            http_response_code(200);                       
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
    public function filterSafehouse($data){
        global $errorCode;
        $userId = $data['userId'];
        if(count($data['receivedParams'])==1){
            $filter = $data['receivedParams'][0];
            $division = $this->getDivision($userId)['id'];
            if(strtolower($filter)=="name"){
                $sql = "SELECT s.safeHouseID,s.safeHouseName  FROM safehouse s,gndivision g WHERE g.safeHouseID = s.safeHouseID AND g.dvId=".$division;
                $temp = "safeHouseName";
                $excute = $this->connection->query($sql);
                $results = array();
                while($r = $excute-> fetch_assoc()) {
                    $r['safeHouseID'] = SafeHouse::getSafeHouseCode($r['safeHouseID']);
                    $results[] = $r;
                }
            }elseif(str_contains(strtolower($filter),"sh") or is_numeric($filter)){
                $pk = SafeHouse::getId($filter);
                $sql = "SELECT s.safeHouseID,s.safeHouseName,s.safeHouseAddress,g.gnDvName,s.isUsing  FROM safehouse s,gndivision g WHERE g.safeHouseID = s.safeHouseID AND s.safeHouseID = $pk ";
                $excute = $this->connection->query($sql);
                $results = array();
                while($r = $excute-> fetch_assoc()) {
                    $safeHouseId = SafeHouse::getSafeHouseCode($r['safeHouseID']);
                    if($r['isUsing'] == 'n'){
                        $active = "No";
                        $temp4 = array(
                            'id' => $safeHouseId,
                            'name' => $r["safeHouseName"],
                            'address' => $r["safeHouseAddress"],
                            'contact' => array(),
                            'active' => $active,
                        );
                        $r['contact'] = array();
                        $r['responsible'] = "Not Assigned";
                        $r['responsibleContact'] = "No data available";
                        $r['active'] = $active;
                        $r['males']= 0;
                        $r['females'] = 0;
                        $r['children'] = 0;
                        $r['disabledPerson'] = 0;
                    }else{
                        $active = "Yes";
                        $sql = "SELECT adultMale,adultFemale,Children,disabledPerson FROM safehousestatus WHERE safehouseId =".$r['safeHouseID']." ORDER BY createdDate DESC LIMIT 1;";
                        $temp5 = $this->connection->query($sql);
                        if($temp5->num_rows==0){
                            $temp5 = array('adultMale'=>"Data not available",'adultFemale'=>"Data not available",'Children'=>"Data not available",'disabledPerson'=>"Data not available");
                        }else{
                            $temp5 = $temp5-> fetch_assoc();
                        }
                        $sql ="SELECT empName,empTele FROM `responsibleperson` WHERE safeHouseID = ".$r['safeHouseID']." AND isAssigned = 'y'";
                        $responsiblePerson = $this->connection->query($sql);
                        if($responsiblePerson->num_rows > 0){
                            $responsiblePerson = $responsiblePerson-> fetch_assoc();
                        }else{
                            $responsiblePerson = array('empName'=>'Data not available','empTele'=>'Data not available');
                        }
                        $r['contact'] = array();
                        $r['responsible'] = $responsiblePerson['empName'];
                        $r['responsibleContact'] = $responsiblePerson['empTele'];
                        $r['active'] = $active;
                        $r['males']= $temp5['adultMale'];
                        $r['females'] = $temp5['adultFemale'];
                        $r['children'] = $temp5['Children'];
                        $r['disabledPerson'] = $temp5['disabledPerson'];
                    }

                    $sql = "SELECT safeHouseTelno FROM safehousecontact WHERE safeHouseID=".$r['safeHouseID'];
                    $contactQuery = $this->connection->query($sql);
                    while($a = $contactQuery-> fetch_assoc()) {
                        array_push($r['contact'],$a['safeHouseTelno']);
                    }
                    $r['safeHouseID'] = $safeHouseId;
                    $results[] = $r;
                }
            }else{
                http_response_code(200);                       
                echo json_encode(array("code"=>$errorCode['unableToHandle']));
                exit();
            }

            $json = json_encode($results);
            echo $json;
        }else{
            http_response_code(200);                       
            echo json_encode(array("code"=>$errorCode['attributeMissing']));
            exit();
        }
    }
    public function getNotice(array $data){
        global $errorCode;
        $userId = $data['userId'];
        $division = $this->getDivision($userId);
        $division = $division['id'];
        if(count($data['receivedParams'])==1){
            $id = $data['receivedParams'][0];
            $id=Notice::getId($id);
            $sql = "SELECT donationreqnotice.*,safehouse.safeHouseName FROM donationreqnotice,safehouse WHERE safehouse.safeHouseID = donationreqnotice.safehouseId AND donationreqnotice.recordId = $id  AND donationreqnotice.appovalStatus <> 'd' AND  donationreqnotice.safehouseId IN (SELECT gndivision.safeHouseID FROM gndivision WHERE gndivision.dvId = $division) ORDER BY CASE WHEN appovalStatus ='a' THEN 1 WHEN appovalStatus ='n' THEN 2 WHEN appovalStatus ='u' THEN 3 ELSE 4 END DESC,donationreqnotice.recordId ASC;";
        }else{
            $sql = "SELECT donationreqnotice.*,safehouse.safeHouseName FROM donationreqnotice,safehouse WHERE safehouse.safeHouseID = donationreqnotice.safehouseId AND donationreqnotice.appovalStatus <> 'd' AND  donationreqnotice.safehouseId IN (SELECT gndivision.safeHouseID FROM gndivision WHERE gndivision.dvId = $division) ORDER BY CASE WHEN appovalStatus ='a' THEN 1 WHEN appovalStatus ='n' THEN 2 WHEN appovalStatus ='u' THEN 3 ELSE 4 END DESC,donationreqnotice.recordId ASC;";
        }
        $excute = $this->connection->query($sql);
        $results = array();
        while($r = $excute-> fetch_assoc()) {
            $sql = "SELECT noticeitem.itemName,noticeitem.quantitity FROM noticeitem WHERE noticeitem.noticeId =".$r['recordId'];
            $itemList = $this->connection->query($sql);
            $r['item'] = array();
            while($row = $itemList-> fetch_assoc()) {
                $sql = "SELECT unit.unitName FROM item,unit WHERE item.unitType = unit.unitId AND item.itemName LIKE '%".$row['itemName']."%' LIMIT 1";
                $query = $this->connection->query($sql);
                if($query->num_rows==0){
                    $unit = "Units";
                }else{
                    $unit = $query-> fetch_assoc()['unitName'];
                }
                $temp = array("item"=>$row['itemName'],"unit"=>$unit,"quantity"=>$row['quantitity']);
                array_push($r['item'],$temp);
            }

            $r['recordId'] = Notice::getNoticeCode($r['recordId']);
            $r['safehouseId'] = SafeHouse::getSafeHouseCode($r['safehouseId']);
            if($r['appovalStatus']== 'a'){
                $r['appovalStatus'] = "Approved"; 
            }else if($r['appovalStatus']== 'u'){
                $r['appovalStatus'] = "Need Updates";
            }else{
                $r['appovalStatus'] = "Pending";
            }
            $results[] = $r;
        }
        $json = json_encode($results);
        echo $json;
    }
}