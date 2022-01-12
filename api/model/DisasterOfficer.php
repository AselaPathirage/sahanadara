<?php
class DisasterOfficer extends Employee{
    use Viewer;
    use Alerter;
    use Noticer;

    public function __construct($con){
        parent::__construct($con);
    }

    // Donation

    public function addDonation(array $data){
        global $errorCode;
        $recordId = $data['recordId'];
        $safehouseId = $data['safehouseId'];
        $title = $data['title'];
        $numOfFamilies = $data['numOfFamilies'];
        $numOfPeople = $data['numOfPeople'];
        $createdDate = $data['createdDate'];
        $note = $data['note'];
        $approvalStatus = $data['approvalStatus'];

        $sql = "SELECT * FROM ;
        $excute = $this->connection->query($sql);
        $r = $excute->fetch_assoc();
    
        if ($this->connection->query($sql)) {
            echo json_encode(array("code" => $errorCode['success']));
        } else {
            echo json_encode(array("code" => $errorCode['unknownError']));
        }
    }


    // Safehouse Details

    public function addSafehouse(array $data){
        global $errorCode;
        // print_r($data);exit;
        $safeHouseAddress = $data['safeHouseAddress'];
        $safeHouseName = $data['safeHouseName'];
        $safeHouseTelno = $data['safeHouseTelno'];
        $gndvId =$data['gnDiv'];
        $sql = "INSERT INTO `safehouse` (`safeHouseAddress`, `safeHouseName`) VALUES ('$safeHouseAddress', '$safeHouseName');";
        $this->connection->query($sql);
        $result = array();
        $sql = "SELECT LAST_INSERT_ID();";
        $execute = $this->connection->query($sql);
        $r = $execute-> fetch_assoc();
        $safeHouseID = $r["LAST_INSERT_ID()"];
        $sql = "INSERT INTO `safehousecontact` (`safeHouseID`, `safeHouseTelno`) VALUES ('$safeHouseID', '$safeHouseTelno');";
        $this->connection->query($sql);
        $sql = "UPDATE gndivision
        SET safeHouseID = $safeHouseID
        WHERE gndvId = $gndvId;";
        $this->connection->query($sql);
        echo json_encode(array("code"=>$errorCode['success']));
    }

    public function viewSafehouse(array $data){
        //$safeHouseID = $data['safeHouseID'];
        $uid = $data['userId'];
        if(count($data['receivedParams'])==1){
            $id = $data['receivedParams'][0];
            $sql = "SELECT s.*,t.*,g.gnDvName FROM safehousecontact t, safehouse  s,gndivision g, division d, divisionaloffice dv
            WHERE s.safeHouseId = t.safeHouseID AND g.	safeHouseID = s.safeHouseId AND g.dvId = d.dvId
            AND dv.dvId = d.dvId AND dv.disasterManager = $uid AND s.safeHouseId = $id";
        }else{
            $sql = "SELECT s.*,t.*,g.gnDvName FROM safehousecontact t, safehouse  s,gndivision g, division d, divisionaloffice dv
            WHERE s.safeHouseId = t.safeHouseID AND g.	safeHouseID = s.safeHouseId AND g.dvId = d.dvId
            AND dv.dvId = d.dvId AND dv.disasterManager = $uid";
        }
        $excute = $this->connection->query($sql);
        $results = array();
        while($r = $excute-> fetch_assoc()) {
            $results[] = $r;
        }
        $json = json_encode($results);
        echo $json;
    }

    public function updateSafehouse(array $data)
    {
        global $errorCode;
        if (count($data['receivedParams']) == 1) {
            $uid = $data['userId'];
            $safeHouseAddress = $data['upsafeHouseAddress'];
            $safeHouseName = $data['upsafeHouseName'];
            $safeHouseTelno = $data['upsafeHouseTelno'];
            $gndvId =$data['upgnDiv'];
            $safeHouseId = $data['receivedParams'][0];

            $sql = "UPDATE `safehouse` SET `safeHouseAddress`='$safeHouseAddress', `safeHouseName`='$safeHouseName' WHERE safeHouseId =$safeHouseId ";
            $this->connection->query($sql);
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
            $sql = "DELETE FROM `safehouse` WHERE safeHouseId =$safeHouseId";
            
            $this->connection->query($sql);
            echo json_encode(array("code" => $errorCode['success']));
        } else {
            echo json_encode(array("code" => $errorCode['attributeMissing']));
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

    public function getDistrict(){
        //return on function ekak
    //         $sql = "SELECT * FROM `unit` ORDER BY unitName";
    //     $excute = $this->connection->query($sql);
    //     $results = array();
    //     while($r = $excute-> fetch_assoc()) {
    //         $results[] = $r;
    //     }
    //     $json = json_encode($results);
    //     echo $json;
    // }
        
    }
    public function getDivision(){
        //return on function ekak
        //     $sql = "SELECT * FROM `unit` ORDER BY unitName";
        // $excute = $this->connection->query($sql);
        // $results = array();
        // while($r = $excute-> fetch_assoc()) {
        //     $results[] = $r;
        // }
        // $json = json_encode($results);
        // echo $json;
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
        
}