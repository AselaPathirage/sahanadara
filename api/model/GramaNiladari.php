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
            $sql = "DELETE `resident` WHERE residentId =$residentId ";
            $this->connection->query($sql);
            echo json_encode(array("code" => $errorCode['success']));
        } else {
            echo json_encode(array("code" => $errorCode['attributeMissing']));
            exit();
        }
    }
}
