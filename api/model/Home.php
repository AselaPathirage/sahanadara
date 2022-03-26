<?php
use Google\Cloud\Translate\V2\TranslateClient;
class Home{
    private $connection;
    private $translator;
    private $innitiation;

    public function __construct($con){
        $this->connection = $con;
        try {
            $this->translator = new TranslateClient([
                                    'key' => TRANSLATOR_KEY
                                ]);
            $this->innitiation = true;
        }catch(Exception $e) {
            $this->innitiation = false;
        }
    }
    private function getLanCode($text){
        $result = $this->translator->detectLanguage($text);
        return $result;
    }
    private function translate($text,$lanCode){
        //lan codes -> sinhala:si ,english:en ,tamil:ta
        $result = $this->translator->translate($text, [
            'target' => $lanCode
        ]);
        return $result;
    }
    public function getNotice(array $data){
        global  $errorCode;
        if(count($data['receivedParams'])==1){
            if(! $this->innitiation){
                http_response_code(200);  
                echo json_encode(array("code"=>$errorCode['translatorError']));
                exit();
            }
            $lanCode=strtolower($data['receivedParams'][0]);
            if(!($lanCode=='en' or $lanCode=='ta' or $lanCode=='si')){
                http_response_code(200);  
                echo json_encode(array("code"=>$errorCode['wrongLanguageCode']));
                exit();
            }
            $sql="SELECT donationreqnotice.recordId, safehouse.safeHouseName, safehouse.safeHouseAddress,safehousecontact.safeHouseTelno ,donationreqnotice.title, donationreqnotice.numOfFamilies, donationreqnotice.numOfPeople, donationreqnotice.createdDate, donationreqnotice.note FROM donationreqnotice,safehouse,safehousecontact WHERE safehouse.safeHouseID=donationreqnotice.safehouseId AND safehouse.safeHouseID=safehousecontact.safeHouseID AND donationreqnotice.appovalStatus='a' ORDER BY donationreqnotice.createdDate;";
            $excute = $this->connection->query($sql);
            $results = array();
            while($r = $excute-> fetch_assoc()) {
                $recordId=$r['recordId'];
                $r['recordId']=Notice::getNoticeCode($recordId);
                if($lanCode!='en'){
                    $title=$r['title'];
                    $result=$this->translate($title,$lanCode); //print_r($result);
                    $r['title']= $result['text'];
                    $note=$this->translate($r['note'],$lanCode);//print_r($note);
                    $r['note']= $note['text'];
                    $safeHouseName=$this->translate($r['safeHouseName'],$lanCode);//print_r($note);
                    $r['safeHouseName']= $safeHouseName['text'];
                    $safeHouseAddress=$this->translate($r['safeHouseAddress'],$lanCode);//print_r($note);
                    $r['safeHouseAddress']= $safeHouseAddress['text'];
                }
                $sql="SELECT noticeitem.itemName,noticeitem.quantitity,unit.unitName AS unit FROM noticeitem,item,unit WHERE noticeitem.noticeId=$recordId AND unit.unitId=item.unitType AND item.itemName LIKE noticeitem.itemName;";
                $r['item']=array();
                $itemQuey=$this->connection->query($sql);
                while($p = $itemQuey-> fetch_assoc()) {
                    if($lanCode!='en'){
                        $itemName=$this->translate($p['itemName'],$lanCode);
                        $p['itemName']=$itemName['text'];
                    }
                    $r['item'][]=$p;
                }
                $results[] =$r;
            }
            $json = json_encode($results,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
            echo $json;
        }else{
            http_response_code(200);  
            echo json_encode(array("code"=>$errorCode['attributeMissing']));
            exit();
        }
    }
    public function getLimitedNotice(array $data){
        global  $errorCode;
        if(count($data['receivedParams'])==3){
            if(! $this->innitiation){
                http_response_code(200);  
                echo json_encode(array("code"=>$errorCode['translatorError']));
                exit();
            }
            $lanCode=strtolower($data['receivedParams'][0]);
            if(!($lanCode=='en' or $lanCode=='ta' or $lanCode=='si')){
                http_response_code(200);  
                echo json_encode(array("code"=>$errorCode['wrongLanguageCode']));
                exit();
            }
            $limit=$data['receivedParams'][2];
            $sql="SELECT donationreqnotice.recordId, safehouse.safeHouseName, safehouse.safeHouseAddress,safehousecontact.safeHouseTelno ,donationreqnotice.title, donationreqnotice.numOfFamilies, donationreqnotice.numOfPeople, donationreqnotice.createdDate, donationreqnotice.note FROM donationreqnotice,safehouse,safehousecontact WHERE safehouse.safeHouseID=donationreqnotice.safehouseId AND safehouse.safeHouseID=safehousecontact.safeHouseID AND donationreqnotice.appovalStatus='a' ORDER BY donationreqnotice.createdDate LIMIT $limit;";
            $excute = $this->connection->query($sql);
            $results = array();
            while($r = $excute-> fetch_assoc()) {
                $recordId=$r['recordId'];
                $r['recordId']=Notice::getNoticeCode($recordId);
                if($lanCode!='en'){
                    $title=$r['title'];
                    $result=$this->translate($title,$lanCode); //print_r($result);
                    $r['title']= $result['text'];
                    $note=$this->translate($r['note'],$lanCode);//print_r($note);
                    $r['note']= $note['text'];
                    $safeHouseName=$this->translate($r['safeHouseName'],$lanCode);//print_r($note);
                    $r['safeHouseName']= $safeHouseName['text'];
                    $safeHouseAddress=$this->translate($r['safeHouseAddress'],$lanCode);//print_r($note);
                    $r['safeHouseAddress']= $safeHouseAddress['text'];
                }
                $sql="SELECT noticeitem.itemName,noticeitem.quantitity,unit.unitName AS unit FROM noticeitem,item,unit WHERE noticeitem.noticeId=$recordId AND unit.unitId=item.unitType AND item.itemName LIKE noticeitem.itemName;";
                $r['item']=array();
                $itemQuey=$this->connection->query($sql);
                while($p = $itemQuey-> fetch_assoc()) {
                    if($lanCode!='en'){
                        $itemName=$this->translate($p['itemName'],$lanCode);
                        $p['itemName']=$itemName['text'];
                    }
                    $r['item'][]=$p;
                }
                $results[] =$r;
            }
            $json = json_encode($results,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
            echo $json;
        }else{
            http_response_code(200);  
            echo json_encode(array("code"=>$errorCode['attributeMissing']));
            exit();
        }
    }
    public function getfundraisingNotice(array $data){
        global  $errorCode;
        if(count($data['receivedParams'])==1){
            if(! $this->innitiation){
                http_response_code(200);  
                echo json_encode(array("code"=>$errorCode['translatorError']));
                exit();
            }
            $lanCode=strtolower($data['receivedParams'][0]);
            if(!($lanCode=='en' or $lanCode=='ta' or $lanCode=='si')){
                http_response_code(200);  
                echo json_encode(array("code"=>$errorCode['wrongLanguageCode']));
                exit();
            }
            $sql="(SELECT fundraising.*, SUM(fundraisingrecords.amount) AS currentAmout FROM fundraising,fundraisingrecords
            WHERE fundraisingrecords.recordId=fundraising.recordId GROUP BY fundraising.recordId)
            UNION
            (SELECT fundraising.*, 0 AS currentAmount FROM fundraising WHERE fundraising.recordId NOT IN (SELECT DISTINCT fundraisingrecords.recordId FROM fundraisingrecords));";
            $excute = $this->connection->query($sql);
            $results = array();
            while($r = $excute-> fetch_assoc()) {
                $recordId=$r['recordId'];
                $r['recordId']=FundRaisingNotice::getNoticeCode($recordId);
                if($lanCode!='en'){
                    $title=$r['title'];
                    $result=$this->translate($title,$lanCode);
                    $r['title']= $result['text'];
                    $description=$this->translate($r['description'],$lanCode);
                    $r['description']= $description['text'];
                }
                $results[] =$r;
            }
            $json = json_encode($results,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
            echo $json;
        }else{
            http_response_code(200);  
            echo json_encode(array("code"=>$errorCode['attributeMissing']));
            exit();
        }
    }
    public function getLimitedfundraisingNotice(array $data){
        global  $errorCode;
        if(count($data['receivedParams'])==3){
            if(! $this->innitiation){
                http_response_code(200);  
                echo json_encode(array("code"=>$errorCode['translatorError']));
                exit();
            }
            $lanCode=strtolower($data['receivedParams'][0]);
            if(!($lanCode=='en' or $lanCode=='ta' or $lanCode=='si')){
                http_response_code(200);  
                echo json_encode(array("code"=>$errorCode['wrongLanguageCode']));
                exit();
            }
            $limit=$data['receivedParams'][2];
            $sql="(SELECT fundraising.*, SUM(fundraisingrecords.amount) AS currentAmout FROM fundraising,fundraisingrecords
            WHERE fundraisingrecords.recordId=fundraising.recordId GROUP BY fundraising.recordId)
            UNION
            (SELECT fundraising.*, 0 AS currentAmount FROM fundraising WHERE fundraising.recordId NOT IN (SELECT DISTINCT fundraisingrecords.recordId FROM fundraisingrecords)) LIMIT $limit;";
            $excute = $this->connection->query($sql);
            $results = array();
            while($r = $excute-> fetch_assoc()) {
                $recordId=$r['recordId'];
                $r['recordId']=FundRaisingNotice::getNoticeCode($recordId);
                if($lanCode!='en'){
                    $title=$r['title'];
                    $result=$this->translate($title,$lanCode);
                    $r['title']= $result['text'];
                    $description=$this->translate($r['description'],$lanCode);
                    $r['description']= $description['text'];
                }
                $results[] =$r;
            }
            $json = json_encode($results,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
            echo $json;
        }else{
            http_response_code(200);  
            echo json_encode(array("code"=>$errorCode['attributeMissing']));
            exit();
        }
    }
    public function viewfundraisingNotice(array $data){

    }
    public function viewNotice(){
        if($this->innitiation){
            //return translated  notice
        }else{
            //return original  notice
        }
        $result = $this->translator->translate('ආයුබෝවන්', [
            'target' => 'ta'
        ]);
        echo $result['text'] . "\n";
        //echo "uu";
    }
    public function creadits(){
        $array = array(
            "Team No"=>"IS14",
            "Project Name" =>"Sahanadara",
            "Team members" => array("Asela Pathirage", "Yohombu Dulana","Sanduni Rashmika","Naween Pasindu")
        );
        $json = json_encode($array);
        echo $json;
    }
    public function viewDonations(){

    }
    public function viewFundraises(){
 
    }
}