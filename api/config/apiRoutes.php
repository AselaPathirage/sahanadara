<?php
/*
GET - request data from api
POST - add data
PUT - update data
DELETE - delete
*/

Route::GET("/", array("Home@creadits"));
Route::GET("donation", array("Home@viewDonations"));
Route::GET("notice", array("Home@viewNotice","InventoryManager@getNotice"));
Route::GET("notice/{id}", array("InventoryManager@getNotice","DisasterOfficer@getNotice"));
Route::GET("role", array("Employee@getRole"));
Route::GET("division", array("Admin@getDivision", "InventoryManager@getDvOfficeList"));
Route::GET("GnDivision", array("Admin@getGnDivision", "DisasterOfficer@getGNDivision", "InventoryManager@getGNDivision"));
Route::GET("item", array("InventoryManager@getAllItem"));
Route::GET("item/id", array("InventoryManager@getItemFiltered", "DisasterOfficer@getItemFiltered", "ResponsiblePerson@getItemFiltered"));
Route::GET("item/value", array("InventoryManager@getItemFiltered", "DisasterOfficer@getItemFiltered", "ResponsiblePerson@getItemFiltered"));
Route::GET("item/{id}", array("InventoryManager@getItem"));
Route::GET("district", array("Admin@getDistrict"));
Route::GET("user", array("Admin@searchUser"));
Route::GET("user/count/{data}", array("Admin@getUserCount"));
Route::GET("user/self/{data}", array("InventoryManager@getMySelf"));
Route::GET("user/{data}/{data}", array("Admin@searchUser","DistrictSecretariat@searchUser"));
Route::GET("user/{data}", array("Admin@searchUser"));
Route::GET("report", array("Employee@report"));
Route::GET("profile", array("GramaNiladari@getProfileDetails"));
Route::GET("profile/{data}", array("DistrictSecretariat@getProfileDetails"));
Route::GET("safehouse", array("GramaNiladari@getSafehouses", "DisasterOfficer@viewSafehouse", "InventoryManager@getSafeHouseAll", "DivisionalSecretariat@getSafeHouseAll", "Dmc@getSafeHouseAll"));
Route::GET("safehouse/name", array("DisasterOfficer@filterSafehouse", "InventoryManager@filterSafehouse"));
Route::GET("safehouse/{safeHouseId}", array("DisasterOfficer@filterSafehouse","InventoryManager@filterSafehouse"));
Route::GET("incident", array("GramaNiladari@getIncidents","DisasterOfficer@getIncidents"));
Route::GET("incident/{id}", array("GramaNiladari@getIncidentById,DisasterOfficer@getIncidentById"));
Route::GET("GnDivision/{data}", array("DisasterOfficer@getGNDivision"));
Route::GET("statistics", array("ResponsiblePerson@getStats", "InventoryManager@getStats"));
Route::GET("statistics/{data}", array("ResponsiblePerson@getStatsFiltered", "InventoryManager@getStatsFiltered"));

Route::PUT("resetPassword", array("Employee@updatePassword"));
Route::PUT("resetPassword/admin", array("Admin@updatePassword"));
Route::PUT("resetPassword/districtsecretariat", array("DistrictSecretariat@updatePassword"));
Route::PUT("profile", array("GramaNiladari@updateProfileDetails","Admin@updateProfileDetails","DistrictSecretariat@updateProfileDetails"));

Route::POST("login", array("Employee@login"));
Route::POST("resetPassword", array("Employee@resetPassword"));
Route::POST("renew", array("Employee@renew"));
Route::POST("rewoke", array("Employee@rewoke"));
Route::POST("user", array("Admin@register", "DivisionalSecretariat@register", "DisasterOfficer@register"));
Route::POST("notice", array("InventoryManager@addNotice", "DisasterOfficer@addNotice"));

Route::DELETE("notice/{id}", array("InventoryManager@deleteNotice", "DisasterOfficer@deleteNotice"));

// Grama Niladari
Route::GET("residents", array("GramaNiladari@getResident"));
Route::GET("gnmsg", array("GramaNiladari@getMessages"));
Route::GET("gnalert", array("GramaNiladari@getAlerts"));
Route::GET("residentcount", array("GramaNiladari@getResidentCount"));
Route::GET("recentsh", array("GramaNiladari@getSafehouseRecent"));
Route::GET("responsible", array("GramaNiladari@getResponsible", "DisasterOfficer@getResponsible"));
Route::GET("disaster", array("GramaNiladari@getDisaster"));
Route::GET("gnreports", array("GramaNiladari@getReports"));
Route::GET("gnreports/{id}", array("GramaNiladari@getReportsbyIncident"));
Route::GET("gninitial/{id}", array("GramaNiladari@getInitial"));
Route::GET("gnrelief/{id}", array("GramaNiladari@getRelief"));
Route::GET("gnfinal/{id}", array("GramaNiladari@getFinal"));
Route::POST("residents", array("GramaNiladari@addResident"));
Route::POST("gnmsg", array("GramaNiladari@sendMessages"));
Route::POST("gninitial", array("GramaNiladari@addInitial"));
Route::POST("gnrelief", array("GramaNiladari@addRelief"));
Route::POST("gnfinal", array("GramaNiladari@addFinal"));
Route::PUT("residents/{id}", array("GramaNiladari@updateResident"));
Route::DELETE("residents/{id}", array("GramaNiladari@deleteResident"));

// Disaster Mgt officer
Route::GET("doalert", array("DisasterOfficer@getAlerts"));
Route::GET("domsg", array("DisasterOfficer@getMessages"));
Route::POST("domsg", array("DisasterOfficer@sendMessages"));
Route::GET("disofficerprofile", array("DisasterOfficer@getProfileDetails"));
Route::POST("safehouse", array("DisasterOfficer@addSafehouse"));
Route::PUT("safehouse/{id}", array("DisasterOfficer@updateSafehouse"));
Route::DELETE("safehouse/{id}", array("DisasterOfficer@deleteSafehouse"));
Route::POST("donation", array("Home@addDonations"));
Route::POST("incident", array("DisasterOfficer@addIncidents"));
Route::PUT("incident", array("DisasterOfficer@updateIncidents"));
Route::GET("doreports", array("DisasterOfficer@getReports"));
Route::GET("doreports/{id}", array("DisasterOfficer@getReportsbyIncident"));
Route::POST("dofinal", array("DisasterOfficer@addFinal"));
Route::GET("dofinal/{id}", array("DisasterOfficer@getFinal"));
Route::GET("doinitial/{id}", array("DisasterOfficer@getInitial"));
Route::GET("dorelief/{id}", array("DisasterOfficer@getRelief"));

Route::GET("DOGnDivision", array("DisasterOfficer@getDOGNDivision"));
Route::GET("SafehouseCount", array("DisasterOfficer@getSafehouseCount"));


//Admin
Route::GET("area", array("Admin@DBtoJson"));

//ResponsiblePerson
Route::POST("statusUpdate", array("ResponsiblePerson@addStatusUpdate"));
 
// Inventory Manager
Route::GET("unit", array("InventoryManager@getUnit"));
Route::GET("inventory", array("InventoryManager@getInventory","DivisionalSecretariat@getInventory"));
Route::GET("availableItem", array("InventoryManager@availableItem"));
Route::GET("neighbour", array("InventoryManager@getneighbourInventoryItem"));
Route::GET("count", array("InventoryManager@countItem"));
Route::GET("aids", array("InventoryManager@getAids"));
Route::GET("aids/safeHouse", array("InventoryManager@getAidsSafeHouse"));
Route::GET("aids/{safeHouseId}", array("InventoryManager@getAids"));
Route::POST("item", array("InventoryManager@addItem"));
Route::POST("inventory", array("InventoryManager@addInventory"));
Route::POST("distribute", array("InventoryManager@addDistribute"));
//Route::POST("distribute/", array("InventoryManager@addDistribute"));
Route::PUT("item/{itemId}", array("InventoryManager@updateItem"));

// Div Sec

Route::GET("inventorymgr", array("DivisionalSecretariat@getInventorymgr"));
Route::GET("inventory/{dataType}", array("DivisionalSecretariat@filterInventory"));