<?php
trait Viewer{
    public function getSafeHouse(array $data){
        global $errorCode;
        $uid = $data['userId'];
        if(count($data['receivedParams'])==2){
            $keyword = $data['receivedParams'][0];
            $id = $data['receivedParams'][1];
            $sql = "SELECT safehouse.safeHouseID,safehouse.safeHouseName,safehouse.isUsing,safehouse.safeHouseAddress,safehousecontact.safeHouseTelno,gndivision.gndvId,gndivision.gnDvName,division.dvId,division.dvName,district.dsId,district.dsName
                    FROM safehouse,gndivision,division,district,safehousecontact
                    WHERE safehouse.safeHouseID = gndivision.safeHouseID AND gndivision.dvId = division.dvId AND division.dsId = district.dsId AND safehousecontact.safeHouseID = safehouse.safeHouseID";
            if($keyword=="district"){
                $sql .= " AND district";
                if(!is_numeric($id)){
                    $sql .= ".dsName LIKE '%$id%'";
                }else{
                    $sql .= ".dsId = $id";
                }
            }else if($keyword=="division"){
                $sql .= " AND division";
                if(!is_numeric($id)){
                    $sql .= ".dvName LIKE '%$id%'";
                }else{
                    $sql .= ".dvId = $id";
                }
            }else{
                http_response_code(200);                       
                echo json_encode(array("code"=>$errorCode['unableToHandle']));
                exit();
            }
        }else if(count($data['receivedParams'])==1){
            $id = $data['receivedParams'][0];
            $sql = "SELECT safehouse.safeHouseID,safehouse.safeHouseName,safehouse.isUsing,safehouse.safeHouseAddress,safehousecontact.safeHouseTelno,gndivision.gndvId,gndivision.gnDvName,division.dvId,division.dvName,district.dsId,district.dsName
                    FROM safehouse,gndivision,division,district,safehousecontact
                    WHERE safehouse.safeHouseID = gndivision.safeHouseID AND gndivision.dvId = division.dvId AND division.dsId = district.dsId AND safehousecontact.safeHouseID = safehouse.safeHouseID AND safehouse.safeHouseID = $id";
        }else{
            $sql = "SELECT safehouse.safeHouseID,safehouse.safeHouseName,safehouse.isUsing,safehouse.safeHouseAddress,safehousecontact.safeHouseTelno,gndivision.gndvId,gndivision.gnDvName,division.dvId,division.dvName,district.dsId,district.dsName
                    FROM safehouse,gndivision,division,district,safehousecontact
                    WHERE safehouse.safeHouseID = gndivision.safeHouseID AND gndivision.dvId = division.dvId AND division.dsId = district.dsId AND safehousecontact.safeHouseID = safehouse.safeHouseID";
        }
        $excute = $this->connection->query($sql);
        $results = array("district"=>array());
        while($r = $excute-> fetch_assoc()) {
            if(!isset($results["district"][$r["dsName"]])) {
                $results["district"][$r["dsName"]]["id"] = $r["dsId"];
                $results["district"][$r["dsName"]]["division"] = array();
            }
            if(!isset($results["district"][$r["dsName"]]["division"][$r["dvName"]])) {
                $results["district"][$r["dsName"]]["division"][$r["dvName"]]['id'] = $r["dvId"];
                $results["district"][$r["dsName"]]["division"][$r["dvName"]]['gnArea'] = array();
            }
            if(!isset($results["district"][$r["dsName"]]["division"][$r["dvName"]]['gnArea'][$r["gnDvName"]])) {
                $results["district"][$r["dsName"]]["division"][$r["dvName"]]['gnArea'][$r["gnDvName"]] = array( 'gnId' => $r["gndvId"],
                                                                                                                'safeHouseId' => $r["safeHouseID"],
                                                                                                                'name' => $r["safeHouseName"],
                                                                                                                'address' => $r["safeHouseAddress"],
                                                                                                                'isusing' => $r["isUsing"],
                                                                                                                'contact' => array()
                );
                array_push($results["district"][$r["dsName"]]["division"][$r["dvName"]]['gnArea'][$r["gnDvName"]]['contact'],$r["safeHouseTelno"]);
            }else{
                array_push($results["district"][$r["dsName"]]["division"][$r["dvName"]]['gnArea'][$r["gnDvName"]]['contact'],$r["safeHouseTelno"]);
            }                                                                                                                
        }
        $json = json_encode($results);
        echo $json;
    }
}