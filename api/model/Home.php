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
    }
    public function viewDonations(){
        $sql = "SELECT * FROM `item`";
        $excute = $this->connection->query($sql);
        $results = array();
        while($r = $excute-> fetch_assoc()) {
            $results[] = $r;
        }
        $json = json_encode($results);
        echo $json;
    }
    public function viewFundraises(){
        $sql = "SELECT * FROM `staff`";
        $excute = $this->connection->query($sql);
        $results = array();
        while($r = $excute-> fetch_assoc()) {
            $results[] = $r;
        }
        $json = json_encode($results);
        echo $json;    
    }
}