<?php
/*
GET - request data from api
POST - add data
PUT - update data
DELETE - delete
*/

Route::GET("unit",array("InventoryManager@getUnit"));
Route::GET("item",array("InventoryManager@getItem"));
Route::GET("donation",array("Home@viewDonations"));
Route::POST("login",array("Employee@login"));
Route::POST("item",array("InventoryManager@addItem"));
Route::POST("register",array("Admin@register","DivisionalSecretariat@register","DisasterOfficer@register"));