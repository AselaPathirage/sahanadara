<?php
trait Noticer{
    public function addNotice(array $data){
        global $errorCode;
    }
    public function updateNotice(array $data){
        global $errorCode;
    }
    public function deleteNotice(array $data){
        global $errorCode;
        if(isset($data['id'])){
            $id = $data['id'];
            $sql = "DELETE FROM donationreqnotice WHERE recordId = $id;DELETE FROM noticeitem WHERE noticeId = $id;";
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
}