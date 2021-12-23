<?php
class SMS{
    private $contact = [];
    private $messege ="";
    private $connection;

    public function __construct($con){
        $this->connection = $con;
    }

    public function addContact(array $contact,$messege){
        $this->contact = $contact;
        $this->messege = $messege;
    }

    public function addMessege($messege){
        $this->messege = $messege;
    }

    public function balance(){
        $user = SENDER;
        $password = SMS_PASSWORD;
        $baseurl ="http://www.textit.biz/sendmsg";
        $url = "$baseurl/?id=$user&pw=$password";
        $ret = file($url);
        $res= explode(":",$ret[0]);
        $balance = trim($res[0]);
        return $balance;
    }

    public function sendAlert(){
        global $errorCode;
        foreach ($this->contact as  $receiver){
            if(SMS::send($receiver,$this->messege)){
                http_response_code(200);                       
                echo json_encode(array("code"=>$errorCode['success']));
                exit();
            }
            else{
                http_response_code(200);                       
                echo json_encode(array("code"=>$errorCode['smsSendFailed']));
                exit();
            }
        }
    }

    public static function send($receiver,$messege){
        global $errorCode;
        $user = SENDER;
        $password = SMS_PASSWORD;
        $text = urlencode($messege);
        $to = SMS::convertNumber($receiver);
        $baseurl ="http://www.textit.biz/sendmsg";
        $url = "$baseurl/?id=$user&pw=$password&to=$to&text=$text";
        $ret = file($url);
        $res= explode(":",$ret[0]);
        if (trim($res[0])=="OK")
        {
            return true;
        }
        else 
        {
            return false;
        }
    }

    public static function convertNumber($number){
        if(strlen($number)==9){
            $number = "0".$number;
        }
        $countryCode = '94'; 
        $internationalNumber = preg_replace('/^0/', $countryCode, $number);
        return $internationalNumber;
    }
}