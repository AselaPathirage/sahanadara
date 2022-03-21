<?php
class GramaNiladari extends ResponsiblePerson
{
    use Alerter;
    public function __construct($con)
    {
        parent::__construct($con);
    }


    // Resident Details

    public function addResident(array $data)
    {
        global $errorCode;
        $uid = $data['userId'];
        $name = $data['name'];
        $nic = $data['nic'];
        $phone = $data['phone'];
        $address = $data['address'];

        $sql = "SELECT * FROM `gndivision` WHERE `gramaNiladariID` =" . $uid;
        $excute = $this->connection->query($sql);
        $r = $excute->fetch_assoc();
        $sql = "INSERT INTO resident (residentName, residentTelNo,residentAddress,gndvId,residentNIC ) VALUES ('$name', '$phone','$address'," . $r['gndvId'] . ", '$nic');";
        if ($this->connection->query($sql)) {
            echo json_encode(array("code" => $errorCode['success']));
        } else {
            echo json_encode(array("code" => $errorCode['unknownError']));
        }
    }
    public function getResident(array $data)
    {
        $uid = $data['userId'];
        $sql = "SELECT * FROM `gndivision` WHERE `gramaNiladariID` =" . $uid;
        $excute = $this->connection->query($sql);
        $r = $excute->fetch_assoc();
        $sql = "SELECT r.* FROM resident r WHERE r.gndvId =" . $r['gndvId'];
        $excute = $this->connection->query($sql);
        $results = array();
        while ($r = $excute->fetch_assoc()) {
            $results[] = $r;
        }
        $json = json_encode($results);
        echo $json;
    }

    public function updateResident(array $data)
    {
        global $errorCode;
        if (count($data['receivedParams']) == 1) {
            $uid = $data['userId'];
            $name = $data['upname'];
            $nic = $data['upnic'];
            $phone = $data['upphone'];
            $address = $data['upaddress'];
            $residentId = $data['receivedParams'][0];
            $sql = "UPDATE `resident` SET `residentName`='$name', `residentTelNo`='$phone',`residentAddress`='$address',`residentNIC`='$nic' WHERE residentId =$residentId ";
            $this->connection->query($sql);
            echo json_encode(array("code" => $errorCode['success']));
        } else {
            echo json_encode(array("code" => $errorCode['attributeMissing']));
            exit();
        }
    }
    public function deleteResident(array $data)
    {
        global $errorCode;
        if (count($data['receivedParams']) == 1) {

            $residentId = $data['receivedParams'][0];
            $sql = "DELETE FROM `resident` WHERE residentId =$residentId ";
            $this->connection->query($sql);
            echo json_encode(array("code" => $errorCode['success']));
        } else {
            echo json_encode(array("code" => $errorCode['attributeMissing']));
            exit();
        }
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
        // $username = md5($data['nic']);
        $userType = $data['userType'];
        $password = md5($data['password']);
        $sql = "SELECT * FROM login l WHERE l.roleId ='$userType' AND l.empPassword ='$password' AND l.empId ='$uid'";
        $excute = $this->connection->query($sql);
        return $excute->num_rows > 0;
    }

    public function updateProfileDetails(array $data)
    {
        global $errorCode;

        if ($this->checkPassword($data)) {
            // print_r($data);
            // exit;
            $uid = $data['userId'];
            $email = $data['email'];
            $address = $data['add'];
            $phone = $data['tel'];
            $ofaddress = $data['ofAdd'];
            $ofphone = $data['ofTel'];
            $sql = "UPDATE `gramaniladari` SET `empAddress`='$address', `empEmail`='$email',`empTele`='$phone' WHERE `gramaNiladariID`='$uid' ";
            $sql2 = "UPDATE `gndivision` SET `officeAddress`='$ofaddress', `telno`='$ofphone' WHERE `gramaNiladariID`='$uid' ";
            $this->connection->query($sql);
            $this->connection->query($sql2);
            if (!empty($data['npassword'])) {
                $userType = $data['userType'];
                $password = md5($data['npassword']);
                $sql = "UPDATE `login` SET `empPassword`='$password' WHERE roleId ='$userType' AND empId ='$uid'";
                $this->connection->query($sql);
            }
            echo json_encode(array("code" => $errorCode['success']));
        } else {
            echo json_encode(array("code" => $errorCode['attributeMissing']));
            exit();
        }
    }

    public function getMessages(array $data)
    {
        $uid = $data['userId'];
        $sql = "SELECT * FROM `gndivision` WHERE `gramaNiladariID` =" . $uid;
        $excute = $this->connection->query($sql);
        $r = $excute->fetch_assoc();
        $sql = "SELECT r.* FROM gnmsg r WHERE r.gndvId =" . $r['gndvId'] . " ORDER BY r.timestamp DESC";
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
        $sql = "INSERT INTO gnmsg (message, gndvId ) VALUES ('$msg'," . $r['gndvId'] . ");";
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

    public function getResidentCount(array $data)
    {
        $uid = $data['userId'];
        // $sql = "SELECT * FROM `gndivision` WHERE `gramaNiladariID` =" . $uid;
        // $excute = $this->connection->query($sql);
        // $r = $excute->fetch_assoc();
        // SELECT a.*,d.* FROM alert a JOIN alertdisdivgn d ON d.alertId=a.msgId JOIN gndivision g ON g.gndvId=d.gndvId WHERE g.gramaNiladariID=1 ORDER BY a.timestamp DESC;
        // SELECT a.* FROM alert a JOIN alertdisdivgn d ON d.gndvId=5 AND d.alertId=a.msgId ORDER BY a.timestamp DESC;
        $sql = "SELECT count(a.residentId) FROM resident a JOIN gndivision g ON g.gndvId=a.gndvId WHERE g.gramaNiladariID=" . $uid;
        $excute = $this->connection->query($sql);
        $r = $excute->fetch_assoc();
        $json = json_encode($r);
        echo $json;
    }
    public function getCompCount(array $data)
    {
        $uid = $data['userId'];
        $results = array();
        // $sql = "SELECT * FROM `gndivision` WHERE `gramaNiladariID` =" . $uid;
        // $excute = $this->connection->query($sql);
        // $r = $excute->fetch_assoc();
        // SELECT a.*,d.* FROM alert a JOIN alertdisdivgn d ON d.alertId=a.msgId JOIN gndivision g ON g.gndvId=d.gndvId WHERE g.gramaNiladariID=1 ORDER BY a.timestamp DESC;
        // SELECT a.* FROM alert a JOIN alertdisdivgn d ON d.gndvId=5 AND d.alertId=a.msgId ORDER BY a.timestamp DESC;
        $sql = "SELECT count(a.deathId) FROM deathcompensation a JOIN gndivision g ON g.gndvId=a.gndvId WHERE g.gramaNiladariID=" . $uid . " AND a.dmcapproved='a' AND a.collected='0'";
        $excute = $this->connection->query($sql);
        $r = $excute->fetch_assoc();
        $results['dcount'] = $r;
        $sql = "SELECT count(a.propcomId) FROM propertycompensation a JOIN gndivision g ON g.gndvId=a.gndvId WHERE g.gramaNiladariID=" . $uid . " AND a.dmcapproved='a' AND a.collected='0'";
        $excute = $this->connection->query($sql);
        $r = $excute->fetch_assoc();
        $results['pcount'] = $r;
        $json = json_encode($results);
        echo $json;
    }

    public function getSafehouses(array $data)
    {
        $uid = $data['userId'];
        // $sql = "SELECT * FROM `gndivision` WHERE `gramaNiladariID` =" . $uid;
        // $excute = $this->connection->query($sql);
        // $r = $excute->fetch_assoc();
        // SELECT a.*,d.* FROM alert a JOIN alertdisdivgn d ON d.alertId=a.msgId JOIN gndivision g ON g.gndvId=d.gndvId WHERE g.gramaNiladariID=1 ORDER BY a.timestamp DESC;
        // SELECT a.* FROM alert a JOIN alertdisdivgn d ON d.gndvId=5 AND d.alertId=a.msgId ORDER BY a.timestamp DESC;
        $sql = "SELECT s.*,d.* FROM safehouse s JOIN safehousecontact d ON d.safeHouseID=s.safeHouseID JOIN gndivision g ON g.safeHouseID=s.safeHouseID WHERE g.gramaNiladariID=" . $uid . ";";
        $excute = $this->connection->query($sql);
        // $results = array();
        $r = $excute->fetch_assoc();
        // while ($r = $excute->fetch_assoc()) {
        //     $results[] = $r;
        // }
        $json = json_encode($r);
        echo $json;
    }
    public function getSafehouseRecent(array $data)
    {
        $uid = $data['userId'];
        // $sql = "SELECT * FROM `gndivision` WHERE `gramaNiladariID` =" . $uid;
        // $excute = $this->connection->query($sql);
        // $r = $excute->fetch_assoc();
        // SELECT a.*,d.* FROM alert a JOIN alertdisdivgn d ON d.alertId=a.msgId JOIN gndivision g ON g.gndvId=d.gndvId WHERE g.gramaNiladariID=1 ORDER BY a.timestamp DESC;
        // SELECT a.* FROM alert a JOIN alertdisdivgn d ON d.gndvId=5 AND d.alertId=a.msgId ORDER BY a.timestamp DESC;
        $sql = "SELECT s.*,t.* FROM safehouse s JOIN safehousestatus t ON t.safehouseId=s.safeHouseID JOIN gndivision g ON g.safeHouseID=s.safeHouseID WHERE g.gramaNiladariID=" . $uid . " ORDER BY t.createdDate DESC LIMIT 1;";
        $excute = $this->connection->query($sql);
        // $results = array();
        $r = $excute->fetch_assoc();
        // while ($r = $excute->fetch_assoc()) {
        //     $results[] = $r;
        // }
        $json = json_encode($r);
        echo $json;
    }
    public function getResponsible(array $data)
    {
        $uid = $data['userId'];
        // $sql = "SELECT * FROM `gndivision` WHERE `gramaNiladariID` =" . $uid;
        // $excute = $this->connection->query($sql);
        // $r = $excute->fetch_assoc();
        // SELECT a.*,d.* FROM alert a JOIN alertdisdivgn d ON d.alertId=a.msgId JOIN gndivision g ON g.gndvId=d.gndvId WHERE g.gramaNiladariID=1 ORDER BY a.timestamp DESC;
        // SELECT a.* FROM alert a JOIN alertdisdivgn d ON d.gndvId=5 AND d.alertId=a.msgId ORDER BY a.timestamp DESC;
        $sql = "SELECT s.*,t.* FROM safehouse s JOIN responsibleperson t ON t.safeHouseID=s.safeHouseID JOIN gndivision g ON g.safeHouseID=s.safeHouseID WHERE g.gramaNiladariID=" . $uid . ";";
        $excute = $this->connection->query($sql);
        // $results = array();
        $r = $excute->fetch_assoc();
        // while ($r = $excute->fetch_assoc()) {
        //     $results[] = $r;
        // }
        $json = json_encode($r);
        echo $json;
    }
    public function getIncidents(array $data)
    {
        $uid = $data['userId'];
        // $sql = "SELECT * FROM `gndivision` WHERE `gramaNiladariID` =" . $uid;
        // $excute = $this->connection->query($sql);
        // $r = $excute->fetch_assoc();
        // SELECT a.*,d.* FROM alert a JOIN alertdisdivgn d ON d.alertId=a.msgId JOIN gndivision g ON g.gndvId=d.gndvId WHERE g.gramaNiladariID=1 ORDER BY a.timestamp DESC;
        // SELECT a.* FROM alert a JOIN alertdisdivgn d ON d.gndvId=5 AND d.alertId=a.msgId ORDER BY a.timestamp DESC;
        $sql = "SELECT s.*,t.* FROM incident s JOIN incidentgn t ON t.incidentId=s.incidentId JOIN gndivision g ON g.gndvId=t.gndvId WHERE g.gramaNiladariID=" . $uid . " ORDER BY s.isActive DESC, s.incidentId DESC;";
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

    //initial incident
    public function addInitial(array $data)
    {
        global $errorCode;
        $uid = $data['userId'];
        $datePicker = $data['datePicker'];
        $disaster = $data['disaster'];
        $location = $data['location'];
        $cause = $data['cause'];
        $afam = $data['afam'];
        $apeople = $data['apeople'];
        $deaths = $data['deaths'];
        $injured = $data['injured'];
        $missing = $data['missing'];
        $hfull = $data['hfull'];
        $hpartial = $data['hpartial'];
        $enterprises = $data['enterprises'];
        $infra = $data['infra'];
        $safenum = $data['safenum'];
        $sfam = $data['sfam'];
        $speople = $data['speople'];
        $remarks = $data['remarks'];

        $sql = "SELECT * FROM `gndivision` WHERE `gramaNiladariID` =" . $uid;
        $excute = $this->connection->query($sql);
        $r = $excute->fetch_assoc();
        $sql = "INSERT INTO `initialincident`( `disaster`, `date`, `location`, `cause`, `fam`, `people`, `death`, `injured`, 
        `missing`, `hfull`, `hpartial`, `enterprise`, `infra`, `safefam`, `safepeople`, `safenumber`, 
        `remarks`, `gndvId`) VALUES ('$disaster','$datePicker','$location','$cause','$afam','$apeople','$deaths','$injured','$missing','$hfull','$hpartial','$enterprises','$infra','$sfam','$speople','$safenum','$remarks'," . $r['gndvId'] . ");";


        if ($this->connection->query($sql)) {
            echo json_encode(array("code" => $errorCode['success']));
        } else {
            echo json_encode(array("code" => $errorCode['unknownError']));
        }
    }
    public function addRelief(array $data)
    {

        global $errorCode;
        $uid = $data['userId'];
        $datePicker = $data['datePicker'];
        $cause = $data['cause'];
        $m1 = $data['m1'];
        $m2 = $data['m2'];
        $m3 = $data['m3'];
        $m4 = $data['m4'];
        $m5 = $data['m5'];
        $cooked = $data['cooked'];
        $emer = $data['emer'];
        $fam = $data['fam'];
        $people = $data['people'];
        $deaths = $data['deaths'];
        $injured = $data['injured'];
        $missing = $data['missing'];
        $remarks = $data['remarks'];

        $sql = "SELECT * FROM `gndivision` WHERE `gramaNiladariID` =" . $uid;
        $excute = $this->connection->query($sql);
        $r = $excute->fetch_assoc();
        $sql = "INSERT INTO `relief`( `date`, `description`, `f1`, `f2`, `f3`, `f4`, `f5`, `cooked`, `emergency`, `fam`, 
        `people`, `death`, `injured`, `missing`, `remarks`, `gndvId`) VALUES 
        ('$datePicker','$cause','$m1','$m2','$m3','$m4','$m5','$cooked',
        '$emer','$fam','$people','$deaths','$injured','$missing','$remarks'," . $r['gndvId'] . ");";


        if ($this->connection->query($sql)) {
            echo json_encode(array("code" => $errorCode['success']));
        } else {
            echo json_encode(array("code" => $errorCode['unknownError']));
        }
    }
    public function addFinal(array $data)
    {
        global $errorCode;
        $uid = $data['userId'];
        $datePicker1 = $data['datePicker1'];
        $datePicker2 = $data['datePicker2'];
        $disaster = $data['disaster'];
        $location = $data['location'];
        $cause = $data['cause'];
        $afam = $data['afam'];
        $apeople = $data['apeople'];
        $efam = $data['efam'];
        $epeople = $data['epeople'];
        $deaths = $data['deaths'];
        $injured = $data['injured'];
        $missing = $data['missing'];
        $hos = $data['hos'];
        $hfull = $data['hfull'];
        $hpartial = $data['hpartial'];
        $enterprises = $data['enterprises'];
        $infra = $data['infra'];
        $safenum = $data['safenum'];
        $sfam = $data['sfam'];
        $speople = $data['speople'];
        $emer = $data['emer'];
        $dry = $data['dry'];
        $cooked = $data['cooked'];
        $remarks = $data['remarks'];

        $sql = "SELECT * FROM `gndivision` WHERE `gramaNiladariID` =" . $uid;
        $excute = $this->connection->query($sql);
        $r = $excute->fetch_assoc();
        $sql = "INSERT INTO `gnfinalincident`(`startDate`, `endDate`, `disaster`, `location`,
         `cause`, `fam`, `people`, `death`, `injured`, `evafam`, `hospitalized`, `missing`, `evapeople`, 
         `hfull`, `hpartial`, `enterprise`, `infras`, `numofsafe`, `sfpeople`, `sffamily`, 
         `dryrationsRs`, `cookingRs`, `emergencyRs`, `remarks`, `gndvid`) VALUES 
        ('$datePicker1','$datePicker2','$disaster','$location','$cause','$afam','$apeople',
        '$deaths','$injured','$efam','$hos','$missing',
        '$epeople','$hfull','$hpartial','$enterprises','$infra','$safenum','$speople','$sfam',
        '$dry','$cooked','$emer', '$remarks'," . $r['gndvId'] . ");";


        if ($this->connection->query($sql)) {
            echo json_encode(array("code" => $errorCode['success']));
        } else {
            echo json_encode(array("code" => $errorCode['unknownError']));
        }
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
    public function getInitial(array $data)
    {
        $uid = $data['userId'];
        $initialId = $data['receivedParams'][0];
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
                gndivision.gramaNiladariID = " . $uid . " AND gndivision.gndvId = initial.gndvId AND initial.initialId=" . $initialId . " AND gramaniladari.gramaNiladariID=" . $uid . " AND gndivision.dvId=division.dvId AND division.dsId = district.dsId";
        $excute = $this->connection->query($sql);
        $r = $excute->fetch_assoc();
        // while ($r = $excute->fetch_assoc()) {
        //     $results[] = $r;
        // }
        $json = json_encode($r);
        // $json = json_encode($results);
        echo $json;
    }
    public function getRelief(array $data)
    {
        $uid = $data['userId'];
        $reliefId = $data['receivedParams'][0];
        $sql = "
            SELECT
                *
            FROM
                relief,
                gndivision,
                gramaniladari,district,division
            WHERE
                gndivision.gramaNiladariID = " . $uid . " AND gndivision.gndvId = relief.gndvId AND relief.reliefId=" . $reliefId . " AND gramaniladari.gramaNiladariID=" . $uid . " AND gndivision.dvId=division.dvId AND division.dsId = district.dsId";
        $excute = $this->connection->query($sql);
        $r = $excute->fetch_assoc();
        // while ($r = $excute->fetch_assoc()) {
        //     $results[] = $r;
        // }
        $json = json_encode($r);
        // $json = json_encode($results);
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




    // compensation
    public function addDeathcomp(array $data)
    {
        // print_r(array_values($data['heir'][0]));
        // exit;
        global $errorCode;
        $uid = $data['userId'];
        $disaster = $data['disaster'];
        $disdate = $data['disdate'];
        $dname = $data['dname'];
        $ddate = $data['ddate'];
        $dnic = $data['dnic'];
        $daddress = $data['daddress'];
        $doccupation = $data['doccupation'];
        $aname = $data['aname'];
        $anic = $data['anic'];
        $atpnumber = $data['atpnumber'];
        $relationship = $data['relationship'];

        $sql = "SELECT * FROM `gndivision` WHERE `gramaNiladariID` =" . $uid;
        $excute = $this->connection->query($sql);
        $r = $excute->fetch_assoc();
        $sql = "INSERT INTO `deathcompensation`( `disaster`, `disasterdate`, `deathdate`, `dname`, `dnic`, `daddress`, `doccupation`, `aname`, `anic`, `arelationship`,`atelno`, `gndvId`) VALUES 
        ('$disaster','$disdate','$ddate','$dname','$dnic','$daddress','$doccupation','$aname',
        '$anic','$relationship','$atpnumber'," . $r['gndvId'] . ");";
        $this->connection->query($sql);


        if (count($data['heir']) > 0) {
            $sql = "SELECT LAST_INSERT_ID();";
            $execute = $this->connection->query($sql);
            $r = $execute->fetch_assoc();
            $noticeId = $r["LAST_INSERT_ID()"];
            $sql = "INSERT INTO `deathheir`(`deathid`, `name`, `bank`, `branch`, `accno`, `nic`, `relationship`) VALUES ";
            $len = count($data['heir']);
            for ($x = 0; $x < $len; $x++) {
                // $items = array_keys($data['heir'][$x]);
                $values = array_values($data['heir'][$x]);
                $leny = count($data['heir'][$x]);
                // [0] => hname
                // [1] => hnic
                // [2] => hrelationship
                // [3] => hbranch
                // [4] => haccnum
                // [5] => hbank
                $hname = $values[0];
                $hnic = $values[1];
                $hrelationship = $values[2];
                $hbranch = $values[3];
                $haccnum = $values[4];
                $hbank = $values[5];
                $sql  .= "('$noticeId', '$hname', '$hbank','$hbranch', '$haccnum', '$hnic', '$hrelationship')";
                if (($x + 1) != $len) {
                    $sql .= ", ";
                }
            }
            // echo $sql;
            // exit();
            if ($this->connection->query($sql)) {
                echo json_encode(array("code" => $errorCode['success']));
            } else {
                echo json_encode(array("code" => $errorCode['unknownError']));
            }
        }
    }
    public function addPropertycomp(array $data)
    {
        // print_r(array_values($data['heir'][0]));
        // exit;

        global $errorCode;
        $uid = $data['userId'];
        $disaster = $data['disaster'];
        $aname = $data['aname'];
        $anic = $data['anic'];
        $aaddress = $data['aaddress'];
        $atpnumber = $data['atpnumber'];
        $arelationship = $data['arelationship'];
        $tla = $data['tla'];
        $htype = $data['htype'];
        $totcomp = $data['totcomp'];
        $hname = $data['hname'];
        $hbank = $data['hbank'];
        $hbranch = $data['hbranch'];
        $hacc = $data['hacc'];

        $sql = "SELECT * FROM `gndivision` WHERE `gramaNiladariID` =" . $uid;
        $excute = $this->connection->query($sql);
        $r = $excute->fetch_assoc();
        $sql = "INSERT INTO `propertycompensation`(`disaster`, `aname`, `anic`, `aaddress`, `atpnumber`, `arelationship`, `tla`, `htype`, `totcomp`, `hname`, `hbank`, `hacc`, `hbranch`, `gndvId`) VALUES 
        ('$disaster','$aname','$anic','$aaddress','$atpnumber','$arelationship','$tla',
        '$htype','$totcomp','$hname','$hbank','$hacc','$hbranch'," . $r['gndvId'] . ");";
        $this->connection->query($sql);

        $sql = "SELECT LAST_INSERT_ID();";
        $execute = $this->connection->query($sql);
        $r = $execute->fetch_assoc();
        $noticeId = $r["LAST_INSERT_ID()"];


        if (count($data['property']) > 0) {
            $sql = "INSERT INTO `propcomprop`(`propcomId`, `dptype`, `dpdes`, `dpta`, `dpda`,`dpvod`) VALUES ";
            $len = count($data['property']);
            for ($x = 0; $x < $len; $x++) {
                // $items = array_keys($data['heir'][$x]);
                $values = array_values($data['property'][$x]);
                $leny = count($data['property'][$x]);

                $dptype = $values[0];
                $dpdes = $values[1];
                $dpta = $values[2];
                $dpda = $values[3];
                $dpvod = $values[4];

                $sql  .= "('$noticeId', '$dptype', '$dpdes', '$dpta', '$dpda','$dpvod')";
                if (($x + 1) != $len) {
                    $sql .= ", ";
                }
            }
            // echo $sql;
            // exit();
            if ($this->connection->query($sql)) {
                // echo json_encode(array("code" => $errorCode['success']));
            } else {
                echo json_encode(array("code" => $errorCode['unknownErrorprop']));
            }
        }

        if (count($data['equipment']) > 0) {
            $sql = "INSERT INTO `propapp`(`propcomId`, `detype`, `deev`) VALUES ";
            $len = count($data['equipment']);
            for ($x = 0; $x < $len; $x++) {
                // $items = array_keys($data['heir'][$x]);
                $values = array_values($data['equipment'][$x]);
                $leny = count($data['equipment'][$x]);

                $detype = $values[0];
                $deev = $values[1];

                $sql  .= "('$noticeId', '$detype', '$deev')";
                if (($x + 1) != $len) {
                    $sql .= ", ";
                }
            }
            // echo $sql;
            // exit();
            if ($this->connection->query($sql)) {
                // echo json_encode(array("code" => $errorCode['success']));
            } else {
                echo json_encode(array("code" => $errorCode['unknownErrorEquip']));
            }
        }

        if (count($data['service']) > 0) {
            $sql = "INSERT INTO `propservice`(`propcomId`, `dstype`, `dsev`) VALUES ";
            $len = count($data['service']);
            for ($x = 0; $x < $len; $x++) {
                // $items = array_keys($data['heir'][$x]);
                $values = array_values($data['service'][$x]);
                $leny = count($data['service'][$x]);

                $dstype = $values[0];
                $dsev = $values[1];

                $sql  .= "('$noticeId', '$dstype', '$dsev')";
                if (($x + 1) != $len) {
                    $sql .= ", ";
                }
            }
            // echo $sql;
            // exit();
            if ($this->connection->query($sql)) {
                // echo json_encode(array("code" => $errorCode['success']));
            } else {
                echo json_encode(array("code" => $errorCode['unknownErrorService']));
            }
        }
        echo json_encode(array("code" => $errorCode['success']));
    }

    public function getCompensations(array $data)
    {
        $uid = $data['userId'];
        $sql = "(
            SELECT
                death.deathId AS reportId,
                death.aname AS aname,
                death.timestamp,
                death.dvapproved,
                death.disapproved,
                death.dmcapproved,
                death.collected,
                death.disaster,
                'Death' AS report
            FROM
                deathcompensation death,
                gndivision
            WHERE
                gndivision.gramaNiladariID = " . $uid . " AND gndivision.gndvId = death.gndvId
        )
        UNION
            (
            SELECT
                f.propcomId AS reportId,
                f.aname AS aname,
                f.timestamp,
                f.dvapproved,
                f.disapproved,
                f.dmcapproved,
                f.collected,
                f.disaster,
                'Property' AS report
            FROM
                propertycompensation f,
                gndivision
            WHERE
                gndivision.gramaNiladariID = " . $uid . " AND gndivision.gndvId = f.gndvid
        )Order by timestamp DESC;";
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
                *
            FROM
            propertycompensation initial,
                gndivision,
                gramaniladari,district,division
            WHERE
                gndivision.gramaNiladariID = " . $uid . " AND gndivision.gndvId = initial.gndvId AND initial.propcomId=" . $initialId . " AND gramaniladari.gramaNiladariID=" . $uid . " AND gndivision.dvId=division.dvId AND division.dsId = district.dsId";
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
                *
            FROM
            deathcompensation initial,
                gndivision,
                gramaniladari,district,division
            WHERE
                gndivision.gramaNiladariID = " . $uid . " AND gndivision.gndvId = initial.gndvId AND initial.deathId =" . $initialId . " AND gramaniladari.gramaNiladariID=" . $uid . " AND gndivision.dvId=division.dvId AND division.dsId = district.dsId";
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
        
            gndivision,
            gramaniladari,district,division
        WHERE
            gndivision.gramaNiladariID = " . $uid . " AND gramaniladari.gramaNiladariID=" . $uid . " AND gndivision.dvId=division.dvId AND division.dsId = district.dsId";
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
        gndivision,division,district
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
        
            gndivision,
            gramaniladari,district,division
        WHERE
            gndivision.gramaNiladariID = " . $uid . " AND gramaniladari.gramaNiladariID=" . $uid . " AND gndivision.dvId=division.dvId AND division.dsId = district.dsId";
        $excute = $this->connection->query($sql);
        $r = $excute->fetch_assoc();
        $results['main'] = $r;


        $sql = "(
            SELECT
                death.deathId AS reportId,
                death.aname AS aname,
                death.timestamp,
                death.dvapproved,
                death.disapproved,
                death.dmcapproved,
                death.collected,
                death.disaster,
                'Death' AS report
            FROM
                deathcompensation death,
                gndivision
            WHERE
                gndivision.gramaNiladariID = " . $uid . " AND gndivision.gndvId = death.gndvId AND death.dvapproved='a'
        )
        UNION
            (
            SELECT
                f.propcomId AS reportId,
                f.aname AS aname,
                f.timestamp,
                f.dvapproved,
                f.disapproved,
                f.dmcapproved,
                f.collected,
                f.disaster,
                'Property' AS report
            FROM
                propertycompensation f,
                gndivision
            WHERE
                gndivision.gramaNiladariID = " . $uid . " AND gndivision.gndvId = f.gndvid AND f.dvapproved='a'
        );";
        $excute = $this->connection->query($sql);
        // $results = array();
        while ($r = $excute->fetch_assoc()) {
            $resultsreports[] = $r;
        }
        $results['reports'] = $resultsreports;
        $json = json_encode($results);
        echo $json;
    }


    public function getResidentAllReports(array $data)
    {
        $uid = $data['userId'];
        $results = array();
        $resultsreports = array();
        $sql = "
        SELECT
            *
        FROM
        
            gndivision,
            gramaniladari,district,division
        WHERE
            gndivision.gramaNiladariID = " . $uid . " AND gramaniladari.gramaNiladariID=" . $uid . " AND gndivision.dvId=division.dvId AND division.dsId = district.dsId";
        $excute = $this->connection->query($sql);
        $r = $excute->fetch_assoc();
        $results['main'] = $r;

        $sql = "SELECT * FROM `gndivision` WHERE `gramaNiladariID` =" . $uid;
        $excute = $this->connection->query($sql);
        $r = $excute->fetch_assoc();
        $sql = "SELECT r.* FROM resident r WHERE r.gndvId =" . $r['gndvId'];
        $excute = $this->connection->query($sql);

        while ($r = $excute->fetch_assoc()) {
            $resultsreports[] = $r;
        }
        $results['reports'] = $resultsreports;
        $json = json_encode($results);
        echo $json;
    }
}
