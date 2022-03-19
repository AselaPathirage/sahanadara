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
        $username = md5($data['nic']);
        $password = md5($data['password']);
        $sql = "SELECT * FROM login l WHERE l.nid ='$username' AND l.empPassword ='$password'";
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
            $sql = "UPDATE `gramaniladari` SET `empAddress`='$address', `empEmail`='$email',`empTele`='$phone' WHERE `gramaNiladariID`='$uid' ";
            $sql2 = "UPDATE `gndivision` SET `officeAddress`='$ofaddress', `officeTele`='$ofphone' WHERE `gramaNiladariID`='$uid' ";
            $this->connection->query($sql);
            $this->connection->query($sql2);
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
        "SELECT * 
        FROM gramaniladari g 
        JOIN gndivision d 
        ON g.gramaNiladariID=" . $uid . " AND d.gramaNiladariID=1 
        JOIN division s ON d.dvId=s.dvId 
        JOIN district t ON t.dsId=s.dsId";
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
}
