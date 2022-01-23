<?php
class ResponsiblePerson  extends Employee{
    protected $connection;
    public function __construct($con){
        parent::__construct($con);
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
    public function getStatsFiltered($data){
        global $errorCode;
        $userId = $data['userId'];
        if(count($data['receivedParams']) > 0){
            $filter = $data['receivedParams'][0];
            if(strtolower($filter)=="safehouse"){
                $sql = "SELECT s.safeHouseID, s.safeHouseName FROM safehouse s, responsibleperson r WHERE r.responsiblePersonID = $userId AND s.safeHouseID = r.safeHouseID";
            }elseif(strtolower($filter)=="age"){
                $sql = "SELECT s.days FROM safehouse s, responsibleperson r WHERE r.responsiblePersonID = $userId AND s.safeHouseID = r.safeHouseID";
            }elseif(strtolower($filter)=="count"){
                $sql = "SELECT st.adultMale + st.adultFemale + st.adultFemale + st.children + st.disabledPerson AS count FROM safehouse s, responsibleperson r, safehousestatus st WHERE r.responsiblePersonID = $userId AND s.safeHouseID = r.safeHouseID AND s.safeHouseID = st.safehouseId ORDER BY st.r_id DESC LIMIT 1";
            }else{
                http_response_code(200);                       
                echo json_encode(array("code"=>$errorCode['unableToHandle']));
                exit();
            }
            http_response_code(200);
            $excute = $this->connection->query($sql);
            $results = $excute-> fetch_assoc();
            $json = json_encode($results);
            echo $json;
        }else{
            http_response_code(200);                       
            echo json_encode(array("code"=>$errorCode['attributeMissing']));
            exit();
        }
    }
    public function getStats($data){
        global $errorCode;
        $userId = $data['userId'];
        $output=array();
        $sql = "SELECT s.safeHouseID, s.safeHouseName FROM safehouse s, responsibleperson r WHERE r.responsiblePersonID = $userId AND s.safeHouseID = r.safeHouseID";
        $excute = $this->connection->query($sql);
        $results = $excute-> fetch_assoc();
        $output['id'] = $results['safeHouseID'];
        $output['name'] = $results['safeHouseName'];
        $sql = "SELECT s.days FROM safehouse s, responsibleperson r WHERE r.responsiblePersonID = $userId AND s.safeHouseID = r.safeHouseID";
        $excute = $this->connection->query($sql);
        $results = $excute-> fetch_assoc();
        $output['days'] = $results['days'];
        $sql = "SELECT st.adultMale + st.adultFemale + st.adultFemale + st.children + st.disabledPerson AS count FROM safehouse s, responsibleperson r, safehousestatus st WHERE r.responsiblePersonID = $userId AND s.safeHouseID = r.safeHouseID AND s.safeHouseID = st.safehouseId ORDER BY st.r_id DESC LIMIT 1";
        $excute = $this->connection->query($sql);
        $results = $excute-> fetch_assoc();
        $output['count'] = $results['count'];
        http_response_code(200);                       
        $json = json_encode($output);
        echo $json;
    }
}