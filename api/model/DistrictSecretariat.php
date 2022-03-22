<?php
class DistrictSecretariat extends Employee
{
    public function __construct($con)
    {
        parent::__construct($con);
    }
    public function searchUser(array $data)
    {
        $roleTable = array(
            1 => array("tableName" => "gramaniladari", "primaryKey" => "gramaNiladariID"),
            2 => array("tableName" => "inventorymgtofficer", "primaryKey" => "inventoryMgtOfficerID"),
            3 => array("tableName" => "districtsecretariat", "primaryKey" => "districtSecretariatID"),
            4 => array("tableName" => "divisionalsecretariat", "primaryKey" => "divisionalSecretariatID"),
            5 => array("tableName" => "admin", "primaryKey" => "adminID"),
            6 => array("tableName" => "dismgtofficer", "primaryKey" => "disMgtOfficerID"),
            7 => array("tableName" => "dmc", "primaryKey" => "dmcID"),
            8 => array("tableName" => "responsibleperson", "primaryKey" => "responsiblePersonID")
        );
        if (count($data['receivedParams']) == 1) {
            $sql = "SELECT " . $roleTable[$data['receivedParams'][0]]['primaryKey'] . " AS empId, empName,empAddress,empEmail,empTele,roleName,roleId FROM " . $roleTable[$data['receivedParams'][0]]['tableName'] . ",role WHERE roleId=" . $data['receivedParams'][0];
        } elseif (count($data['receivedParams']) == 2) {
            $sql = "SELECT " . $roleTable[$data['receivedParams'][0]]['primaryKey'] . " AS empId, empName,empAddress,empEmail,empTele,roleName,roleId FROM " . $roleTable[$data['receivedParams'][0]]['tableName'] . ",role WHERE " . $roleTable[$data['receivedParams'][0]]['primaryKey'] . "=" . $data['receivedParams'][1] . " AND roleId=" . $data['receivedParams'][0];
        } else {
            $sql = "(SELECT gramaniladari." . $roleTable[1]['primaryKey'] . " as empId,empName,empAddress,empEmail,empTele,roleName,roleId,gndvId,division.dvId,district.dsId FROM gramaniladari,role,gndivision,division,district WHERE roleId = 1 AND gndivision.gramaNiladariID = gramaniladari.gramaNiladariID AND gndivision.dvId = division.dvId AND division.dsId = district.dsId)
                    UNION
                    (SELECT " . $roleTable[2]['primaryKey'] . " as empId,empName,empAddress,empEmail,empTele,roleName,roleId,NULL AS gndvId,division.dvId,district.dsId FROM inventorymgtofficer,inventory,role,gndivision,division,district WHERE roleId = 2 AND inventorymgtofficer.inventoryID = inventory.inventoryId AND inventory.dvId = division.dvId AND division.dsId = district.dsId AND gndivision.dvId = division.dvId GROUP BY district.dsId,division.dvId)
                    UNION
                    (SELECT " . $roleTable[3]['primaryKey'] . " as empId,empName,empAddress,empEmail,empTele,roleName,roleId,NULL AS gndvId,NULL AS dvId,district.dsId FROM districtsecretariat,role,district,districtsoffice WHERE roleId = 3 AND districtsecretariat.districtSecretariatID = districtsoffice.districtSecretariat AND districtsoffice.dsId = district.dsId)
                    UNION
                    (SELECT divisionalsecretariat." . $roleTable[4]['primaryKey'] . " as empId,empName,empAddress,empEmail,empTele,roleName,roleId,NULL as gndvId,division.dvId,district.dsId FROM divisionalsecretariat,role,division,district,divisionaloffice WHERE roleId = 4 AND divisionalsecretariat.divisionalSecretariatID = divisionaloffice.divisionalSecretariatID AND divisionaloffice.dvId = division.dvId AND division.dsId = district.dsId)
                    UNION
                    (SELECT " . $roleTable[5]['primaryKey'] . " as empId,empName,empAddress,empEmail,empTele,roleName,roleId,NULL as gndvId,NULL as dvId,NULL as dsId FROM admin,role WHERE roleId = 5)
                    UNION
                    (SELECT dismgtofficer." . $roleTable[6]['primaryKey'] . " as empId,empName,empAddress,empEmail,empTele,roleName,roleId,NULL as gndvId,division.dvId,district.dsId FROM dismgtofficer,role,division,district,divisionaloffice WHERE roleId = 6 AND dismgtofficer.disMgtOfficerID = divisionaloffice.disasterManager AND divisionaloffice.dvId = division.dvId AND division.dsId = district.dsId)
                    UNION
                    (SELECT " . $roleTable[7]['primaryKey'] . " as empId,empName,empAddress,empEmail,empTele,roleName,roleId,NULL as gndvId,NULL as dvId,NULL as dsId FROM dmc,role WHERE roleId = 7)
                    UNION
                    (SELECT responsibleperson." . $roleTable[8]['primaryKey'] . " as empId,empName,empAddress,empEmail,empTele,roleName,roleId,gndvId,division.dvId,district.dsId FROM responsibleperson,role,division,district,gndivision WHERE roleId = 8 AND responsibleperson.safeHouseID = gndivision.safeHouseID AND gndivision.dvId = division.dvId AND division.dsId = district.dsId)";
        }

        $excute = $this->connection->query($sql);
        $results = array();
        while ($r = $excute->fetch_assoc()) {
            $results[] = $r;
        }
        $json = json_encode($results);
        echo $json;
    }

    public function getProfileDetails(array $data)
    {
        $uid = $data['userId'];
        $sql = "SELECT * from districtsecretariat d JOIN districtsoffice o ON d.districtSecretariatID = o.districtSecretariat LEFT JOIN districtofficecontact c ON c.districtSOfficeID = o.districtSOfficeID WHERE d.districtSecretariatID = " . $uid;
        $excute = $this->connection->query($sql);
        while ($r = $excute->fetch_assoc()) {
            $results[] = $r;
        }
        $json = json_encode($results);
        echo $json;
    }

    public function updateProfileDetails(array $data)
    {
        global $errorCode;
        if (isset($data['roleId']) && isset($data['empId'])) {
            $name = $data['firstname'] . " " . $data['lastname'];
            $address = $data['address'];
            $email = $data['email'];
            $phone = $data['tpnumber'];
            $uid = $data['empId'];
            $officeaddress = $data['officeaddress'];
            $officetpnumber = $data['officetpnumber'];
            $officeId = $data['officeId'];
            $password = md5($data['updatepass']);
            $sql = "SELECT l.empId,r.roleId,l.keyAuth FROM login l, role r WHERE l.empPassword ='$password' AND l.roleId = '" . $data['roleId'] . "' AND  l.empId = '" . $data['empId'] . "'";
            $excute = $this->connection->query($sql);
            if ($excute->num_rows > 0) {
                $sql1 = "UPDATE `districtsecretariat` SET `empName`='$name', `empAddress`='$address', `empEmail`='$email',`empTele`='$phone' WHERE `districtSecretariatID`='$uid' ";
                $sql2 = "UPDATE `districtsoffice` SET `districtSOfficeAddress`='$officeaddress' WHERE `districtSecretariat`= '$uid'";
                $this->connection->query($sql1);
                $this->connection->query($sql2);
                $sql3 = "SELECT * FROM `districtofficecontact` WHERE `districtSOfficeID` = '$officeId'";
                $excute1 = $this->connection->query($sql3);
                if ($excute1->num_rows > 0) {
                    $sql4 = "UPDATE `districtofficecontact` SET `districtofficeTelno` = '$officetpnumber' WHERE `districtSOfficeID` = '$officeId'";
                    $this->connection->query($sql4);
                } else {
                    $sql4 = "INSERT INTO `districtofficecontact` (districtofficeTelno,districtSOfficeID) VALUES ('$officetpnumber','$officeId')";
                    $this->connection->query($sql4);
                }

                echo json_encode(array("code" => $errorCode['success']));
                exit();
            } else {
                echo json_encode(array("code" => $errorCode['userCreadentialWrong']));
                exit();
            }
        } else {
            echo json_encode(array("code" => $errorCode['attributeMissing']));
            exit();
        }
    }

    public function updatePassword(array $data)
    {
        global $errorCode;
        if (isset($data['roleId']) && isset($data['empId'])) {
            $newpass = md5($data['newpass']);
            $uid = $data['empId'];
            $password = md5($data['oldpass']);
            $sql = "SELECT l.empId,r.roleId,l.keyAuth FROM login l, role r WHERE l.empPassword ='$password' AND l.roleId = '" . $data['roleId'] . "' AND  l.empId = '" . $data['empId'] . "'";
            $excute = $this->connection->query($sql);
            if ($excute->num_rows > 0) {
                $sql1 = "UPDATE login SET empPassword='" . $newpass . "' WHERE empId=" . $data['empId'] . " AND roleId =" . $data['roleId'];
                $this->connection->query($sql1);
                echo json_encode(array("code" => $errorCode['success']));
                exit();
            } else {
                echo json_encode(array("code" => $errorCode['userCreadentialWrong']));
                exit();
            }
            echo json_encode(array("code" => $errorCode['success']));
            exit();
        } else {
            echo json_encode(array("code" => $errorCode['attributeMissing']));
            exit();
        }
    }

    public function getCompensations(array $data)
    {
        $uid = $data['userId'];
        $sql = "
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
                gndivision g,division d, district dis,districtsoffice diso
            WHERE
            g.gndvId = f.gndvId AND g.dvId = d.dvId AND diso.districtSecretariat=" . $uid . " AND diso.dsId=dis.dsId AND d.dsId = dis.dsId AND f.disapproved='a' AND f.totcomp<=10000 Order by timestamp DESC;";
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
}
