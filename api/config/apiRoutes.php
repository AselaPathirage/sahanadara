<?php
/*
GET - request data from api
POST - add data
PUT - update data
DELETE - delete
*/

Route::GET("unit", array("InventoryManager@getUnit"));
Route::GET("item", array("InventoryManager@getItem"));
Route::GET("donation", array("Home@viewDonations"));
Route::GET("user", array("Admin@searchUser"));
Route::GET("district", array("Admin@getDistrict"));
Route::GET("area", array("Admin@DBtoJson"));
Route::GET("division", array("Admin@getDivision"));
Route::GET("GnDivision", array("Admin@getGnDivision", "DisasterOfficer@getGNDivision"));
Route::GET("safehouse", array("DisasterOfficer@viewSafehouse"));
Route::POST("login", array("Employee@login"));
Route::POST("resetPassword", array("Employee@resetPassword"));
Route::POST("item", array("InventoryManager@addItem"));
Route::POST("user", array("Admin@register", "DivisionalSecretariat@register", "DisasterOfficer@register"));
Route::POST("renew", array("Employee@renew"));
Route::POST("rewoke", array("Employee@rewoke"));
Route::POST("safehouse", array("DisasterOfficer@addSafehouse"));

// Grama Niladari
Route::GET("residents", array("GramaNiladari@getResident"));
Route::POST("residents", array("GramaNiladari@addResident"));
