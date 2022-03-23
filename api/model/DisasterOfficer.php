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
        $sql = "SELECT * FROM dismgtofficer do JOIN divisionaloffice d ON do.disMgtOfficerID=" . $uid . " AND JOIN division s ON d.dvId=s.dvId JOIN district t ON t.dsId=s.dsId;";
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
        $sql = "SELECT a.*,d.* FROM alert a JOIN alertdisdivgn d ON d.alertId=a.msgId JOIN gndivision g ON g.gndvId=d.gndvId WHERE g.gramaNiladariID=" . $uid . " ORDER BY a.timestamp DESC";
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
            $safehouse = $data['safehouse'];

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
        $sql = "SELECT count(a.safeHouseID) FROM safehouse s JOIN gndivision g ON g.gndvId=a.gndvId WHERE g.gramaNiladariID=" . $uid;
        $excute = $this->connection->query($sql);
        $r = $excute->fetch_assoc();
        $json = json_encode($r);
        echo $json;
    }


    public function addIncidents(array $data)
    {
        global $errorCode;
        //$uid = $data['userId'];
        $title = $data['title'];
        $description = $data['description'];
        $gndvId = $data['gnDiv'];

        //$sql = "SELECT d.* FROM division d, divisionaloffice divoff WHERE d.dvId=divoff.dvId AND divoff.disasterManager=$uid";
        // $excute = $this->connection->query($sql);
        // $r = $excute-> fetch_assoc();
        $sql = "INSERT INTO incident (title, description) VALUES ('$title','$description');";
        $this->connection->query($sql);
        $result = array();
        $sql = "SELECT LAST_INSERT_ID();";
        $execute = $this->connection->query($sql);
        $r = $execute->fetch_assoc();
        $incidentId = $r["LAST_INSERT_ID()"];
        $sql = "INSERT INTO `incidentgn`(`incidentId`, `gndvId`) VALUES ('$incidentId','$gndvId');";
        $this->connection->query($sql);
        //$sql = "INSERT INTO `incidentgn`(`incidentId`, `gndvId`) VALUES (".$r['incidentId'].",'$')";
    }

    public function getIncidents(array $data)
    {
        $uid = $data['userId'];
        // $sql = "SELECT * FROM `gndivision` WHERE `gramaNiladariID` =" . $uid;
        // $excute = $this->connection->query($sql);
        // $r = $excute->fetch_assoc();
        // SELECT a.*,d.* FROM alert a JOIN alertdisdivgn d ON d.alertId=a.msgId JOIN gndivision g ON g.gndvId=d.gndvId WHERE g.gramaNiladariID=1 ORDER BY a.timestamp DESC;
        // SELECT a.* FROM alert a JOIN alertdisdivgn d ON d.gndvId=5 AND d.alertId=a.msgId ORDER BY a.timestamp DESC;
        $sql = "SELECT s.*,t.*,g.* FROM incident s JOIN incidentgn t ON t.incidentId=s.incidentId JOIN gndivision g ON g.gndvId=t.gndvId WHERE g.gramaNiladariID=" . $uid . " ORDER BY s.isActive DESC, s.incidentId DESC;";
        $excute = $this->connection->query($sql);
        $results = array();
        // $r = $excute->fetch_assoc();
        while ($r = $excute->fetch_assoc()) {
            $results[] = $r;
        }
        $json = json_encode($results);
        echo $json;
    }

    public function getIncidentById(array $data)
    {
        $uid = $data['userId'];
        $incidentId = $data['receivedParams'][0];
        // $sql = "SELECT * FROM `gndivision` WHERE `gramaNiladariID` =" . $uid;
        // $excute = $this->connection->query($sql);
        // $r = $excute->fetch_assoc();
        // SELECT a.*,d.* FROM alert a JOIN alertdisdivgn d ON d.alertId=a.msgId JOIN gndivision g ON g.gndvId=d.gndvId WHERE g.gramaNiladariID=1 ORDER BY a.timestamp DESC;
        // SELECT a.* FROM alert a JOIN alertdisdivgn d ON d.gndvId=5 AND d.alertId=a.msgId ORDER BY a.timestamp DESC;
        $sql = "SELECT s.* FROM incident s WHERE s.incidentId=" . $incidentId . ";";
        $excute = $this->connection->query($sql);
        $results = array();
        // $r = $excute->fetch_assoc();
        while ($r = $excute->fetch_assoc()) {
            $results[] = $r;
        }
        $json = json_encode($results);
        echo $json;
    }

    public function updateIncidents(array $data)
    {
    }

    protected function tokenKey($length = 10)
    {
        return substr(str_shuffle("aAQEWAbcERWREdefghiHLafgdffhvcJHjklmnopqrSFSEREESGSEGst0123456789"), 0, $length);
    }

    public function getReports(array $data)
    {
        $uid = $data['userId'];
        $sql = "(
            SELECT
                initial.initialId AS reportId,
                initial.cause AS cause,
                initial.timestamp,
                initial.disoffapproved AS approved,
            'Initial' AS report
            FROM
                initialincident initial,
                gndivision
            WHERE
                gndivision.gramaNiladariID = " . $uid . " AND gndivision.gndvId = initial.gndvId
        )
        UNION
            (
            SELECT
                f.finalIncidentId AS reportId,
                f.cause AS cause,
                f.timestamp,
                f.disoffapproved AS approved,
                'Final' AS report
            FROM
                gnfinalincident f,
                gndivision
            WHERE
                gndivision.gramaNiladariID = " . $uid . " AND gndivision.gndvId = f.gndvid
        )
        UNION
            (
            SELECT
                r.reliefId AS reportId,
                r.description AS cause,
                r.timestamp,
                NULL AS approved,
                'Relief' AS report
            FROM
                relief r,
                gndivision
            WHERE
                gndivision.gramaNiladariID = " . $uid . " AND gndivision.gndvId = r.gndvid
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
        $sql = "(
            SELECT
                initial.initialId AS reportId,
                initial.cause AS cause,
                initial.timestamp,
                initial.disoffapproved AS approved,
            'Initial' AS report
            FROM
                initialincident initial,
                gndivision
            WHERE
                gndivision.gramaNiladariID = " . $uid . " AND gndivision.gndvId = initial.gndvId AND initial.incidentId=" . $incidentId . "
        )
        UNION
            (
            SELECT
                f.finalIncidentId AS reportId,
                f.cause AS cause,
                f.timestamp,
                f.disoffapproved AS approved,
                'Final' AS report
            FROM
                gnfinalincident f,
                gndivision
            WHERE
                gndivision.gramaNiladariID = " . $uid . " AND gndivision.gndvId = f.gndvid AND f.incidentId=" . $incidentId . "
        )
        UNION
            (
            SELECT
                r.reliefId AS reportId,
                r.description AS cause,
                r.timestamp,
                NULL AS approved,
                'Relief' AS report
            FROM
                relief r,
                gndivision
            WHERE
                gndivision.gramaNiladariID = " . $uid . " AND gndivision.gndvId = r.gndvid AND r.incidentId=" . $incidentId . "
        )Order by timestamp DESC;";
        $excute = $this->connection->query($sql);
        $results = array();
        while ($r = $excute->fetch_assoc()) {
            $results[] = $r;
        }
        $json = json_encode($results);
        echo $json;
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


    public function getFinal(array $data)
    {
        $uid = $data['userId'];
        $finalId = $data['receivedParams'][0];
        $sql = "
            SELECT
                final.*,gndivision.gnDvName,district.dsName,division.dvName,gramaniladari.*
            FROM
                gnfinalincident final,
                gndivision,
                gramaniladari,district,division
            WHERE
                gndivision.gramaNiladariID = " . $uid . " AND gndivision.gndvId = final.gndvId AND final.finalIncidentId=" . $finalId . " AND gramaniladari.gramaNiladariID=" . $uid . " AND gndivision.dvId=division.dvId AND division.dsId = district.dsId";

        $excute = $this->connection->query($sql);
        $r = $excute->fetch_assoc();
        // while ($r = $excute->fetch_assoc()) {
        //     $results[] = $r;
        // }

        $json = json_encode($r);
        // $json = json_encode($results);
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
}
