<?php
class Admin extends Employee{
    public function __construct($con){
        parent::__construct($con);
    }
    public function register(array $data){
        echo "efsdfsd";
    }
    public function searchUser(array $data){
        echo "searchUser";
    }
}