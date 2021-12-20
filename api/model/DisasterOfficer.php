<?php
class DisasterOfficer extends Employee{
    use Viewer;
    use Alerter;
    use Noticer;

    public function __construct($con){
        parent::__construct($con);
    }

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
    public function getDistrict(){
        //return on function ekak
    }
    public function getDivision(){
        //return on function ekak
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