<?php
class GramaNiladari extends ResponsiblePerson
{
    use Alerter;
    public function __construct($con)
    {
        parent::__construct($con);
    }
    public function addResident(array $data)
    {
        global $errorCode;
        $name = $data['name'];
        $nic = $data['nic'];
        $phone = $data['phone'];
        $address = $data['address'];
        $gnid = $data['gnid'];
        $sql = "SELECT * FROM `gndivision` WHERE `gramaNiladariID` =" . $gnid;
        $excute = $this->connection->query($sql);
        $r = $excute->fetch_assoc();
        $sql = "INSERT INTO resident (residentName, residentTelNo,residentAddress,gndvId,residentNIC ) VALUES ('$name', '$phone','$address'," . $r['gndvId'] . ", '$nic');";
        $this->connection->query($sql);
        echo json_encode("{'code':" . $errorCode['success'] . "}");
    }
    public function getResident(array $data)
    {
        $gnid = $data['gnid'];
        $sql = "SELECT * FROM `gndivision` WHERE `gramaNiladariID` =" . $gnid;
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
}
