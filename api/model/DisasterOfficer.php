<?php
class DisasterOfficer extends Employee
{
    use Viewer;
    use Alerter;
    use Noticer;

    public function __construct($con)
    {
        parent::__construct($con);
    }

    // Donation

    public function addDonation(array $data)
    {
        global $errorCode;
        $recordId = $data['recordId'];
        $safehouseId = $data['safehouseId'];
        $title = $data['title'];
        $numOfFamilies = $data['numOfFamilies'];
        $numOfPeople = $data['numOfPeople'];
        $createdDate = $data['createdDate'];
        $note = $data['note'];
        $approvalStatus = $data['approvalStatus'];

        $sql = "SELECT * FROM ";
        $excute = $this->connection->query($sql);
        $r = $excute->fetch_assoc();

        if ($this->connection->query($sql)) {
            echo json_encode(array("code" => $errorCode['success']));
        } else {
            echo json_encode(array("code" => $errorCode['unknownError']));
        }
    }


    public function getDisaster(array $data)
    {
        // if(count($data['receivedParams'])==1){
        //     $id = $data['receivedParams'][0];
        //     $sql = "SELECT * FROM `unit` WHERE unitId=$id";
        // }else{
        $sql = "SELECT * FROM `disaster`";
        // }
        $excute = $this->connection->query($sql);
        $results = array();
        while ($r = $excute->fetch_assoc()) {
            $results[] = $r;
        }
        $json = json_encode($results);
        echo $json;
    }


    // Safehouse Details

    public function addSafehouse(array $data)
    {
        global $errorCode;
        // print_r($data);exit;
        $safeHouseAddress = $data['safeHouseAddress'];
        $safeHouseName = $data['safeHouseName'];
        $safeHouseTelno = $data['safeHouseTelno'];
        $gndvId = $data['gnDiv'];
        $sql = "INSERT INTO `safehouse` (`safeHouseAddress`, `safeHouseName`) VALUES ('$safeHouseAddress', '$safeHouseName');";
        $this->connection->query($sql);
        $result = array();
        $sql = "SELECT LAST_INSERT_ID();";
        $execute = $this->connection->query($sql);
        $r = $execute->fetch_assoc();
        $safeHouseID = $r["LAST_INSERT_ID()"];
        $sql = "INSERT INTO `safehousecontact` (`safeHouseID`, `safeHouseTelno`) VALUES ('$safeHouseID', '$safeHouseTelno');";
        $this->connection->query($sql);
        $sql = "UPDATE gndivision
        SET safeHouseID = $safeHouseID
        WHERE gndvId = $gndvId;";
        $this->connection->query($sql);
        echo json_encode(array("code" => $errorCode['success']));
    }

    public function viewSafehouse(array $data)
    {
        //$safeHouseID = $data['safeHouseID'];
        $uid = $data['userId'];
        if (count($data['receivedParams']) == 1) {
            $id = $data['receivedParams'][0];
            $sql = "SELECT s.*,t.*,g.gnDvName,g.gndvId FROM safehousecontact t, safehouse  s,gndivision g, division d, divisionaloffice dv
            WHERE s.safeHouseId = t.safeHouseID AND g.	safeHouseID = s.safeHouseId AND g.dvId = d.dvId
            AND dv.dvId = d.dvId AND dv.disasterManager = $uid AND s.safeHouseId = $id";
        } else {
            $sql = "SELECT s.*,t.*,g.gnDvName,g.gndvId FROM safehousecontact t, safehouse  s,gndivision g, division d, divisionaloffice dv
            WHERE s.safeHouseId = t.safeHouseID AND g.	safeHouseID = s.safeHouseId AND g.dvId = d.dvId
            AND dv.dvId = d.dvId AND dv.disasterManager = $uid";
        }
        $excute = $this->connection->query($sql);
        $results = array();
        while ($r = $excute->fetch_assoc()) {
            $results[] = $r;
        }
        $json = json_encode($results);
        echo $json;
    }

    public function updateSafehouse(array $data)
    {
        global $errorCode;
        // print_r($data['receivedParams']);
        // print_r($data);
        if (count($data['receivedParams']) == 1) {
            $uid = $data['userId'];
            $safeHouseAddress = $data['upsafeHouseAddress'];
            $safeHouseName = $data['upsafeHouseName'];
            $safeHouseTelno = $data['upsafeHouseTelno'];
            $gndvId = $data['upgnDiv'];
            $safeHouseId = $data['receivedParams'][0];

            $sql = "UPDATE `safehouse` SET `safeHouseAddress`='$safeHouseAddress', `safeHouseName`='$safeHouseName' WHERE safeHouseId =$safeHouseId";
            $this->connection->query($sql);
            $sql = "UPDATE `safehousecontact` SET `safeHouseTelno`='$safeHouseTelno' WHERE safeHouseID =$safeHouseId";
            $this->connection->query($sql);
            // echo($sql);
            echo json_encode(array("code" => $errorCode['success']));
        } else {
            echo json_encode(array("code" => $errorCode['attributeMissing']));
            exit();
        }
    }

    public function deleteSafehouse(array $data)
    {
        global $errorCode;
        if (count($data['receivedParams']) == 1) {

            $safeHouseId = $data['receivedParams'][0];
            $sql = "UPDATE gndivision SET safeHouseID = NULL WHERE safeHouseId =$safeHouseId";
            $this->connection->query($sql);

            $sql = "DELETE FROM `safehouse` WHERE safeHouseId =$safeHouseId";
            $this->connection->query($sql);
            echo json_encode(array("code" => $errorCode['success']));
        } else {
            echo json_encode(array("code" => $errorCode['attributeMissing']));
            exit();
        }
    }

    public function getGNDivision(array $data)
    {
        $id = $data['userId'];
        if (count($data['receivedParams']) == 1) {

            $sql = "SELECT g.* FROM gndivision g,divisionaloffice d,dismgtofficer m 
        WHERE m.disMgtOfficerID = d.disasterManager AND g.dvId = d.dvId AND m.disMgtOfficerID = $id";
        } else {
            $sql = "SELECT g.* FROM gndivision g,divisionaloffice d,dismgtofficer m 
        WHERE m.disMgtOfficerID = d.disasterManager AND g.dvId = d.dvId AND m.disMgtOfficerID = $id  AND g.safeHouseID IS NULL";
        }



        $excute = $this->connection->query($sql);
        $results = array();
        while ($r = $excute->fetch_assoc()) {
            $results[] = $r;
        }
        $json = json_encode($results);
        echo $json;
    }

    public function getDOGNDivision(array $data)
    {
        $id = $data['userId'];
        $sql = "SELECT g.* FROM gndivision g,divisionaloffice d,dismgtofficer m 
        WHERE m.disMgtOfficerID = d.disasterManager AND g.dvId = d.dvId AND m.disMgtOfficerID = $id ";
        // echo $sql;
        // exit;
        $excute = $this->connection->query($sql);
        $results = array();
        while ($r = $excute->fetch_assoc()) {
            $results[] = $r;
        }
        $json = json_encode($results);
        echo $json;
    }

    // Profile Details
    public function getProfileDetails(array $data)
    {
        $uid = $data['userId'];
        //$sql = "SELECT * FROM gramaniladari g JOIN gndivision d ON g.gramaNiladariID=" . $uid . " AND d.gramaNiladariID=1 JOIN division s ON d.dvId=s.dvId JOIN district t ON t.dsId=s.dsId;";
        $sql = "SELECT * FROM dismgtofficer m JOIN divisionaloffice d ON m.disMgtOfficerID=" . $uid . " AND d.disasterManager=1 JOIN division s ON d.dvId=s.dvId JOIN district t ON t.dsId=s.dsId;";
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
        $sql = "SELECT * FROM login 6 WHERE 6.nid ='$username' AND 6.empPassword ='$password'";
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

    public function getDistrict($userId)
    {
        //return on function ekak
        $r = $this->getDivision($userId);
        $division = $r['id'];
        $sql = "SELECT dist.* FROM district dist, division d WHERE d.dsId = dist.dsId AND d.dvId=$division";
        $excute = $this->connection->query($sql);
        $r = $excute->fetch_assoc();
        $district['name'] = $r['dsName'];
        $district['id'] = $r['dsId'];
        return $district;
    }

    public function getDivision($userId)
    {
        //return on function ekak
        $sql = "SELECT d.* FROM division d, divisionaloffice divoff WHERE d.dvId=divoff.dvId AND divoff.disasterManager=$userId";
        $excute = $this->connection->query($sql);
        $r = $excute->fetch_assoc();
        $division['name'] = $r['dvName'];
        $division['id'] = $r['dvId'];
        return $division;
    }


    // public function getUnit(){
    //     $sql = "SELECT * FROM `unit` ORDER BY unitName";
    //     $excute = $this->connection->query($sql);
    //     $results = array();
    //     while($r = $excute-> fetch_assoc()) {
    //         $results[] = $r;
    //     }
    //     $json = json_encode($results);
    //     echo $json;
    // }



    public function getMessages(array $data)
    {
        $uid = $data['userId'];
        $sql = "SELECT * FROM `gndivision` WHERE `gramaNiladariID` =" . $uid;
        $excute = $this->connection->query($sql);
        $r = $excute->fetch_assoc();
        $sql = "SELECT r.* FROM domsg r WHERE r.gndvId =" . $r['gndvId'] . " ORDER BY r.timestamp DESC";
        $excute = $this->connection->query($sql);
        $results = array();
        while ($r = $excute->fetch_assoc()) {
            $results[] = $r;
        }
        $json = json_encode($results);
        echo $json;
    }

    public function sendMessages(array $data)
    {
        global $errorCode;
        $uid = $data['userId'];
        $msg = $data['msg'];

        $sql = "SELECT * FROM `gndivision` WHERE `gramaNiladariID` =" . $uid;
        $excute = $this->connection->query($sql);
        $r = $excute->fetch_assoc();
        $sql = "INSERT INTO domsg (message, gndvId ) VALUES ('$msg'," . $r['gndvId'] . ");";
        if ($this->connection->query($sql)) {
            echo json_encode(array("code" => $errorCode['success']));
        } else {
            echo json_encode(array("code" => $errorCode['unknownError']));
        }
    }

    public function getAlerts(array $data)
    {
        $uid = $data['userId'];
        // $sql = "SELECT * FROM `gndivision` WHERE `gramaNiladariID` =" . $uid;
        // $excute = $this->connection->query($sql);
        // $r = $excute->fetch_assoc();
        // SELECT a.*,d.* FROM alert a JOIN alertdisdivgn d ON d.alertId=a.msgId JOIN gndivision g ON g.gndvId=d.gndvId WHERE g.gramaNiladariID=1 ORDER BY a.timestamp DESC;
        // SELECT a.* FROM alert a JOIN alertdisdivgn d ON d.gndvId=5 AND d.alertId=a.msgId ORDER BY a.timestamp DESC;
        $sql = "SELECT a.*,d.* FROM alert a JOIN alertdisdivgn d ON d.alertId=a.msgId JOIN divisionaloffice divoff ON divoff.dvId=d.dvId WHERE divoff.disasterManager=" . $uid . " AND a.onlyOfficers = 1 ORDER BY a.timestamp DESC";
        $excute = $this->connection->query($sql);
        $results = array();
        while ($r = $excute->fetch_assoc()) {
            $results[] = $r;
        }
        $json = json_encode($results);
        echo $json;
    }

    public function register(array $data)
    {
        global $errorCode;
        $uid = $data['userId'];
        if (isset($data['firstname']) && isset($data['NIC'])  && isset($data['email'])  && isset($data['address'])  && isset($data['TP_number'])) {
            $firstname = $data['firstname'];
            $lastname = $data['lastname'];
            $nic = $data['NIC'];
            $email = $data['email'];
            $address = $data['address'];
            $TP_number = $data['TP_number'];
            $safehouse = SafeHouse::getId($data['safehouse']);

            $mail = new mail();
            $name = $data['firstname'] . " " . $data['lastname'];


            $sql0 = "SELECT empEmail FROM ResponsiblePerson WHERE empEmail = '" . $data['email'] . "'";
            $sql = "INSERT INTO ResponsiblePerson (empName,empAddress,empEmail,empTele,safeHouseID) VALUES ('$name','" . $data['address'] . "','" . $data['email'] . "','" . $data['TP_number'] . "',$safehouse);";

            $query = $this->connection->query($sql0);

            if ($query->num_rows == 0) {
                $this->connection->query($sql);
                $tokenKey = $this->tokenKey(10);
                $password = $this->tokenKey(8);
                $sql = "SELECT LAST_INSERT_ID();";
                $execute = $this->connection->query($sql);
                $r = $execute->fetch_assoc();
                $userId = $r["LAST_INSERT_ID()"];
                $role = 8;
                $sql = "INSERT INTO login VALUES ($userId,'" . md5($data['NIC']) . "','" . md5($password) . "','$tokenKey',$role)";
                $this->connection->query($sql);


                $body = "Please use these creadentials to login Sahanadara. You need to change your password after the login.<ul><li>User Name: " . $data['NIC'] . " </li><li>Password: $password </li></ul>";
                $mail->emailBody("About your account", "Dear " . $data['firstname'], $body);
                $mail->sendMail($data['email'], "Account Information");
                echo json_encode(array("code" => $errorCode['success']));
                exit();
            } else {
                echo json_encode(array("code" => $errorCode['emailAlreadyInUse']));
                exit();
            }
        } else {
            echo json_encode(array("code" => $errorCode['attributeMissing']));
            exit();
        }
    }

    public function getResponsible(array $data)
    {
        $uid = $data['userId'];
        // $sql = "SELECT * FROM `gndivision` WHERE `gramaNiladariID` =" . $uid;
        // $excute = $this->connection->query($sql);
        // $r = $excute->fetch_assoc();
        // SELECT a.*,d.* FROM alert a JOIN alertdisdivgn d ON d.alertId=a.msgId JOIN gndivision g ON g.gndvId=d.gndvId WHERE g.gramaNiladariID=1 ORDER BY a.timestamp DESC;
        // SELECT a.* FROM alert a JOIN alertdisdivgn d ON d.gndvId=5 AND d.alertId=a.msgId ORDER BY a.timestamp DESC;
        $sql = "SELECT s.*,t.* FROM safehouse s JOIN responsibleperson t ON t.safeHouseID=s.safeHouseID JOIN gndivision g ON g.safeHouseID=s.safeHouseID JOIN divisionaloffice divoff ON divoff.dvId=g.dvId WHERE divoff.disasterManager=" . $uid . ";";
        $excute = $this->connection->query($sql);
        $results = array();
        while ($r = $excute->fetch_assoc()) {
            $results[] = $r;
        }
        $json = json_encode($results);
        echo $json;
    }

    public function deleteResponsible(array $data)
    {
        global $errorCode;
        if (count($data['receivedParams']) == 1) {

            $responsiblePersonID = $data['receivedParams'][0];
            $sql = "DELETE FROM `responsibleperson` WHERE responsiblePersonID =$responsiblePersonID ";
            $this->connection->query($sql);
            echo json_encode(array("code" => $errorCode['success']));
        } else {
            echo json_encode(array("code" => $errorCode['attributeMissing']));
            exit();
        }
    }

    public function updateResponsible(array $data)
    {
        global $errorCode;
        if (count($data['receivedParams']) == 1) {
            $uid = $data['userId'];
            $fname = $data['upfirstname'];
            $lname = $data['uplastname'];
            $nic = $data['upNIC'];
            $email = $data['upemail'];
            $address = $data['upaddress'];
            $telno = $data['upTP_number'];
            $safehouse = $data['upsafehouse'];
            $responsiblePersonID = $data['receivedParams'][0];

            $name = $data['upfirstname'] . " " . $data['uplastname'];


            $sql = "UPDATE `responsibleperson` SET `empName`='$name', `empAddress`='$address',`empTele`='$telno' WHERE responsiblePersonID =$responsiblePersonID ";
            $this->connection->query($sql);
            echo json_encode(array("code" => $errorCode['success']));
        } else {
            echo json_encode(array("code" => $errorCode['attributeMissing']));
            exit();
        }
    }
    public function getFinalReport(array $data){
        global $errorCode;
        $uid = $data['userId'];
        if(count($data['receivedParams'])==0){
            $division = $this->getDivision($uid);
            $divisionId = $division['id'];
            $sql="SELECT * FROM dvfinalincident WHERE dvfinalincident.dvId=$divisionId;";
        }elseif(count($data['receivedParams'])==1){
            $recordId=$data['receivedParams'][0];
            $sql="SELECT * FROM dvfinalincident WHERE dvfinalincident.dvfinalincidentId=$recordId;";
        }else{
            http_response_code(200);                       
            echo json_encode(array("code"=>$errorCode['unableToHandle']));
            exit(); 
        }
        $excute = $this->connection->query($sql);
        $results = array();
        while($r = $excute-> fetch_assoc()) {
            $recordId=$r['dvfinalincidentId'];
            $sql="SELECT * FROM dvfinalimpact WHERE dvfinalimpact.dvfinalincidentId=$recordId";
            $excute1 = $this->connection->query($sql);
            $temp1=array();
            while($p = $excute1-> fetch_assoc()) {
                $temp1[]=$p;
            }
            $r['impact']=$temp1;
            $temp1=array();
            $sql="SELECT * FROM dvfinalrelief WHERE dvfinalrelief.dvfinalincidentId=$recordId";
            $excute1 = $this->connection->query($sql);
            $temp1=array();
            while($p = $excute1-> fetch_assoc()) {
                $temp1[]=$p;
            }
            $r['relief']=$temp1;
            $temp1=array();
            $sql="SELECT * FROM dvfinalsafehouse WHERE dvfinalsafehouse.dvfinalincidentId=$recordId";
            $excute1 = $this->connection->query($sql);
            $temp1=array();
            while($p = $excute1-> fetch_assoc()) {
                $temp1[]=$p;
            }
            $r['safehouse']=$temp1;
            $temp1=array();
            $sql="SELECT * FROM dvfinaldamage WHERE dvfinaldamage.dvfinalincidentId=$recordId";
            $excute1 = $this->connection->query($sql);
            $temp1=array();
            while($p = $excute1-> fetch_assoc()) {
                $temp1[]=$p;
            }
            $r['damage']=$temp1;
            $results[]=$r;
        }
        $json = json_encode($results);
        echo $json;
    }
    public function addFinalReport(array $data){
        global $errorCode;
        $uid = $data['userId'];
        if(isset($data['datePicker1']) && isset($data['datePicker2']) && isset($data['disaster']) && isset($data['cause']) && isset($data['remarks']) && isset($data['task']) && isset($data['impact']) && isset($data['safehouse']) && isset($data['damages']) && isset($data['relief']) && isset($data['incidentId'])){
            $datePicker1=$data['datePicker1'];
            $datePicker2=$data['datePicker2'];
            $disaster=$data['disaster'];
            $division = $this->getDivision($uid);
            $divisionId = $division['id'];
            $cause=$data['cause'];
            $remarks=$data['remarks'];
            $incidentId=$data['incidentId'];
            $sql="INSERT INTO dvfinalincident(startDate, endDate, disaster, cause, dvId, remarks, incidentId) VALUES ('$datePicker1','$datePicker2','$disaster','$cause',$divisionId,'$remarks',$incidentId);";
            $this->connection->query($sql);
            $sql = "SELECT LAST_INSERT_ID();";
            $excute = $this->connection->query($sql);
            $r = $excute-> fetch_assoc();
            $finalReportId = $r['LAST_INSERT_ID()'];
            $sql="";
            foreach ($data['impact'] as $record) {
                $fam =$record['fam'];
                $people =$record['people'];
                $death =$record['death'];
                $hos =$record['hos'];
                $inj =$record['inj'];
                $miss =$record['miss'];
                $gnId =$record['gnId'];
                $sql .="INSERT INTO dvfinalimpact VALUES ($finalReportId,$gnId,$fam,$people,$death,$hos,$inj,$miss);";
            }
            foreach ($data['safehouse'] as $record) {
                $safenum =$record['safenum'];
                $sffam =$record['sffam'];
                $sfpeople =$record['sfpeople'];
                $gnId =$record['gnId'];
                $sql .="INSERT INTO dvfinalsafehouse VALUES ($finalReportId,$gnId,$safenum,$sfpeople,$sffam);";
            }
            foreach ($data['damages'] as $record) {
                $damhfull =$record['damhfull'];
                $damhpartial =$record['damhpartial'];
                $damenter =$record['damenter'];
                $daminfra =$record['daminfra'];
                $gnId =$record['gnId']; //hf he kiyanne monawada yako :(
                $sql .="INSERT INTO dvfinaldamage VALUES ($finalReportId,$gnId,$damhfull,$damhpartial,$damenter,$daminfra);";
            }
            foreach ($data['relief'] as $record) {
                $reldry =$record['reldry'];
                $relcooked =$record['relcooked'];
                $relemer =$record['relemer'];
                $gnId =$record['gnId'];
                $sql .="INSERT INTO dvfinalrelief VALUES ($finalReportId,$gnId,$reldry,$relcooked,$relemer);";
            }
            $this->connection->multi_query($sql);
            echo json_encode(array("code"=>$errorCode['success']));
            exit();
        } else {
            echo json_encode(array("code" => $errorCode['attributeMissing']));
            exit();
        }
    }

    public function filtermySafehouse(array $data)
    {
        $uid = $data['userId'];
        if (count($data['receivedParams']) == 1) {
            $sql = "SELECT s.* FROM safeHouse s WHERE s.safeHouseID IN (SELECT gn.safeHouseID FROM gndivision gn,divisionaloffice dv, safehouse sh WHERE gn.dvId = dv.dvId AND dv.disasterManager = 1 AND sh.isUsing = 'n' AND sh.safeHouseID = gn.safeHouseID);";
            $excute = $this->connection->query($sql);
            $results = array();
            while ($r = $excute->fetch_assoc()) {
                $results[] = $r;
            }
            $json = json_encode($results);
            echo $json;
        }
    }

    public function getSafehouseCount(array $data)
    {
        $uid = $data['userId'];
        // $sql = "SELECT * FROM `gndivision` WHERE `gramaNiladariID` =" . $uid;
        // $excute = $this->connection->query($sql);
        // $r = $excute->fetch_assoc();
        // SELECT a.*,d.* FROM alert a JOIN alertdisdivgn d ON d.alertId=a.msgId JOIN gndivision g ON g.gndvId=d.gndvId WHERE g.gramaNiladariID=1 ORDER BY a.timestamp DESC;
        // SELECT a.* FROM alert a JOIN alertdisdivgn d ON d.gndvId=5 AND d.alertId=a.msgId ORDER BY a.timestamp DESC;
        $sql = "SELECT count(s.safeHouseID) FROM safehouse s JOIN gndivision g ON g.safeHouseID=s.safeHouseID JOIN divisionaloffice divoff ON g.dvId=divoff.dvId WHERE divoff.disasterManager=" . $uid;
        $excute = $this->connection->query($sql);
        $r = $excute->fetch_assoc();
        $json = json_encode($r);
        echo $json;
    }


    public function addIncidents(array $data)
    {
        global $errorCode;
        $uid = $data['userId'];
        $title = $data['title'];
        $description = $data['description'];
        $gndvId = $data['gns'];

        $sql = "SELECT d.* FROM division d, divisionaloffice divoff WHERE d.dvId=divoff.dvId AND divoff.disasterManager=$uid";
        $excute = $this->connection->query($sql);
        $r = $excute->fetch_assoc();
        $sql = "INSERT INTO `incident` (`title`, `description`,`dvId`) VALUES ('$title','$description','" . $r['dvId'] . "');";
        $this->connection->query($sql);
        if (count($data['gns']) > 0) {
            // $result = array();
            $sql = "SELECT LAST_INSERT_ID();";
            $execute = $this->connection->query($sql);
            $r = $execute->fetch_assoc();
            $incidentId = $r["LAST_INSERT_ID()"];

            $sql = "INSERT INTO `incidentgn`(`incidentId`, `gndvId`) VALUES ";
            // ('$incidentId','$gndvId');
            $len = count($data['gns']);
            for ($x = 0; $x < $len; $x++) {
                // $items = array_keys($data['heir'][$x]);
                $values = $data['gns'][$x];

                if ($values == "all") {


                    $sql2 = "SELECT g.* FROM gndivision g,divisionaloffice d,dismgtofficer m 
        WHERE m.disMgtOfficerID = d.disasterManager AND g.dvId = d.dvId AND m.disMgtOfficerID = $uid ";
                    // echo $sql2;exit;
                    $sql = "";
                    $excute = $this->connection->query($sql2);
                    // $count = $excute->num_rows;
                    while ($r2 = $excute->fetch_assoc()) {
                        $sql .= "INSERT INTO `incidentgn`(`incidentId`, `gndvId`) VALUES ('$incidentId','" . $r2['gndvId'] . "');";
                    }
                    if ($this->connection->multi_query($sql)) {
                        echo json_encode(array("code" => $errorCode['success']));
                        exit;
                    } else {
                        echo json_encode(array("code" => $errorCode['unknownError']));
                        exit;
                    }
                }

                $sql  .= "('$incidentId','$values')";
                if (($x + 1) != $len) {
                    $sql .= ", ";
                }
            }
        }
        // echo $sql;
        // exit();
        if ($this->connection->query($sql)) {
            echo json_encode(array("code" => $errorCode['success']));
        } else {
            echo json_encode(array("code" => $errorCode['unknownError']));
        }
        //$sql = "INSERT INTO `incidentgn`(`incidentId`, `gndvId`) VALUES (".$r['incidentId'].",'$')";
    }

    public function getIncidents(array $data)
    {
        $uid = $data['userId'];
        $division = $this->getDivision($uid);
        $divisionId = $division['id'];
        $sql = "SELECT incident.* FROM incident WHERE incident.dvId=" . $divisionId . " Order by incident.isActive DESC";
        $excute = $this->connection->query($sql);
        $results = array();
        // $r = $excute->fetch_assoc();
        while ($r = $excute->fetch_assoc()) {

            $sql = "SELECT gndivision.* FROM gndivision,incidentgn,incident WHERE gndivision.gndvId=incidentgn.gndvId AND incidentgn.incidentId=incident.incidentId AND incident.incidentId=" . $r['incidentId'];
            // echo $sql;exit;
            $temp = array();
            $e = $this->connection->query($sql);
            while ($r2 = $e->fetch_assoc()) {
                $temp[] = $r2;
            }
            $r['gndiv'] = $temp;
            $results[] = $r;
        }
        $json = json_encode($results);
        echo $json;
    }

    public function getIncidentById(array $data)
    {
        $uid = $data['userId'];
        $incidentId = $data['receivedParams'][0];
        $division = $this->getDivision($uid);
        $divisionId = $division['id'];
        $sql = "SELECT incident.* FROM incident WHERE incident.incidentId=" . $incidentId . " Order by incident.isActive DESC";
        $excute = $this->connection->query($sql);
        $results = array();
        // $r = $excute->fetch_assoc();
        while ($r = $excute->fetch_assoc()) {
            $sql = "SELECT gndivision.* FROM gndivision,incidentgn WHERE gndivision.gndvId=incidentgn.gndvId AND incidentgn.incidentId=" . $incidentId;
            $temp = array();
            $e = $this->connection->query($sql);
            while ($r2 = $e->fetch_assoc()) {
                $temp[] = $r2;
            }
            $r['gndiv'] = $temp;
            $results[] = $r;
        }
        $json = json_encode($results);
        echo $json;
    }

    public function updateIncidents(array $data)
    {
    }

    public function changeIncidentStatus(array $data)
    {
        global $errorCode;
        $isActive = $data['isActive'];
        $incidentId = $data['incidentId'];
        // $residentId = $data['receivedParams'][0];
        $sql = "UPDATE `incident` SET `isActive`='$isActive' WHERE `incidentId`='$incidentId'";
        if ($this->connection->query($sql)) {;
            echo json_encode(array("code" => $errorCode['success']));
        } else {
            echo json_encode(array("code" => $errorCode['attributeMissing']));
            exit();
        }
    }

    public function changeSafehouseStatus(array $data)
    {
        global $errorCode;
        $isUsing = $data['isUsing'];
        $safeHouseID = $data['safeHouseID'];
        // $residentId = $data['receivedParams'][0];
        $sql = "UPDATE `safehouse` SET `isUsing`='$isUsing' WHERE `safeHouseID`='$safeHouseID'";
        if ($this->connection->query($sql)) {;
            echo json_encode(array("code" => $errorCode['success']));
        } else {
            echo json_encode(array("code" => $errorCode['attributeMissing']));
            exit();
        }
    }

    protected function tokenKey($length = 10)
    {
        return substr(str_shuffle("aAQEWAbcERWREdefghiHLafgdffhvcJHjklmnopqrSFSEREESGSEGst0123456789"), 0, $length);
    }

    public function getReports(array $data)
    {
        $uid = $data['userId'];
        $division = $this->getDivision($uid);
        $divisionId = $division['id'];
        $sql = "(
            SELECT
            initial.initialId AS reportId,
            initial.cause AS cause,
            initial.timestamp,
            initial.disoffapproved AS approved,
            'Initial' AS report,
            gndivision.gnDvName,
            initial.incidentId
            
        FROM
            initialincident initial,
            gndivision
            
        WHERE
            gndivision.dvId = " . $division['id'] . " AND gndivision.gndvId = initial.gndvId
        )
        UNION
            (
            SELECT
                f.finalIncidentId AS reportId,
                f.cause AS cause,
                f.timestamp,
                f.disoffapproved AS approved,
                'Final' AS report,
                gndivision.gnDvName,
            f.incidentId
            FROM
                gnfinalincident f,
                gndivision
            WHERE
            gndivision.dvId = " . $division['id'] . " AND gndivision.gndvId = f.gndvid
        )
        UNION
            (
            SELECT
                r.reliefId AS reportId,
                r.description AS cause,
                r.timestamp,
                NULL AS approved,
                'Relief' AS report,
                gndivision.gnDvName,
            r.incidentId
            FROM
                relief r,
                gndivision
            WHERE
            gndivision.dvId = " . $division['id'] . " AND gndivision.gndvId = r.gndvid
        )Order by timestamp DESC;";
        $excute = $this->connection->query($sql);
        $results = array();
        while ($r = $excute->fetch_assoc()) {
            $results[] = $r;
        }
        $json = json_encode($results);
        echo $json;
    }
    public function getReportsbyIncident(array $data)
    {
        $uid = $data['userId'];
        $incidentId = $data['receivedParams'][0];
        $division = $this->getDivision($uid);
        $divisionId = $division['id'];
        $sql = "(
            SELECT
            initial.initialId AS reportId,
            initial.cause AS cause,
            initial.timestamp,
            initial.disoffapproved AS approved,
            'Initial' AS report,
            gndivision.gnDvName,
            initial.incidentId
            
        FROM
            initialincident initial,
            gndivision
            
        WHERE
            gndivision.dvId = " . $division['id'] . " AND gndivision.gndvId = initial.gndvId AND initial.incidentId=" . $incidentId . "
        )
        UNION
            (
            SELECT
                f.finalIncidentId AS reportId,
                f.cause AS cause,
                f.timestamp,
                f.disoffapproved AS approved,
                'Final' AS report,
                gndivision.gnDvName,
            f.incidentId
            FROM
                gnfinalincident f,
                gndivision
            WHERE
            gndivision.dvId = " . $division['id'] . " AND gndivision.gndvId = f.gndvid AND f.incidentId=" . $incidentId . "
        )
        UNION
            (
            SELECT
                r.reliefId AS reportId,
                r.description AS cause,
                r.timestamp,
                NULL AS approved,
                'Relief' AS report,
                gndivision.gnDvName,
            r.incidentId
            FROM
                relief r,
                gndivision
            WHERE
            gndivision.dvId = " . $division['id'] . " AND gndivision.gndvId = r.gndvid AND r.incidentId=" . $incidentId . "
        )Order by timestamp DESC;";
        $excute = $this->connection->query($sql);
        $results = array();
        while ($r = $excute->fetch_assoc()) {
            $results[] = $r;
        }
        $json = json_encode($results);
        echo $json;
    }




    public function getFinal(array $data)
    {
        $uid = $data['userId'];
        $division = $this->getDivision($uid);
        $divisionId = $division['id'];
        $finalId = $data['receivedParams'][0];
        $sql = "
            SELECT
                final.*,gndivision.gnDvName,district.dsName,division.dvName,gramaniladari.*
            FROM
                gnfinalincident final,
                gndivision,
                gramaniladari,district,division
            WHERE
                gndivision.gndvId = final.gndvId AND final.finalIncidentId=" . $finalId . " AND gndivision.dvId=division.dvId AND division.dsId = district.dsId AND gndivision.dvId=" . $division['id'] . " AND gramaniladari.gramaNiladariID=gndivision.gramaNiladariID";

        $excute = $this->connection->query($sql);
        $r = $excute->fetch_assoc();
        // while ($r = $excute->fetch_assoc()) {
        //     $results[] = $r;
        // }

        $json = json_encode($r);
        // $json = json_encode($results);
        echo $json;
    }

    public function getInitial(array $data)
    {
        $uid = $data['userId'];
        $initialId = $data['receivedParams'][0];
        $division = $this->getDivision($uid);
        $divisionId = $division['id'];

        // "SELECT * 
        // FROM gramaniladari g 
        // JOIN gndivision d 
        // ON g.gramaNiladariID=" . $uid . " AND d.gramaNiladariID=1 
        // JOIN division s ON d.dvId=s.dvId 
        // JOIN district t ON t.dsId=s.dsId";
        $sql = "
            SELECT
                *
            FROM
                initialincident initial,
                gndivision,
                gramaniladari,district,division
            WHERE
            gndivision.gndvId = initial.gndvId AND initial.initialId=" . $initialId . " AND gndivision.dvId=division.dvId AND division.dsId = district.dsId AND gndivision.dvId=" . $division['id'] . " AND gramaniladari.gramaNiladariID=gndivision.gramaNiladariID";
        $excute = $this->connection->query($sql);
        $r = $excute->fetch_assoc();
        // while ($r = $excute->fetch_assoc()) {
        //     $results[] = $r;
        // }
        $json = json_encode($r);
        // $json = json_encode($results);
        echo $json;
    }
    public function getGNsOnIncident(array $data)
    {
        $uid = $data['userId'];
        $incidentId = $data['receivedParams'][0];
        $division = $this->getDivision($uid);
        $divisionId = $division['id'];

        $sql = "
        SELECT
        gndivision.gndvId,gndivision.gnDvName
    FROM
        incidentgn,gndivision
    WHERE
        incidentgn.incidentId=" . $incidentId . " AND gndivision.gndvId=incidentgn.gndvId";
        $excute = $this->connection->query($sql);
        // $r = $excute->fetch_assoc();
        while ($r = $excute->fetch_assoc()) {
            $results[] = $r;
        }
        // $json = json_encode($r);
        $json = json_encode($results);
        echo $json;
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
                    dis.disasterManager = " . $uid . " AND dis.dvId = g.dvId AND g.gndvId = death.gndvId AND g.dvId = d.dvId
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
                    dis.disasterManager = " . $uid . " AND dis.dvId = g.dvId AND g.gndvId = f.gndvId AND g.dvId = d.dvId
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

    // Reporting

    public function getinitialsforreports(array $data)
    {
        $uid = $data['userId'];

        $results = array();
        $resultsreports = array();
        $sql = "
        SELECT
            *
        FROM
        
            divisionaloffice,
            dismgtofficer,district,division
        WHERE
            divisionaloffice.disasterManager = " . $uid . " AND dismgtofficer.disMgtOfficerID=" . $uid . " AND divisionaloffice.dvId=division.dvId AND division.dsId = district.dsId";
        $excute = $this->connection->query($sql);
        $r = $excute->fetch_assoc();
        $results['main'] = $r;

        $sql = "
        SELECT
        initial.initialId AS reportId,
        initial.cause AS cause,
        initial.disaster,
        initial.date,
        initial.location,
        initial.fam,
        initial.people,
        initial.death,
        initial.injured,
        initial.missing
    FROM
        initialincident initial,
        gndivision,division,district,
    WHERE
        gndivision.gramaNiladariID = " . $uid . " AND gndivision.gndvId = initial.gndvId AND initial.disoffapproved='a' AND gndivision.dvId=division.dvId AND division.dsId = district.dsId";

        // echo($sql);exit;
        $excute = $this->connection->query($sql);
        while ($r = $excute->fetch_assoc()) {
            $resultsreports[] = $r;
        }
        $results['reports'] = $resultsreports;
        // print_r($results);exit;

        // $json = json_encode($r);
        $json = json_encode($results);
        echo $json;
    }

    public function getCompensationsforreports(array $data)
    {
        $uid = $data['userId'];
        $results = array();
        $resultsreports = array();
        $sql = "
        SELECT
            *
        FROM
        
            divisionaloffice,
            dismgtofficer,district,division
        WHERE
            divisionaloffice.disasterManager = " . $uid . " AND dismgtofficer.disMgtOfficerID=" . $uid . " AND divisionaloffice.dvId=division.dvId AND division.dsId = district.dsId";
        $excute = $this->connection->query($sql);
        $r = $excute->fetch_assoc();
        $results['main'] = $r;


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
                    dis.disasterManager = " . $uid . " AND dis.dvId = g.dvId AND g.gndvId = death.gndvId AND g.dvId = d.dvId
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
                    dis.disasterManager = " . $uid . " AND dis.dvId = g.dvId AND g.gndvId = f.gndvId AND g.dvId = d.dvId;";
        $excute = $this->connection->query($sql);
        // $results = array();
        while ($r = $excute->fetch_assoc()) {
            $resultsreports[] = $r;
        }
        $results['reports'] = $resultsreports;
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
                $sql = "UPDATE `propertycompensation` SET `dvapproved`='$dmcapproved', `dvremarks`='$dmcremarks' WHERE `propcomId`='$reportId'";
            } else {
                $sql = "UPDATE `deathcompensation` SET `dvapproved`='$dmcapproved', `dvremarks`='$dmcremarks' WHERE `deathId`='$reportId'";
            }
            $this->connection->query($sql);
            echo json_encode(array("code" => $errorCode['success']));
        } else {
            echo json_encode(array("code" => $errorCode['attributeMissing']));
            exit();
        }
    }
    public function reportIntoIncident(array $data)
    {
        global $errorCode;
        // print_r($data);
        // exit;

        // $uid = $data['userId'];
        $incidentId = $data['inc'][0];

        $report = $data['rtype'];
        $reportId = $data['rid'];
        // echo $incidentId;exit;
        // $residentId = $data['receivedParams'][0];
        if (!empty($incidentId)) {
            if ($report == "Initial") {
                $sql = "UPDATE `initialincident` SET `incidentId`='$incidentId' WHERE `initialId`='$reportId'";
            } else if ($report == "Final") {
                $sql = "UPDATE `gnfinalincident` SET `incidentId`='$incidentId' WHERE `finalIncidentId`='$reportId'";
            } else {
                $sql = "UPDATE `relief` SET `incidentId`='$incidentId' WHERE `reliefId`='$reportId'";
            }
            $this->connection->query($sql);
            echo json_encode(array("code" => $errorCode['success']));
        } else {
            echo json_encode(array("code" => $errorCode['attributeMissing']));
            exit();
        }
    }
    public function approveinc(array $data)
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
            if ($report == "Final") {
                $sql = "UPDATE `gnfinalincident` SET `disoffapproved`='$dmcapproved', `disRemarks`='$dmcremarks' WHERE `finalIncidentId`='$reportId'";
            } else {
                $sql = "UPDATE `initialincident` SET `disoffapproved`='$dmcapproved', `disRemarks`='$dmcremarks' WHERE `initialId`='$reportId'";
            }
            $this->connection->query($sql);
            echo json_encode(array("code" => $errorCode['success']));
        } else {
            echo json_encode(array("code" => $errorCode['attributeMissing']));
            exit();
        }
    }
    public function collectedcomp(array $data)
    {
        global $errorCode;
        // print_r($data);
        // exit;

        // $uid = $data['userId'];

        $report = $data['report'];
        $reportId = $data['reportId'];
        // $residentId = $data['receivedParams'][0];
        if (!empty($report)) {
            if ($report == "Property") {
                $sql = "UPDATE `propertycompensation` SET `collected`='1' WHERE `propcomId`='$reportId'";
            } else {
                $sql = "UPDATE `deathcompensation` SET `collected`='1' WHERE `deathId`='$reportId'";
            }
            $this->connection->query($sql);
            echo json_encode(array("code" => $errorCode['success']));
        } else {
            echo json_encode(array("code" => $errorCode['attributeMissing']));
            exit();
        }
    }


    // get counts of finals to the given incident
    public function getFinalsbyIncident(array $data)
    {
        global $errorCode;
        $uid = $data['userId'];
        $incidentId = $data['receivedParams'][0];
       
        $sql = "SELECT gndivision.gnDvName, gnfinalincident.* 
        FROM gnfinalincident, gndivision 
        WHERE gnfinalincident.incidentId = ".$incidentId." AND gnfinalincident.disoffapproved = 'a' AND gnfinalincident.gndvid = gndivision.gndvId;";
        $excute = $this->connection->query($sql);
        $results = array();
        // $r = $excute->fetch_assoc();
        while ($r = $excute->fetch_assoc()) {
            $results[] = $r;
        }
        $json = json_encode($results);
        echo $json;
    }
}
