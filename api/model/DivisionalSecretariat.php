<?php
class DivisionalSecretariat extends Employee
{
    use Viewer;

    public function register(array $data)
    {
        global $errorCode;
        if (isset($data['firstname']) && isset($data['NIC'])  && isset($data['email'])  && isset($data['address'])  && isset($data['TP_number'])) {
            $firstname = $data['firstname'];
            $lastname = $data['lastname'];
            $nic = $data['NIC'];
            $email = $data['email'];
            $address = $data['address'];
            $TP_number = $data['TP_number'];
            $uid = $data['userId'];
            $division = $this->getDivision($uid);
            $dvId = $division['id'];
            $sql ="SELECT inventoryId FROM inventory WHERE inventory.dvId=".$dvId;
            $excute = $this->connection->query($sql);
            $temp =$excute->fetch_assoc();
            $inventory=$temp['inventoryId'];
            $mail = new mail();
            $name = $data['firstname'] . " " . $data['lastname'];
            $sql0 = "SELECT empEmail,inventoryMgtOfficerID  FROM InventoryMgtOfficer WHERE empEmail = '" . $data['email'] . "'";
            $sql = "INSERT INTO InventoryMgtOfficer (empName,empAddress,empEmail,empTele,inventoryID,assignedDate) VALUES ('$name','" . $data['address'] . "','" . $data['email'] . "','" . $data['TP_number'] . "',$inventory,'NOW()');";
            $query = $this->connection->query($sql0);
            if ($query->num_rows == 0){
                $sql0="UPDATE InventoryMgtOfficer SET isAssigned='n',resignedDate='NOW()' WHERE inventoryID=".$inventory;
                $this->connection->query($sql0);
                $this->connection->query($sql);
                $tokenKey = $this->tokenKey(10);
                $password = $this->tokenKey(8);
                $sql = "SELECT LAST_INSERT_ID();";
                $execute = $this->connection->query($sql);
                $r = $execute->fetch_assoc();
                $userId = $r["LAST_INSERT_ID()"];
                $role = 2;
                $sql = "INSERT INTO login VALUES ($userId,'" . md5($data['NIC']) . "','" . md5($password) . "','$tokenKey',$role)";
                $this->connection->query($sql);
                $body = "Please use these creadentials to login Sahanadara. You need to change your password after the login.<ul><li>User Name: " . $data['NIC'] . " </li><li>Password: $password </li></ul>";
                $mail->emailBody("About your account", "Dear " . $data['firstname'], $body);
                $mail->sendMail($data['email'], "Account Information");
                echo json_encode(array("code" => $errorCode['success']));
                exit();
            }else{
                $excute = $this->connection->query($sql0);
                $temp =$excute->fetch_assoc();
                $inventoryId=$temp['inventoryMgtOfficerID'];
                $user=Employee::getEmployeeCode($inventoryId,2);
                echo json_encode(array("code" => $errorCode['emailAlreadyInUse'],'employeeId'=>$user));
                exit();
            }
        } else {
            echo json_encode(array("code" => $errorCode['attributeMissing']));
            exit();
        }
    }
    public function transferUser(array $data){
        global $errorCode;
        $uid = $data['userId'];
        if(count($data['receivedParams'])==1){
            $id=Employee::getEmployeeId($data['receivedParams'][0],2);
            if($id==0){
                echo json_encode(array("code"=>$errorCode['unableToHandle']));
                exit();
            }
            $division = $this->getDivision($uid);
            $dvId = $division['id'];
            $sql="SELECT @id:=inventory.inventoryId FROM inventory WHERE inventory.dvId=$dvId;
            UPDATE inventorymgtofficer SET inventorymgtofficer.inventoryID=@id
            WHERE inventorymgtofficer.inventoryMgtOfficerID=$id;";
            $this->connection->multi_query($sql);
            $count=$this->connection->affected_rows;
            if($count==0){
                echo json_encode(array("code"=>$errorCode['unknownError']));
                exit();
            }else{
                echo json_encode(array("code"=>$errorCode['success']));
                exit();
            }
        }else{
            echo json_encode(array("code"=>$errorCode['attributeMissing']));
            exit();
        }
    }
    protected function tokenKey($length = 10)
    {
        return substr(str_shuffle("aAQEWAbcERWREdefghiHLafgdffhvcJHjklmnopqrSFSEREESGSEGst0123456789"), 0, $length);
    }

    public function getInventorymgr(array $data){
        $uid = $data['userId'];
        $division = $this->getDivision($uid);
        $dvId = $division['id'];
        $sql = "SELECT inventoryMgtOfficerID,empName,empAddress,empEmail,isAssigned,DATE(assignedDate) AS assignedDate,empTele,resignedDate FROM inventorymgtofficer,inventory WHERE inventorymgtofficer.inventoryID = inventory.inventoryId AND isAssigned='y' AND  inventory.dvId =".$dvId;
        $excute = $this->connection->query($sql);
        $results = array();
        while($r = $excute-> fetch_assoc()) {
            $results[] = $r;
        }
        $json = json_encode($results);
        echo $json;
    }
    public function getBorrowRequests(array $data){
        $uid = $data['userId'];
        $division = $this->getDivision($uid);
        $dvId = $division['id'];
        $sql = "(SELECT distributeitem.recordId AS recordId,distributeitem.safeHouseId AS createrID,'itemRequest' AS type,DATE(distributeitem.createdDate) AS createdDate,NULL AS requestSource, safehouse.safeHouseName AS name ,distributeitem.approvalStatus FROM distributeitem,safehouse WHERE distributeitem.safeHouseId=safehouse.safeHouseID AND distributeitem.safeHouseId IN (SELECT gndivision.safeHouseID FROM gndivision WHERE gndivision.dvId = $dvId) ORDER BY CASE WHEN distributeitem.approvalStatus ='a' THEN 2 WHEN distributeitem.approvalStatus ='r' THEN 3 WHEN distributeitem.approvalStatus ='p' THEN 1 ELSE 4 END ASC,createdDate DESC) UNION (SELECT distributeservice.recordId AS recordId,distributeservice.inventoryId AS createrID,'serviceRequest' AS type,DATE(distributeservice.createdDate) AS createdDate,distributeservice.serviceRequestId AS requestSource,inventory.inventoryAddress AS name,distributeservice.approvalStatus FROM distributeservice,inventory WHERE inventory.inventoryId=distributeservice.inventoryId AND inventory.dvId= $dvId ORDER BY CASE WHEN distributeservice.approvalStatus ='a' THEN 2 WHEN distributeservice.approvalStatus ='r' THEN 3 WHEN distributeservice.approvalStatus ='p' THEN 1 ELSE 4 END ASC,createdDate DESC);";
        $excute = $this->connection->query($sql);
        $results = array();
        while($r = $excute-> fetch_assoc()){
            if($r['type']=='itemRequest'){
                $text = SafeHouse::getSafeHouseCode($r['createrID']);
                $id=GoodsRequest::getGoodsRequest($r['recordId']);
            }else{
                $text=ServiceRequestNotice::getServiceRequestNoticeCode($r['createrID']);
                $id=GoodsTransfer::getGoodsTransfer($r['recordId']);
            }
            $temp=array();
            $temp['id']=$id;
            $temp['source']=$text;
            $temp['type']=$r['type'];
            $temp['createdDate']=$r['createdDate'];
            $temp['requestSource']=$r['requestSource'];
            $temp['name']=$r['name'];
            if($r['approvalStatus']=='p'){
                $temp['approvalStatus']="Pending";
            }elseif($r['approvalStatus']=='a'){
                $temp['approvalStatus']="Approved";
            }else{
                $temp['approvalStatus']="Rejected";
            }
            $results[] = $temp;
        }
        $json = json_encode($results);
        echo $json;
    }
    public function commandNotice(array $data){
        global $errorCode;
        $userId = $data['userId'];
        if(count($data['receivedParams'])==2){
            $filter=$data['receivedParams'][0];
            $id=Notice::getId($data['receivedParams'][1]);
            if(strtolower($filter)=='approve'){
                $sql="UPDATE donationreqnotice SET donationreqnotice.appovalStatus='a',donationreqnotice.approvedDate=NOW() WHERE donationreqnotice.recordId=$id";
            }elseif(strtolower($filter)=='reject'){
                $sql="UPDATE donationreqnotice SET donationreqnotice.appovalStatus='u',donationreqnotice.approvedDate=NOW() WHERE donationreqnotice.recordId=$id";
            }else{
                echo json_encode(array("code"=>$errorCode['unableToHandle']));
                exit();
            }
            $this->connection->query($sql);
            $count=$this->connection->affected_rows;
            if($count==0){
                echo json_encode(array("code"=>$errorCode['unknownError']));
                exit();
            }else{
                echo json_encode(array("code"=>$errorCode['success']));
                exit();
            }
        }else{
            echo json_encode(array("code"=>$errorCode['attributeMissing']));
            exit();
        }
    }
    public function commandBorrowRequests(array $data){
        global $errorCode;
        $userId = $data['userId'];
        if(count($data['receivedParams'])==2){
            $filter=$data['receivedParams'][0];
            if(strtolower($filter)=='approve'){
                $id=$data['receivedParams'][1];
                if(str_contains(strtoupper($id),"GR")){
                    $id = GoodsRequest::getId($id);
                    $sql="UPDATE distributeitem SET approvalStatus='a' WHERE recordId=$id";
                    $this->connection->query($sql);
                }elseif(str_contains(strtoupper($id),"GT")){
                    $id = GoodsTransfer::getId($id);
                    $sql="SELECT distributeservice.inventoryId,distributeservice.serviceRequestId FROM distributeservice WHERE distributeservice.recordId=$id";
                    $excute=$this->connection->query($sql);
                    $temp=$excute->fetch_assoc();
                    $inventoryId=$temp['inventoryId'];
                    $serviceRequestId=$temp['serviceRequestId'];
                    $sql="SELECT inventoryitem.recId,inventoryitem.itemId FROM inventoryitem WHERE inventoryitem.recId IN (SELECT servicedistributeitemrecord.itemRecordId FROM servicedistributeitemrecord WHERE servicedistributeitemrecord.recordId=$serviceRequestId)";
                    $excute=$this->connection->query($sql);
                    while($r = $excute-> fetch_assoc()) {
                        $itemId=$r['itemId'];
                        $sql="UPDATE servicerequestitem SET acceptedBy=$inventoryId,acceptedDate=CURDATE() WHERE r_id=$serviceRequestId AND itemId=$itemId  AND acceptedBy IS NULL AND acceptedDate IS NULL";
                        $this->connection->query($sql); 
                        $count=$this->connection->affected_rows;
                        if($count==0){
                            $sql="SELECT * FROM inventoryitem WHERE recId=".$r['recId'];
                            $itemId=$r['itemId'];
                            $inventoryId=$r['inventoryId'];
                            $quantity= -1*$r['quantity'];
                            $remarks='reverse the service request item';
                            $sql ="INSERT INTO inventoryitem(itemId,inventoryId,quantity,remarks) VALUES ($itemId,$inventoryId,$quantity,'$remarks');";
                            $this->connection->query($sql); 
                        }
                    }
                    $sql="UPDATE distributeservice SET approvalStatus='a' WHERE recordId=$id";
                    $this->connection->query($sql); 
                }else{
                    echo json_encode(array("code"=>$errorCode['unableToHandle']));
                    exit();
                }
                echo json_encode(array("code"=>$errorCode['success']));
                exit();
            }elseif(strtolower($filter)=='reject'){
                $id=$data['receivedParams'][1];
                if(str_contains(strtoupper($id),"GR")){
                    $id = GoodsRequest::getId($id);
                    $sql="UPDATE distributeitem SET approvalStatus='r' WHERE recordId=$id";
                    $this->connection->query($sql);
                    $sql="SELECT inventoryitem.* FROM inventoryitem WHERE inventoryitem.recId IN (SELECT distributeitemrecord.itemRecord FROM distributeitemrecord WHERE distributeitemrecord.recordId=$id)";
                    $excute = $this->connection->query($sql);
                    $sql="";
                    while($r = $excute-> fetch_assoc()) {
                        $itemId=$r['itemId'];
                        $inventoryId=$r['inventoryId'];
                        $quantity= -1*$r['quantity'];
                        $remarks='Goods distribution rejected';
                        $sql .="INSERT INTO inventoryitem(itemId,inventoryId,quantity,remarks) VALUES ($itemId,$inventoryId,$quantity,'$remarks');";
                    }
                    $this->connection->multi_query($sql);
                }elseif(str_contains(strtoupper($id),"GT")){
                    $id = GoodsTransfer::getId($id);
                    $sql="UPDATE distributeservice SET approvalStatus='r' WHERE recordId=$id";
                    $this->connection->query($sql);
                    $sql="SELECT inventoryitem.* FROM inventoryitem WHERE inventoryitem.recId IN (SELECT servicedistributeitemrecord.itemRecordId FROM servicedistributeitemrecord WHERE servicedistributeitemrecord.recordId=$id)";
                    $this->connection->query($sql);
                    $excute = $this->connection->query($sql);
                    $sql="";
                    while($r = $excute-> fetch_assoc()) {
                        $itemId=$r['itemId'];
                        $inventoryId=$r['inventoryId'];
                        $quantity= -1*$r['quantity'];
                        $remarks=$r['remarks'];
                        $sql .="INSERT INTO inventoryitem(itemId,inventoryId,quantity,remarks) VALUES ($itemId,$inventoryId,$quantity,'$remarks');";
                    }
                    $this->connection->multi_query($sql);
                }else{
                    echo json_encode(array("code"=>$errorCode['unableToHandle']));
                    exit();
                }
                echo json_encode(array("code"=>$errorCode['success']));
                exit();
            }else{
                echo json_encode(array("code"=>$errorCode['unableToHandle']));
                exit();
            }
        }else{
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
            $sql = "SELECT donationreqnotice.*,safehouse.safeHouseName,safehousecontact.safeHouseTelno AS contact FROM donationreqnotice,safehouse,safehousecontact WHERE safehouse.safeHouseID = donationreqnotice.safehouseId AND donationreqnotice.recordId = $id AND safehousecontact.safeHouseID=safehouse.safeHouseID  AND donationreqnotice.appovalStatus <> 'd' AND  donationreqnotice.safehouseId IN (SELECT gndivision.safeHouseID FROM gndivision WHERE gndivision.dvId = $division) ORDER BY CASE WHEN appovalStatus ='a' THEN 1 WHEN appovalStatus ='n' THEN 2 WHEN appovalStatus ='u' THEN 3 ELSE 4 END DESC,donationreqnotice.recordId ASC;";
        }else{
            $sql = "SELECT donationreqnotice.*,safehouse.safeHouseName,safehousecontact.safeHouseTelno AS contact FROM donationreqnotice,safehouse,safehousecontact WHERE safehouse.safeHouseID = donationreqnotice.safehouseId AND donationreqnotice.appovalStatus <> 'd' AND safehousecontact.safeHouseID=safehouse.safeHouseID AND  donationreqnotice.safehouseId IN (SELECT gndivision.safeHouseID FROM gndivision WHERE gndivision.dvId = $division) ORDER BY CASE WHEN appovalStatus ='a' THEN 1 WHEN appovalStatus ='n' THEN 2 WHEN appovalStatus ='u' THEN 3 ELSE 4 END DESC,donationreqnotice.recordId ASC;";
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
    public function filterBorrowRequests(array $data){
        global $errorCode;
        $uid = $data['userId'];
        if(count($data['receivedParams'])==1){
            $id=$data['receivedParams'][0];
            $division = $this->getDivision($uid);
            $dvId = $division['id'];
            if(str_contains(strtoupper($id),"GR")){
                $id = GoodsRequest::getId($id);
                $sql="SELECT distributeitem.recordId AS recordId,distributeitem.safeHouseId AS createrID,'itemRequest' AS type,DATE(distributeitem.createdDate) AS createdDate,NULL AS requestSource, safehouse.safeHouseName AS name ,distributeitem.approvalStatus FROM distributeitem,safehouse WHERE distributeitem.safeHouseId=safehouse.safeHouseID AND distributeitem.recordId=$id AND distributeitem.safeHouseId IN (SELECT gndivision.safeHouseID FROM gndivision WHERE gndivision.dvId = $dvId)";
                $excute = $this->connection->query($sql);
                $r = $excute-> fetch_assoc();
                $text = SafeHouse::getSafeHouseCode($r['createrID']);
                $id2=GoodsRequest::getGoodsRequest($r['recordId']);
                $temp=array();
                $temp['id']=$id2;
                $temp['source']=$text;
                $temp['type']=$r['type'];
                $temp['createdDate']=$r['createdDate'];
                $temp['requestSource']=$r['requestSource'];
                $temp['name']=$r['name'];
                if($r['approvalStatus']=='p'){
                    $temp['approvalStatus']="Pending";
                }elseif($r['approvalStatus']=='a'){
                    $temp['approvalStatus']="Approved";
                }else{
                    $temp['approvalStatus']="Rejected";
                }
                $temp['item']=array();
                $sql="SELECT item.itemId,item.itemName,unit.unitName,inventoryitem.quantity FROM item,unit,inventoryitem,distributeitemrecord WHERE item.itemId=inventoryitem.itemId AND item.unitType=unit.unitId AND inventoryitem.recId=distributeitemrecord.itemRecord AND distributeitemrecord.recordId=$id;";
                $excute = $this->connection->query($sql);
                while ($r = $excute->fetch_assoc()) {
                    $r['itemId'] =Item::getItemCode($r['itemId']);
                    $r['quantity'] = -1*$r['quantity'];
                    $temp['item'][] = $r;
                }
                $json = json_encode($temp);
                echo $json;
            }elseif(str_contains(strtoupper($id),"GT")){
                $id = GoodsTransfer::getId($id);
                $sql="SELECT distributeservice.recordId AS recordId,distributeservice.inventoryId AS createrID,'serviceRequest' AS type,DATE(distributeservice.createdDate) AS createdDate,distributeservice.serviceRequestId AS requestSource,inventory.inventoryAddress AS name,distributeservice.approvalStatus FROM distributeservice,inventory WHERE inventory.inventoryId=distributeservice.inventoryId AND distributeservice.recordId=$id  AND inventory.dvId= $dvId;";
                $excute = $this->connection->query($sql);
                $r = $excute-> fetch_assoc();
                $text=ServiceRequestNotice::getServiceRequestNoticeCode($r['createrID']);
                $id2=GoodsTransfer::getGoodsTransfer($r['recordId']);
                $temp=array();
                $temp['id']=$id2;
                $temp['source']=$text;
                $temp['type']=$r['type'];
                $temp['createdDate']=$r['createdDate'];
                $temp['requestSource']=$r['requestSource'];
                $temp['name']=$r['name'];
                if($r['approvalStatus']=='p'){
                    $temp['approvalStatus']="Pending";
                }elseif($r['approvalStatus']=='a'){
                    $temp['approvalStatus']="Approved";
                }else{
                    $temp['approvalStatus']="Rejected";
                }
                $temp['item']=array();
                $sql="SELECT item.itemId,item.itemName,unit.unitName,inventoryitem.quantity FROM item,unit,inventoryitem,servicedistributeitemrecord WHERE item.itemId=inventoryitem.itemId AND item.unitType=unit.unitId AND inventoryitem.recId=servicedistributeitemrecord.itemRecordId AND servicedistributeitemrecord.recordId=$id;";
                $excute = $this->connection->query($sql);
                while ($r = $excute->fetch_assoc()) {
                    $r['itemId'] =Item::getItemCode($r['itemId']);
                    $r['quantity'] = -1*$r['quantity'];
                    $temp['item'][] = $r;
                }
                $json = json_encode($temp);
                echo $json;
            }else{
                echo json_encode(array("code"=>$errorCode['unableToHandle']));
                exit();
            }
        }else{
            echo json_encode(array("code"=>$errorCode['attributeMissing']));
            exit();
        }
    }
    public function filterInventory(array $data){
        global $errorCode;
        $uid = $data['userId'];
        if(count($data['receivedParams'])==1){
            $division = $this->getDivision($uid);
            $dvId = $division['id'];
            if(strtolower($data['receivedParams'][0])=='name'){
                $sql="SELECT inventory.* FROM inventory WHERE inventory.dvId=".$dvId;
                $excute = $this->connection->query($sql);
                $temp =$excute->fetch_assoc();
                $json = json_encode($temp);
                echo $json;
            }else{
                echo json_encode(array("code"=>$errorCode['unableToHandle']));
                exit();
            }
        }else{
            echo json_encode(array("code"=>$errorCode['attributeMissing']));
            exit();
        }
    }
    public function getDistrict($userId){
        $division = $this->getDivision($userId);
        $dvId = $division['id'];
        $sql = "SELECT district.dsId,district.dsName FROM district,division WHERE division.dsId=district.dsId AND division.dvId = $dvId;";
        $excute = $this->connection->query($sql);
        $temp =$excute->fetch_assoc();
        $district['name'] = $temp['dsName'];
        $district['id'] = $temp['dsId'];
        return $district;
    }
    public function getDivision($userId){
        $sql = "SELECT division.dvId,division.dvName FROM divisionalsecretariat,division,divisionaloffice WHERE divisionalsecretariat.divisionalSecretariatID = divisionaloffice.divisionalSecretariatID AND division.dvId = divisionaloffice.dvId AND divisionalsecretariat.divisionalSecretariatID = $userId;";
        $excute = $this->connection->query($sql);
        $temp =$excute->fetch_assoc();
        $division['name'] = $temp['dvName'];
        $division['id'] = $temp['dvId'];
        return $division;
    }
    // Profile Details
    public function getProfileDetails(array $data)
    {
        $uid = $data['userId'];
        $sql = "SELECT * FROM gramaniladari g JOIN gndivision d ON g.gramaNiladariID=" . $uid . " AND d.gramaNiladariID=1 JOIN division s ON d.dvId=s.dvId JOIN district t ON t.dsId=s.dsId;";
        // SELECT * FROM gramaniladari g JOIN gndivision d ON g.gramaNiladariID=1 AND d.gramaNiladariID=1 JOIN division s ON d.dvId=s.dvId JOIN district t ON t.dsId=s.dsId;
        $excute = $this->connection->query($sql);
        while ($r = $excute->fetch_assoc()) {
            $results[] = $r;
        }
        $json = json_encode($results);
        echo $json;
    }

    protected function checkPassword(array $data)
    {
        $uid = $data['userId'];
        $username = md5($data['nic']);
        $password = md5($data['password']);
        $sql = "SELECT * FROM login 4 WHERE 4.nid ='$username' AND 4.empPassword ='$password'";
        $excute = $this->connection->query($sql);
        return $excute->num_rows > 0;
    }

    public function updateProfileDetails(array $data)
    {
        global $errorCode;
        if ($this->checkPassword($data)) {
            $uid = $data['userId'];
            $email = $data['email'];
            $address = $data['add'];
            $phone = $data['tel'];
            $ofaddress = $data['ofAdd'];
            $ofphone = $data['ofTel'];
            $sql = "UPDATE `disasterofficer` SET `empAddress`='$address', `empEmail`='$email',`empTele`='$phone' WHERE `disMgtOfficerID`='$uid' ";
            //$sql2 = "UPDATE `gndivision` SET `officeAddress`='$ofaddress', `officeTele`='$ofphone' WHERE `gramaNiladariID`='$uid' ";
            $this->connection->query($sql);
            //$this->connection->query($sql2);
            if (isset($data['npassword'])) {
                $password = md5($data['npassword']);
                $username = md5($data['nic']);
                $sql = "UPDATE `login` SET `empPassword`='$password' WHERE `nid`='$username' ";
                $this->connection->query($sql);
            }
            echo json_encode(array("code" => $errorCode['success']));
        } else {
            echo json_encode(array("code" => $errorCode['attributeMissing']));
            exit();
        }
    }



     // Comps
     public function getCompensations(array $data)
     {
         $uid = $data['userId'];
         $sql = "(
             
                 SELECT
                     death.deathId AS reportId,
                     death.aname AS aname,
                     death.atelno AS atel,
                     death.timestamp,
                     death.dvapproved,
                     death.disapproved,
                     death.dmcapproved,
                     death.collected,
                     'Death' AS report,
                     g.gnDvName,
                     d.dvName
                 FROM
                     deathcompensation death,
                     gndivision g,
                     division d,
                     divisionaloffice dis
                 WHERE
                     dis.divisionalSecretariatID = " . $uid . " AND dis.dvId = g.dvId AND g.gndvId = death.gndvId AND g.dvId = d.dvId AND death.dvapproved='a'
             )
             UNION
                 (
                 SELECT
                     f.propcomId AS reportId,
                     f.aname AS aname,
                     f.atpnumber AS atel,
                     f.timestamp,
                     f.dvapproved,
                     f.disapproved,
                     f.dmcapproved,
                     f.collected,
                     'Property' AS report,
                     g.gnDvName,
                     d.dvName
                 FROM
                     propertycompensation f,
                     gndivision g,
                     division d,
                     divisionaloffice dis
                 WHERE
                     dis.divisionalSecretariatID = " . $uid . " AND dis.dvId = g.dvId AND g.gndvId = f.gndvId AND g.dvId = d.dvId AND f.dvapproved='a'
             )
             ORDER BY
                 TIMESTAMP
             DESC
                 ;";
         $excute = $this->connection->query($sql);
         $results = array();
         while ($r = $excute->fetch_assoc()) {
             $results[] = $r;
         }
         $json = json_encode($results);
         echo $json;
     }
 
     public function getProperty(array $data)
     {
         $uid = $data['userId'];
         $initialId = $data['receivedParams'][0];
         // "SELECT * 
         // FROM gramaniladari g 
         // JOIN gndivision d 
         // ON g.gramaNiladariID=" . $uid . " AND d.gramaNiladariID=1 
         // JOIN division s ON d.dvId=s.dvId 
         // JOIN district t ON t.dsId=s.dsId";
         $results = array();
         $resultsprop = array();
         $resultsserv = array();
         $resultsapp = array();
 
         $sql = "
         SELECT
     initial.*,
     gndivision.gnDvName,
     district.dsName,
     division.dvName,
     gramaniladari.empName AS gnname,
     divisionalsecretariat.empName AS dsname
 FROM
     propertycompensation initial,
     gndivision,
     district,
     division,
     gramaniladari,
     divisionalsecretariat,
     divisionaloffice
 WHERE
     gndivision.gndvId = initial.gndvId AND initial.propcomId =" . $initialId . " AND gndivision.dvId = division.dvId AND division.dsId = district.dsId AND gramaniladari.gramaNiladariID = gndivision.gramaNiladariID AND divisionalsecretariat.divisionalSecretariatID = divisionaloffice.divisionalSecretariatID AND divisionaloffice.dvId = division.dvId;
             ";
         $excute = $this->connection->query($sql);
         $r = $excute->fetch_assoc();
         $results['main'] = $r;
 
         $sql = "
             SELECT
                 *
             FROM
             propcomprop initial  
             WHERE
                 initial.propcomId  = " . $initialId . "";
         // echo($sql);exit;
         $excute = $this->connection->query($sql);
         while ($r = $excute->fetch_assoc()) {
             $resultsprop[] = $r;
         }
         $results['prop'] = $resultsprop;
         // print_r($results);exit;
         $sql = "
             SELECT
                 *
             FROM
             propservice initial  
             WHERE
                 initial.propcomId  = " . $initialId . "";
         $excute = $this->connection->query($sql);
         while ($r = $excute->fetch_assoc()) {
             $resultsserv[] = $r;
         }
         $results['serv'] = $resultsserv;
 
         $sql = "
             SELECT
                 *
             FROM
             propapp initial  
             WHERE
                 initial.propcomId  = " . $initialId . "";
         $excute = $this->connection->query($sql);
         while ($r = $excute->fetch_assoc()) {
             $resultsapp[] = $r;
         }
         $results['app'] = $resultsapp;
 
         // $json = json_encode($r);
         $json = json_encode($results);
         echo $json;
     }
 
     public function getDeath(array $data)
     {
         $uid = $data['userId'];
         $initialId = $data['receivedParams'][0];
         // "SELECT * 
         // FROM gramaniladari g 
         // JOIN gndivision d 
         // ON g.gramaNiladariID=" . $uid . " AND d.gramaNiladariID=1 
         // JOIN division s ON d.dvId=s.dvId 
         // JOIN district t ON t.dsId=s.dsId";
         $results = array();
         $resultsheir = array();
 
         $sql = "
             SELECT
             initial.*,
             gndivision.gnDvName,
     district.dsName,
     division.dvName,
     gramaniladari.empName AS gnname,
     divisionalsecretariat.empName AS dsname
             FROM
             deathcompensation initial,
             gndivision,
             district,
             division,
             gramaniladari,
             divisionalsecretariat,
             divisionaloffice
             WHERE
             gndivision.gndvId = initial.gndvId AND initial.deathId =" . $initialId . " AND gndivision.dvId = division.dvId AND division.dsId = district.dsId AND gramaniladari.gramaNiladariID = gndivision.gramaNiladariID AND divisionalsecretariat.divisionalSecretariatID = divisionaloffice.divisionalSecretariatID AND divisionaloffice.dvId = division.dvId";
         $excute = $this->connection->query($sql);
         $r = $excute->fetch_assoc();
         $results['main'] = $r;
 
         $sql = "
             SELECT
                 *
             FROM
             deathheir initial  
             WHERE
                 initial.deathid   = " . $initialId . "";
         // echo($sql);exit;
         $excute = $this->connection->query($sql);
         while ($r = $excute->fetch_assoc()) {
             $resultsheir[] = $r;
         }
         $results['heir'] = $resultsheir;
         // print_r($results);exit;
 
         // $json = json_encode($r);
         $json = json_encode($results);
         echo $json;
     }
 
 
 
     public function approvecomp(array $data)
     {
         global $errorCode;
         // print_r($data);
         // exit;
 
         // $uid = $data['userId'];
         $dmcremarks = $data['dmcremarks'];
         $dmcapproved = $data['dmcapproved'];
         $report = $data['report'];
         $reportId = $data['reportId'];
         // $residentId = $data['receivedParams'][0];
         if (!empty($report)) {
             if ($report == "Property") {
                 $sql = "UPDATE `propertycompensation` SET `disapproved`='$dmcapproved', `disremarks`='$dmcremarks' WHERE `propcomId`='$reportId'";
             } else {
                 $sql = "UPDATE `deathcompensation` SET `disapproved`='$dmcapproved', `disremarks`='$dmcremarks' WHERE `deathId`='$reportId'";
             }
             $this->connection->query($sql);
             echo json_encode(array("code" => $errorCode['success']));
         } else {
             echo json_encode(array("code" => $errorCode['attributeMissing']));
             exit();
         }
     }

     public function addFundraiser(array $data)
     {
        global $errorCode;
        //$uid = $data['userId'];
        $title = $data['title'];
        $description = $data['description'];
        $goal = $data['goal'];

        $sql = "INSERT INTO fundraising (title, description, goal) VALUES ('$title','$description','$goal');";
        //$this->connection->query($sql);
        
        if ($this->connection->query($sql)) {
            echo json_encode(array("code" => $errorCode['success']));
        } else {
            echo json_encode(array("code" => $errorCode['unknownError']));
        }
    
     }

     public function getFundraiser(array $data)
     {
        $uid = $data['userId'];
        // $sql = "SELECT * FROM `gndivision` WHERE `gramaNiladariID` =" . $uid;
        // $excute = $this->connection->query($sql);
        // $r = $excute->fetch_assoc();
        // SELECT a.*,d.* FROM alert a JOIN alertdisdivgn d ON d.alertId=a.msgId JOIN gndivision g ON g.gndvId=d.gndvId WHERE g.gramaNiladariID=1 ORDER BY a.timestamp DESC;
        // SELECT a.* FROM alert a JOIN alertdisdivgn d ON d.gndvId=5 AND d.alertId=a.msgId ORDER BY a.timestamp DESC;
        $sql = "SELECT f.* FROM fundraising f";
        // $sql = "SELECT fundraising.*, SUM(fundraisingrecords.amount) AS currentAmout FROM fundraising,fundraisingrecords
        // WHERE fundraisingrecords.recordId=fundraising.recordId GROUP BY fundraising.recordId;";
        $excute = $this->connection->query($sql);
        $results = array();
        // $r = $excute->fetch_assoc();
        while ($r = $excute->fetch_assoc()) {
            $results[] = $r;
        }
        $json = json_encode($results);
        echo $json;
         
     }

     public function updateFundraiser(array $data)
     {
        global $errorCode;
        // print_r($data['receivedParams']);
        // print_r($data);
        if (count($data['receivedParams']) == 1) {
            $uid = $data['userId'];
            $title = $data['uptitle'];
            $description = $data['updescription'];
            $goal = $data['upgoal'];
            $recordId = $data['receivedParams'][0];

            $sql = "UPDATE `fundraising` SET `title`='$title', `description`='$description', `goal`='$goal' WHERE recordId =$recordId";
            $this->connection->query($sql);
            // echo($sql);
            echo json_encode(array("code" => $errorCode['success']));
        } else {
            echo json_encode(array("code" => $errorCode['attributeMissing']));
            exit();
        }
    }

     public function deleteFundraiser(array $data)
     {
        global $errorCode;
        if (count($data['receivedParams']) == 1) {

            $recordId = $data['receivedParams'][0];

            $sql = "DELETE FROM `fundraising` WHERE recordId =$recordId";
            $this->connection->query($sql);
            echo json_encode(array("code" => $errorCode['success']));
        } else {
            echo json_encode(array("code" => $errorCode['attributeMissing']));
            exit();
        }
    }

    
}