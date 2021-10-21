<?php
class Admin extends Employee{
    public function __construct($con){
        parent::__construct($con);
    }
    public function register(array $data){
        echo "efsdfsd";
    }
    public function searchUser(array $data){
        $mail = new mail();
        $mail->emailBody("About your account","Dear Naween","use this item");
        $mail->sendMail("htnaweenpasindu@gmail.com","login credeantials");
    }
}