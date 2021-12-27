<?php
trait Viewer{
    public function getSafeHouseAll(array $data){
        global $errorCode;
        $sql = "SELECT d.dsId,d.dsName FROM district d WHERE d.dsId IN (SELECT DISTINCT dv.dsId FROM division dv)";
        $excute = $this->connection->query($sql);
        $results = array();
        while($r = $excute-> fetch_assoc()) {
            $temp = array('id'=> $r['dsId'], 'name'=>$r['dsName'], 'division'=>array());
            $sql = "SELECT dv.dvId,dv.dvName FROM division dv WHERE dv.dvId IN (SELECT DISTINCT gn.dvId FROM gndivision gn WHERE safeHouseID IS NOT NULL) AND dv.dsId=".$r['dsId'];
            $divisionQuery = $this->connection->query($sql);
            while($p = $divisionQuery-> fetch_assoc()) {
                $temp2= array('id'=> $p['dvId'], 'name'=>$p['dvName'], 'gnArea'=>array());
                $sql = "SELECT gn.gndvId,gn.gnDvName FROM gndivision gn WHERE gn.gndvId IN (SELECT DISTINCT gn.gndvId FROM gndivision gn WHERE safeHouseID IS NOT NULL)  AND gn.dvId=".$p['dvId'];
                $gnQuery = $this->connection->query($sql);
                while($q = $gnQuery-> fetch_assoc()) {
                    $temp3 = array('id'=>$q['gndvId'], 'name'=>$q['gnDvName'], 'safeHouse' => array());
                    $sql = "SELECT safehouse.safeHouseID,safehouse.safeHouseName,safehouse.isUsing,safehouse.safeHouseAddress FROM safehouse,gndivision WHERE safehouse.safeHouseId = gndivision.safeHouseID AND gndivision.gndvId =".$q['gndvId'];
                    $safeHouseQuery = $this->connection->query($sql);
                    while($s = $safeHouseQuery-> fetch_assoc()) {
                        $safeHouseId = SafeHouse::getItemCode($s['safeHouseID']);
                        if($s['isUsing'] == 'n'){
                            $active = "No";
                            $temp4 = array(
                                'id' => $safeHouseId,
                                'name' => $s["safeHouseName"],
                                'address' => $s["safeHouseAddress"],
                                'contact' => array(),
                                'active' => $active,
                            );
                        }else{
                            $active = "Yes";
                            $sql = "SELECT adultMale,adultFemale,Children,disabledPerson FROM safehousestatus WHERE safehouseId =".$s['safeHouseID']." ORDER BY createdDate DESC LIMIT 1;";
                            $temp5 = $this->connection->query($sql);
                            if($temp5->num_rows==0){
                                $temp5 = array('adultMale'=>"Data not available",'adultFemale'=>"Data not available",'Children'=>"Data not available",'disabledPerson'=>"Data not available");
                            }else{
                                $temp5 = $temp5-> fetch_assoc();
                            }
                            $temp4 = array(
                                'id' => $safeHouseId,
                                'name' => $s["safeHouseName"],
                                'address' => $s["safeHouseAddress"],
                                'contact' => array(),
                                'active' => $active,
                                'males'=> $temp5['adultMale'],
                                'females' => $temp5['adultFemale'],
                                'children' => $temp5['Children'],
                                'disabledPerson' => $temp5['disabledPerson']
                            );
                        }
                        $sql = "SELECT safeHouseTelno FROM safehousecontact WHERE safeHouseID=".$s['safeHouseID'];
                        $contactQuery = $this->connection->query($sql);
                        while($a = $contactQuery-> fetch_assoc()) {
                            array_push($temp4['contact'],$a['safeHouseTelno']);
                        }
                        array_push($temp3['safeHouse'],$temp4);
                    }
                    array_push($temp2['gnArea'],$temp3);
                }
                array_push($temp['division'],$temp2);
            }
            array_push($results,$temp);
        }
        $json = json_encode($results);
        echo $json;
    }
}