<?php
trait Noticer{
    public function addNotice(array $data){
        global $errorCode;
        if(isset($data['title']) && isset($data['numOfFamillies']) && isset($data['numOfPeople']) && isset($data['safeHouseId']) && isset($data['item'])){
            $title = $data['title'];
            $numOfFamillies = $data['numOfFamillies'];
            $numOfPeople = $data['numOfPeople'];
            $safeHouseId = $data['safeHouseId'];
            $description = "";
            if(isset($data['description'])){
                $description = $data['description'];
            }
            $sql = "INSERT INTO `donationreqnotice` (`safehouseId`, `title`, `numOfFamilies`, `numOfPeople`, `note`) VALUES ($safeHouseId, '$title', '$numOfFamillies', '$numOfPeople', '$description');";
            $this->connection->query($sql);
            $sql = "SELECT LAST_INSERT_ID();";
            $execute = $this->connection->query($sql);
            $r = $execute-> fetch_assoc();
            $noticeId = $r["LAST_INSERT_ID()"];
            $len = count($data['item']);
            $items = array_keys($data['item']);
            $values = array_values($data['item']);
            $sql ="INSERT INTO `noticeitem` (`noticeId`, `itemName`, `quantitity`) VALUES ";
            for ($x = 0; $x < $len; $x++) {
                $item = $items[$x];
                $value = $values[$x];
                $sql  .= "($noticeId, '$item', $value)";
                if(($x+1) != $len){
                    $sql .= ", ";
                }
            }
            $this->connection->query($sql);
            echo json_encode(array("code"=>$errorCode['success']));
            exit();
        }else{
            http_response_code(200);                       
            echo json_encode(array("code"=>$errorCode['attributeMissing']));
            exit();
        }
    }
    public function updateNotice(array $data){
        global $errorCode;
    }
    public function deleteNotice(array $data){
        global $errorCode;
        if(isset($data['id'])){
            $id = $data['id'];
            $sql = "DELETE FROM noticeitem WHERE noticeId = $id;DELETE FROM donationreqnotice WHERE recordId = $id;";
            $this->connection->query($sql);
            http_response_code(200); 
            echo json_encode(array("code"=>$errorCode['success']));
            exit();
        }else{
            http_response_code(200);                       
            echo json_encode(array("code"=>$errorCode['attributeMissing']));
            exit();
        }
    }
    public function viewNotice(array $data){
        global $errorCode;
        $userId = $data['userId'];
        $division = $this->getDivision()['id'];
        $sql = "SELECT n.* FROM donationreqnotice n,division d,gndivision g WHERE g.safeHouseID IN (SELECT safeHouseID FROM gndivision WHERE dvId = $division)";
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
    public function getItemFiltered($data){
        global $errorCode;
        if(count($data['receivedParams'])==1){
            $filter = $data['receivedParams'][0];
            if(strtolower($filter)=="id"){
                $sql = "SELECT itemId  FROM item ORDER BY itemId";
                $temp = "itemId";
            }elseif(strtolower($filter)=="value"){
                $sql = "SELECT itemName  FROM item ORDER BY itemName";
                $temp = "itemName";
            }else{
                http_response_code(200);                       
                echo json_encode(array("code"=>$errorCode['unableToHandle']));
                exit();
            }
            $excute = $this->connection->query($sql);
            $results = array();
            while($r = $excute-> fetch_assoc()) {
                $results[] = $r[$temp];
            }
            $json = json_encode($results);
            echo $json;
        }else{
            http_response_code(200);                       
            echo json_encode(array("code"=>$errorCode['attributeMissing']));
            exit();
        }
    }
    public function filterSafehouse($data){
        global $errorCode;
        $userId = $data['userId'];
        if(count($data['receivedParams'])==1){
            $filter = $data['receivedParams'][0];
            $division = $this->getDivision($userId)['id'];
            if(strtolower($filter)=="name"){
                $sql = "SELECT s.safeHouseID,s.safeHouseName  FROM safehouse s,gndivision g WHERE g.safeHouseID = s.safeHouseID AND g.dvId=".$division;
                $temp = "safeHouseName";
            }else{
                http_response_code(200);                       
                echo json_encode(array("code"=>$errorCode['unableToHandle']));
                exit();
            }
            $excute = $this->connection->query($sql);
            $results = array();
            while($r = $excute-> fetch_assoc()) {
                $results[] = $r;
            }
            $json = json_encode($results);
            echo $json;
        }else{
            http_response_code(200);                       
            echo json_encode(array("code"=>$errorCode['attributeMissing']));
            exit();
        }
    }
}