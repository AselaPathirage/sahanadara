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
}
