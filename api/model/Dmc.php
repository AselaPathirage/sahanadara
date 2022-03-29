<?php
class Dmc  extends Employee
{
    use Viewer;
    use Alerter;
    public function __construct($con)
    {
        parent::__construct($con);
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
                'Death' AS report,
                g.gnDvName,d.dvName,dis.dsName
            FROM
                deathcompensation death,
                gndivision g,division d, district dis
            WHERE
                g.gndvId = death.gndvId AND g.dvId = d.dvId AND d.dsId = dis.dsId AND death.disapproved='a'
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
                'Property' AS report,
                g.gnDvName,d.dvName,dis.dsName
            FROM
                propertycompensation f,
                gndivision g,division d, district dis
            WHERE
            g.gndvId = f.gndvId AND g.dvId = d.dvId AND d.dsId = dis.dsId AND f.disapproved='a' AND f.totcomp>25000
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


    public function getSafeHouseReport(array $data){
        global $errorCode;
        if(count($data['receivedParams'])==3){
            $dsId=$data['receivedParams'][0];
            $dvId=$data['receivedParams'][1];
            $gndvId=$data['receivedParams'][2];
            $sql="SELECT  safehouse.*,safehousecontact.safeHouseTelno,district.dsId,district.dsName,division.dvId,division.dvName,gndivision.gndvId,gndivision.gnDvName  FROM safehouse,district,division,gndivision,safehousecontact WHERE safehouse.safeHouseID=safehousecontact.safeHouseID AND district.dsId=division.dsId AND division.dvId=gndivision.dvId AND gndivision.safeHouseID=safehouse.safeHouseID AND district.dsId=$dsId AND division.dvId=$dvId AND gndivision.gndvId=$gndvId";
        }else if(count($data['receivedParams'])==2){
            $dsId=$data['receivedParams'][0];
            $dvId=$data['receivedParams'][1];
            $sql="SELECT  safehouse.*,safehousecontact.safeHouseTelno,district.dsId,district.dsName,division.dvId,division.dvName,gndivision.gndvId,gndivision.gnDvName  FROM safehouse,district,division,gndivision,safehousecontact WHERE safehouse.safeHouseID=safehousecontact.safeHouseID AND district.dsId=division.dsId AND division.dvId=gndivision.dvId AND gndivision.safeHouseID=safehouse.safeHouseID AND district.dsId=$dsId AND division.dvId=$dvId";
        }else if(count($data['receivedParams'])==1){
            $dsId=$data['receivedParams'][0];
            $sql="SELECT  safehouse.*,safehousecontact.safeHouseTelno,district.dsId,district.dsName,division.dvId,division.dvName,gndivision.gndvId,gndivision.gnDvName  FROM safehouse,district,division,gndivision,safehousecontact WHERE safehouse.safeHouseID=safehousecontact.safeHouseID AND district.dsId=division.dsId AND division.dvId=gndivision.dvId AND gndivision.safeHouseID=safehouse.safeHouseID AND district.dsId=$dsId";
        }else{
            $sql="SELECT  safehouse.*,safehousecontact.safeHouseTelno,district.dsId,district.dsName,division.dvId,division.dvName,gndivision.gndvId,gndivision.gnDvName  FROM safehouse,district,division,gndivision,safehousecontact WHERE safehouse.safeHouseID=safehousecontact.safeHouseID AND district.dsId=division.dsId AND division.dvId=gndivision.dvId AND gndivision.safeHouseID=safehouse.safeHouseID";
        }
        $excute = $this->connection->query($sql);
        $results = array();
        while($r = $excute-> fetch_assoc()) {
            $r['safeHouseID'] = SafeHouse::getSafeHouseCode($r['safeHouseID']);
            $results[] = $r;
        }
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
                $sql = "UPDATE `propertycompensation` SET `dmcapproved`='$dmcapproved', `dmcremarks`='$dmcremarks' WHERE `propcomId`='$reportId'";
            } else {
                $sql = "UPDATE `deathcompensation` SET `dmcapproved`='$dmcapproved', `dmcremarks`='$dmcremarks' WHERE `deathId`='$reportId'";
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

        $reportId = $data['reportId'];
        // $residentId = $data['receivedParams'][0];
        if (!empty($reportId)) {

            $sql = "UPDATE `dvfinalincident` SET `dmcapproved`='$dmcapproved', `dmcremarks`='$dmcremarks' WHERE `dvfinalincidentId`='$reportId'";

            $this->connection->query($sql);
            echo json_encode(array("code" => $errorCode['success']));
        } else {
            echo json_encode(array("code" => $errorCode['attributeMissing']));
            exit();
        }
    }


    // Index page counts
    public function getIncidentCount(array $data)
    {
        $uid = $data['userId'];
        $sql = "SELECT COUNT(dvfinalincident.dvfinalincidentId) AS c FROM dvfinalincident WHERE dvfinalincident.dmcapproved='p' AND dvfinalincident.disapproved='a'";
        $excute = $this->connection->query($sql);
        $r = $excute->fetch_assoc();
        $json = json_encode($r);
        echo $json;
    }
    public function getSafeCount(array $data)
    {
        $uid = $data['userId'];
        $sql = "SELECT COUNT(s.safeHouseID) AS c FROM safehouse s WHERE s.isUsing='y'";
        $excute = $this->connection->query($sql);
        $r = $excute->fetch_assoc();
        $json = json_encode($r);
        echo $json;
    }
    public function getCompCount(array $data)
    {
        $uid = $data['userId'];
        $sql = "SELECT SUM(tbl.ct) AS c FROM ( ( SELECT COUNT(p.propcomId) as ct FROM propertycompensation p WHERE p.dmcapproved = 'p' AND p.disapproved = 'a' AND p.dvapproved = 'a' ) UNION ( SELECT COUNT(d.deathId) as ct FROM deathcompensation d WHERE d.dmcapproved = 'p' AND d.disapproved = 'a' AND d.dvapproved = 'a' ) )tbl";
        $excute = $this->connection->query($sql);
        $r = $excute->fetch_assoc();
        $json = json_encode($r);
        echo $json;
    }



    // Safehouse page
    public function getSafeHouse(array $data)
    {
        $uid = $data['userId'];
        $sql = "SELECT s.*,g.gndvId,g.gnDvName,d.dvId,d.dvName,district.* FROM safehouse s JOIN gndivision g ON g.safeHouseID=s.safeHouseID JOIN division d ON d.dvId=g.dvId JOIN district ON district.dsId=d.dsId ORDER BY isUsing DESC";
        $excute = $this->connection->query($sql);
        $results = array();
        while ($r = $excute->fetch_assoc()) {
            $results[] = $r;
        }
        $json = json_encode($results);
        echo $json;
    }
    public function getSafeHouseById(array $data)
    {
        $uid = $data['userId'];
        $safeId = $data['receivedParams'][0];
        $sql = "SELECT s.*,g.gndvId,g.gnDvName,d.dvId,d.dvName,district.* FROM safehouse s JOIN gndivision g ON g.safeHouseID=s.safeHouseID JOIN division d ON d.dvId=g.dvId JOIN district ON district.dsId=d.dsId WHERE s.safeHouseID=" . $safeId;
        $excute = $this->connection->query($sql);
        $r = $excute->fetch_assoc();
        $json = json_encode($r);
        echo $json;
    }
    public function getSafehouseRecent(array $data)
    {
        $uid = $data['userId'];
        $safeId = $data['receivedParams'][0];
        $sql = "SELECT s.*,t.* FROM safehouse s JOIN safehousestatus t ON t.safehouseId=s.safeHouseID where s.safehouseId=" . $safeId . " ORDER BY t.createdDate DESC LIMIT 1";
        $excute = $this->connection->query($sql);
        $r = $excute->fetch_assoc();
        $json = json_encode($r);
        echo $json;
    }
    public function getResponsible(array $data)
    {
        $uid = $data['userId'];
        $safeId = $data['receivedParams'][0];
        $sql = "SELECT s.*,t.* FROM safehouse s JOIN responsibleperson t ON t.safeHouseID=s.safeHouseID WHERE s.safehouseId=" . $safeId . "";
        $excute = $this->connection->query($sql);
        $r = $excute->fetch_assoc();
        $json = json_encode($r);
        echo $json;
    }





    // Incident Reporting 
    public function getFinalReport(array $data)
    {
        global $errorCode;
        $uid = $data['userId'];
        if (count($data['receivedParams']) == 0) {
            $sql = "SELECT * FROM dvfinalincident WHERE dvfinalincident.disapproved='a';";
        } elseif (count($data['receivedParams']) == 1) {
            $recordId = $data['receivedParams'][0];
            $sql = "SELECT * FROM dvfinalincident WHERE dvfinalincident.dvfinalincidentId=$recordId;";
        } else {
            http_response_code(200);
            echo json_encode(array("code" => $errorCode['unableToHandle']));
            exit();
        }
        $excute = $this->connection->query($sql);
        $results = array();
        while ($r = $excute->fetch_assoc()) {
            $recordId = $r['dvfinalincidentId'];
            $sql = "SELECT * FROM dvfinalimpact WHERE dvfinalimpact.dvfinalincidentId=$recordId";
            $excute1 = $this->connection->query($sql);
            $temp1 = array();
            while ($p = $excute1->fetch_assoc()) {
                $temp1[] = $p;
            }
            $r['impact'] = $temp1;
            $temp1 = array();
            $sql = "SELECT * FROM dvfinalrelief WHERE dvfinalrelief.dvfinalincidentId=$recordId";
            $excute1 = $this->connection->query($sql);
            $temp1 = array();
            while ($p = $excute1->fetch_assoc()) {
                $temp1[] = $p;
            }
            $r['relief'] = $temp1;
            $temp1 = array();
            $sql = "SELECT * FROM dvfinalsafehouse WHERE dvfinalsafehouse.dvfinalincidentId=$recordId";
            $excute1 = $this->connection->query($sql);
            $temp1 = array();
            while ($p = $excute1->fetch_assoc()) {
                $temp1[] = $p;
            }
            $r['safehouse'] = $temp1;
            $temp1 = array();
            $sql = "SELECT * FROM dvfinaldamage WHERE dvfinaldamage.dvfinalincidentId=$recordId";
            $excute1 = $this->connection->query($sql);
            $temp1 = array();
            while ($p = $excute1->fetch_assoc()) {
                $temp1[] = $p;
            }
            $r['damage'] = $temp1;
            $results[] = $r;
        }
        $json = json_encode($results);
        echo $json;
    }

    public function divisionbyid(array $data)
    {
        global $errorCode;
        if (count($data['receivedParams']) == 1) {
            $recordId = $data['receivedParams'][0];
            $sql = "SELECT * FROM division WHERE division.dvId=$recordId;";
            $excute = $this->connection->query($sql);
            $r = $excute->fetch_assoc();
            $json = json_encode($r);
            echo $json;
        } else {
            http_response_code(200);
            echo json_encode(array("code" => $errorCode['unableToHandle']));
            exit();
        }
    }
    public function districtbydvid(array $data)
    {
        global $errorCode;
        if (count($data['receivedParams']) == 1) {
            $recordId = $data['receivedParams'][0];
            $sql = "SELECT district.dsName FROM division,district WHERE district.dsId=division.dsId AND division.dvId=$recordId;";
            $excute = $this->connection->query($sql);
            $r = $excute->fetch_assoc();
            $json = json_encode($r);
            echo $json;
        } else {
            http_response_code(200);
            echo json_encode(array("code" => $errorCode['unableToHandle']));
            exit();
        }
    }
    public function getgnbyid(array $data)
    {
        global $errorCode;
        if (count($data['receivedParams']) == 1) {
            $recordId = $data['receivedParams'][0];
            $sql = "SELECT gndivision.gnDvName FROM gndivision WHERE gndivision.gndvId=$recordId;";
            $excute = $this->connection->query($sql);
            $r = $excute->fetch_assoc();
            $json = json_encode($r);
            echo $json;
        } else {
            http_response_code(200);
            echo json_encode(array("code" => $errorCode['unableToHandle']));
            exit();
        }
    }
}
