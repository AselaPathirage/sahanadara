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
    }
    public function viewNotice(){
        if($this->innitiation){
            //return translated  notice
        }else{
            //return original  notice
        }
        // $result = $this->translator->translate('ආයුබෝවන්', [
        //     'target' => 'ta'
        // ]);
        
        // echo $result['text'] . "\n";
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
        $sql = "(SELECT fundraising.*, SUM(fundraisingrecords.amount) AS currentAmout FROM fundraising,fundraisingrecords
                WHERE fundraisingrecords.recordId=fundraising.recordId GROUP BY fundraising.recordId)
                UNION
                (SELECT fundraising.*, 0 AS currentAmount FROM fundraising WHERE fundraising.recordId NOT IN (SELECT DISTINCT fundraisingrecords.recordId FROM fundraisingrecords))";
        $excute = $this->connection->query($sql);
        $results = array();
        // $r = $excute->fetch_assoc();
        while ($r = $excute->fetch_assoc()) {
            $results[] = $r;
        }
        $json = json_encode($results);
        echo $json;
    }
}