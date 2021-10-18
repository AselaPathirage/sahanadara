<?php
/*
GET - request data from api
POST - add data
PUT - update data
DELETE - delete
*/
$apiRoutes = array(
    "unit" => array( "InventoryManager" => "unit"),
    "item" => array( "InventoryManager" => "item"),
    "login" => array( "Employee" => "login"),
    "register" => array( "Admin" => "register","DivisionalSecretariat" => "register", "DisasterOfficer" => "register"),
);