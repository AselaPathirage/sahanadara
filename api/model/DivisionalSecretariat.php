<?php
class DivisionalSecretariat extends Employee
{
    use Viewer;

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
            $inventory = $data['inventory'];

            $mail = new mail();
            $name = $data['firstname'] . " " . $data['lastname'];


            $sql0 = "SELECT empEmail FROM InventoryMgtOfficer WHERE empEmail = '" . $data['email'] . "'";
            $sql = "INSERT INTO InventoryMgtOfficer (empName,empAddress,empEmail,empTele,inventoryID) VALUES ('$name','" . $data['address'] . "','" . $data['email'] . "','" . $data['TP_number'] . "',$inventory);";

            $query = $this->connection->query($sql0);

            if ($query->num_rows == 0) {
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
            } else {
                echo json_encode(array("code" => $errorCode['emailAlreadyInUse']));
                exit();
            }
        } else {
            echo json_encode(array("code" => $errorCode['attributeMissing']));
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
        $sql = "SELECT inventorymgtofficer.* FROM inventorymgtofficer,inventory WHERE inventorymgtofficer.inventoryID = inventory.inventoryId AND  inventory.dvId =".$dvId;
        $excute = $this->connection->query($sql);
        $results = array();
        while($r = $excute-> fetch_assoc()) {
            $results[] = $r;
        }
        $json = json_encode($results);
        echo $json;
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
        //$sql = "SELECT * FROM gramaniladari g JOIN gndivision d ON g.gramaNiladariID=" . $uid . " AND d.gramaNiladariID=1 JOIN division s ON d.dvId=s.dvId JOIN district t ON t.dsId=s.dsId;";
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
    
}