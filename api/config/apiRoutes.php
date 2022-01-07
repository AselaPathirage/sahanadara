<?php
/*
GET - request data from api
POST - add data
PUT - update data
DELETE - delete
*/


Route::GET("donation", array("Home@viewDonations"));
Route::GET("notice", array("Home@viewNotice"));
Route::GET("role", array("Employee@getRole"));
Route::GET("division", array("Admin@getDivision", "InventoryManager@getDvOfficeList"));
Route::GET("GnDivision", array("Admin@getGnDivision", "DisasterOfficer@getGNDivision", "InventoryManager@getGNDivision"));
Route::GET("item", array("InventoryManager@getItem", "ResponsiblePerson@getItem"));
Route::GET("safehouse", array("DisasterOfficer@viewSafehouse", "InventoryManager@getSafeHouseAll", "DivisionalSecretariat@getSafeHouseAll", "Dmc@getSafeHouseAll"));
Route::GET("district", array("Admin@getDistrict"));
Route::GET("user", array("InventoryManager@getMySelf", "Admin@searchUser")); //user/userId/required data
Route::GET("report", array("Employee@report"));
Route::GET("profile", array("GramaNiladari@getProfileDetails"));

Route::PUT("resetPassword", array("Employee@updatePassword"));
Route::PUT("profile", array("GramaNiladari@updateProfileDetails"));

Route::POST("login", array("Employee@login"));
Route::POST("resetPassword", array("Employee@resetPassword"));
Route::POST("renew", array("Employee@renew"));
Route::POST("rewoke", array("Employee@rewoke"));
Route::POST("user", array("Admin@register", "DivisionalSecretariat@register", "DisasterOfficer@register"));
Route::POST("notice", array("InventoryManager@addNotice"));

// Grama Niladari
Route::GET("residents", array("GramaNiladari@getResident"));
Route::GET("gnmsg", array("GramaNiladari@getMessages"));
Route::GET("gnalert", array("GramaNiladari@getAlerts"));
Route::GET("residentcount", array("GramaNiladari@getResidentCount"));
Route::POST("residents", array("GramaNiladari@addResident"));
Route::POST("gnmsg", array("GramaNiladari@sendMessages"));
Route::PUT("residents", array("GramaNiladari@updateResident"));
Route::DELETE("residents", array("GramaNiladari@deleteResident"));

// Disaster Mgt officer

Route::POST("safehouse", array("DisasterOfficer@addSafehouse"));

//Admin
Route::GET("area", array("Admin@DBtoJson"));

// Inventory Manager
Route::GET("unit", array("InventoryManager@getUnit"));
Route::GET("inventory", array("InventoryManager@getInventory"));
Route::GET("availableItem", array("InventoryManager@availableItem"));
Route::GET("neighbour", array("InventoryManager@getneighbourInventoryItem"));
Route::GET("count", array("InventoryManager@countItem"));
Route::POST("item", array("InventoryManager@addItem"));
Route::POST("inventory", array("InventoryManager@addInventory"));
Route::PUT("item", array("InventoryManager@updateItem"));
