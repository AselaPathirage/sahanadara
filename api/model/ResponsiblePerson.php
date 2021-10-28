<?php
class ResponsiblePerson  extends Employee{
    protected $connection;
    public function __construct($con){
        parent::__construct($con);
    }  
}