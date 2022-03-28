<?php
/*
GET - request data from api
POST - add data
PUT - update data
DELETE - delete
*/

Route::GET("/", array("Home@creadits"));
Route::GET("donation", array("Home@viewDonations"));
//Route::GET("fundraiser", array("Home@viewFundraises"));
Route::GET("notice", array("Home@viewNotice","InventoryManager@getNotice","DivisionalSecretariat@getNotice","DisasterOfficer@getNotice"));
Route::GET("notice/language/{lanCode}", array("Home@getNotice"));
Route::GET("notice/language/{lanCode}/limit/{number}", array("Home@getLimitedNotice"));
Route::GET("notice/{id}", array("InventoryManager@getNotice","DisasterOfficer@getNotice"));
Route::GET("fundraisingNotice", array("Home@viewfundraisingNotice"));
Route::GET("fundraisingNotice/language/{lanCode}", array("Home@getfundraisingNotice"));
Route::GET("fundraisingNotice/language/{lanCode}/limit/{number}", array("Home@getLimitedfundraisingNotice"));
Route::GET("borrowRequests", array("DivisionalSecretariat@getBorrowRequests","InventoryManager@getBorrowRequests"));
Route::GET("borrowRequests/{id}", array("DivisionalSecretariat@filterBorrowRequests","InventoryManager@filterBorrowRequests"));
Route::GET("role", array("Employee@getRole"));
Route::GET("division", array("Admin@getDivision", "InventoryManager@getDvOfficeList"));
Route::GET("GnDivision", array("Admin@getGnDivision", "DisasterOfficer@getGNDivision", "InventoryManager@getGNDivision"));
Route::GET("item", array("InventoryManager@getAllItem"));
Route::GET("item/{filter}", array("InventoryManager@getItemFiltered", "DisasterOfficer@getItemFiltered", "ResponsiblePerson@getItemFiltered"));
Route::GET("district", array("Admin@getDistrict"));
Route::GET("user", array("Admin@searchUser"));
Route::GET("user/count/{data}", array("Admin@getUserCount"));
Route::GET("user/{data}/{data}", array("Admin@searchUser", "DistrictSecretariat@searchUser", "InventoryManager@getMySelf"));
Route::GET("user/{data}", array("Admin@searchUser"));
Route::GET("user/filter/{data}/{data}",array("Admin@getFilteredUser"));
Route::GET("report", array("Employee@report"));
Route::GET("profile", array("GramaNiladari@getProfileDetails","DisasterOfficer@getProfileDetails"));
Route::GET("profile/{data}", array("DistrictSecretariat@getProfileDetails"));
Route::GET("safehouse", array("GramaNiladari@getSafehouses", "DisasterOfficer@viewSafehouse", "InventoryManager@getSafeHouseAll", "DivisionalSecretariat@getSafeHouseAll", "Dmc@getSafeHouseAll"));
Route::GET("safehouse/{safeHouseId}", array("DisasterOfficer@filterSafehouse", "InventoryManager@filterSafehouse"));
Route::GET("incident", array("GramaNiladari@getIncidents", "DisasterOfficer@getIncidents"));
Route::GET("incident/{id}", array("GramaNiladari@getIncidentById", "DisasterOfficer@getIncidentById"));

Route::GET("GnDivision/{data}", array("DisasterOfficer@getGNDivision"));
Route::GET("statistics", array("ResponsiblePerson@getStats", "InventoryManager@getStats"));
Route::GET("statistics/{data}", array("ResponsiblePerson@getStatsFiltered", "InventoryManager@getStatsFiltered"));

Route::PUT("user/trasfer/inventoryManager/{userId}", array("DivisionalSecretariat@transferUser"));
Route::PUT("resetPassword", array("Employee@updatePassword"));
Route::PUT("resetPassword/admin", array("Admin@updatePassword"));
Route::PUT("user", array("Admin@updateUser"));
Route::PUT("user/office", array("Admin@changeUserOffice"));
Route::PUT("resetPassword/districtsecretariat", array("DistrictSecretariat@updatePassword"));
Route::PUT("profile", array("GramaNiladari@updateProfileDetails", "Admin@updateProfileDetails", "DistrictSecretariat@updateProfileDetails"));
Route::PUT("notice/{id}", array("InventoryManager@updateNotice","DisasterOfficer@updateNotice"));

Route::POST("login", array("Employee@login"));
Route::POST("resetPassword", array("Employee@resetPassword"));
Route::POST("renew", array("Employee@renew"));
Route::POST("rewoke", array("Employee@rewoke"));
Route::POST("user", array("Admin@register", "DivisionalSecretariat@register", "DisasterOfficer@register"));
Route::POST("notice", array("InventoryManager@addNotice", "DisasterOfficer@addNotice"));
Route::POST("notice/{safeHouseId}", array("InventoryManager@addAidNotice"));

Route::DELETE("notice/{id}", array("InventoryManager@deleteNotice", "DisasterOfficer@deleteNotice"));

// Grama Niladari
Route::GET("residents", array("GramaNiladari@getResident"));
Route::GET("gnmsg", array("GramaNiladari@getMessages"));
Route::GET("gnalert", array("GramaNiladari@getAlerts"));
Route::GET("residentcount", array("GramaNiladari@getResidentCount"));
Route::GET("gncompcount", array("GramaNiladari@getCompCount"));
Route::GET("recentsh", array("GramaNiladari@getSafehouseRecent"));
Route::GET("responsible", array("GramaNiladari@getResponsible", "DisasterOfficer@getResponsible"));
Route::GET("disaster", array("GramaNiladari@getDisaster","DisasterOfficer@getDisaster"));
Route::GET("gncompreports", array("GramaNiladari@getCompensationsforreports"));
Route::GET("gnresidentall", array("GramaNiladari@getResidentAllReports"));
Route::GET("gninitial", array("GramaNiladari@getinitialsforreports"));
Route::GET("gnreports", array("GramaNiladari@getReports"));
Route::GET("gnreports/{id}", array("GramaNiladari@getReportsbyIncident"));
Route::GET("gninitial/{id}", array("GramaNiladari@getInitial"));
Route::GET("gnrelief/{id}", array("GramaNiladari@getRelief"));
Route::GET("gnfinal/{id}", array("GramaNiladari@getFinal"));
Route::GET("countfinal/{id}", array("GramaNiladari@fillFinalIncident"));
Route::GET("gncomp", array("GramaNiladari@getCompensations"));
Route::GET("gnprop/{id}", array("GramaNiladari@getProperty"));
Route::GET("gndeath/{id}", array("GramaNiladari@getDeath"));
Route::POST("residents", array("GramaNiladari@addResident"));
Route::POST("gnmsg", array("GramaNiladari@sendMessages"));
Route::POST("gninitial", array("GramaNiladari@addInitial"));
Route::POST("gnrelief", array("GramaNiladari@addRelief"));
Route::POST("gnfinal", array("GramaNiladari@addFinal"));
Route::POST("deathcomp", array("GramaNiladari@addDeathcomp"));
Route::POST("propertycomp", array("GramaNiladari@addPropertycomp"));
Route::PUT("residents/{id}", array("GramaNiladari@updateResident"));
Route::DELETE("residents/{id}", array("GramaNiladari@deleteResident"));

// DMC
Route::GET("dmccomp", array("Dmc@getCompensations"));
Route::GET("dmcprop/{id}", array("Dmc@getProperty"));
Route::GET("dmcdeath/{id}", array("Dmc@getDeath"));
Route::GET("incidentcount", array("Dmc@getIncidentCount"));
Route::GET("safecount", array("Dmc@getSafeCount"));
Route::GET("compcount", array("Dmc@getCompCount"));
Route::GET("dmcsafehouse", array("Dmc@getSafeHouse"));
Route::GET("dmcsafehouse/{id}", array("Dmc@getSafeHouseById"));
Route::GET("recentsh/{id}", array("Dmc@getSafehouseRecent"));
Route::GET("responsible/{id}", array("Dmc@getResponsible"));
Route::GET("safeHouseReport", array("Dmc@getSafeHouseReport"));
Route::GET("safeHouseReport/{districtId}", array("Dmc@getSafeHouseReport"));
Route::GET("safeHouseReport/{districtId}/{divisionId}", array("Dmc@getSafeHouseReport"));
Route::GET("safeHouseReport/{districtId}/{divisionId}/{gnId}", array("Dmc@getSafeHouseReport"));

Route::PUT("dmccompapprove", array("Dmc@approvecomp"));




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
Route::GET("gns/{id}", array("DisasterOfficer@getGNsOnIncident"));
Route::GET("doreports", array("DisasterOfficer@getReports"));
Route::GET("doreports/{id}", array("DisasterOfficer@getReportsbyIncident"));
Route::GET("countdvfinal/{id}", array("DisasterOfficer@getFinalsbyIncident"));
Route::GET("disasterOfficer/final", array("DisasterOfficer@getFinalReport"));
Route::GET("disasterOfficer/final/{reportId}", array("DisasterOfficer@getFinalReport"));
Route::POST("dofinal", array("DisasterOfficer@addFinal"));
Route::POST("disasterOfficer/final", array("DisasterOfficer@addFinalReport"));
Route::GET("dofinal/{id}", array("DisasterOfficer@getFinal"));
Route::GET("doinitial/{id}", array("DisasterOfficer@getInitial"));
Route::GET("dorelief/{id}", array("DisasterOfficer@getRelief"));
Route::GET("dodeath/{id}", array("DisasterOfficer@getDeath"));
Route::GET("doprop/{id}", array("DisasterOfficer@getProperty"));
Route::GET("dismgrcomp", array("DisasterOfficer@getCompensations"));

Route::GET("DOGnDivision", array("DisasterOfficer@getDOGNDivision"));
Route::GET("SafehouseCount", array("DisasterOfficer@getSafehouseCount"));
Route::GET("Safehouse/{id}", array("DisasterOfficer@getmySafehouse"));
Route::PUT("rincident", array("DisasterOfficer@reportIntoIncident"));
Route::PUT("docompapprove", array("DisasterOfficer@approvecomp"));
Route::PUT("doincapprove", array("DisasterOfficer@approveinc"));
Route::PUT("docollected", array("DisasterOfficer@collectedcomp"));
Route::PUT("incidentstatus", array("DisasterOfficer@changeIncidentStatus"));
Route::PUT("safehousestatus", array("DisasterOfficer@changeSafehouseStatus"));
Route::PUT("responsible/{id}", array("DisasterOfficer@updateResponsible"));
Route::DELETE("responsible/{id}", array("DisasterOfficer@deleteResponsible"));

//Admin
Route::GET("area", array("Admin@DBtoJson"));
Route::DELETE("user/{id}/{id}", array("Admin@deleteUser"));

//ResponsiblePerson
Route::POST("statusUpdate", array("ResponsiblePerson@addStatusUpdate"));

// Inventory Manager
Route::GET("unit", array("InventoryManager@getUnit"));
Route::GET("unit/{id}", array("InventoryManager@getUnit"));
Route::GET("inventory", array("InventoryManager@getInventory", "DivisionalSecretariat@getInventory"));
Route::GET("inventory/offices", array("InventoryManager@getInventoryOffices"));
Route::GET("availableItem", array("InventoryManager@availableItem"));
Route::GET("neighbour", array("InventoryManager@getneighbourInventoryItem"));
Route::GET("count", array("InventoryManager@countItem"));
Route::GET("aids", array("InventoryManager@getAids"));
Route::GET("aids/safeHouse", array("InventoryManager@getAidsSafeHouse"));
Route::GET("aids/{safeHouseId}", array("InventoryManager@getAids"));
Route::GET("serviceRequest", array("InventoryManager@getServiceRequest"));
Route::GET("serviceRequest/self", array("InventoryManager@viewSentServiceRequest"));
Route::GET("serviceRequest/self/{requestId}", array("InventoryManager@viewSentServiceRequest"));
Route::GET("serviceRequest/{requestId}", array("InventoryManager@getServiceRequest"));
Route::GET("report/availableItemReport/{from}/{to}", array("InventoryManager@availableItemReport"));
Route::GET("report/goodsTransactionReport", array("InventoryManager@goodsTransactionReport"));
Route::GET("report/receivedGoodsReport", array("InventoryManager@receivedGoodsReport"));
Route::GET("report/sendingGoodsReport", array("InventoryManager@sendingGoodsReport"));
Route::GET("report/safeHouseReport/{safeHouseId}/{from}/{to}", array("InventoryManager@safeHouseReport"));
Route::POST("item", array("InventoryManager@addItem"));
Route::POST("inventory", array("InventoryManager@addInventory"));
Route::POST("distribute", array("InventoryManager@addDistribute"));
Route::POST("distribute/{safeHouseId}", array("InventoryManager@addDistributeStatus"));
Route::POST("serviceRequest", array("InventoryManager@addServiceRequest"));
Route::PUT("serviceRequest/decline/{requestId}", array("InventoryManager@declineServiceRequest"));
Route::PUT("serviceRequest/accept/{requestId}", array("InventoryManager@acceptServiceRequest"));
Route::PUT("item/{itemId}", array("InventoryManager@updateItem"));
Route::DELETE("serviceRequest/{requestId}", array("InventoryManager@deleteServiceRequest"));

// Div Sec
Route::GET("inventorymgr", array("DivisionalSecretariat@getInventorymgr"));
Route::GET("inventory/{dataType}", array("DivisionalSecretariat@filterInventory"));
Route::GET("divseccomp", array("DivisionalSecretariat@getCompensations"));
Route::GET("divsecprop/{id}", array("DivisionalSecretariat@getProperty"));
Route::GET("divsecdeath/{id}", array("DivisionalSecretariat@getDeath"));
Route::GET("fundraiser", array("DivisionalSecretariat@getFundraiser"));
Route::POST("fundraiser", array("DivisionalSecretariat@addFundraiser"));
Route::PUT("divseccompapprove", array("DivisionalSecretariat@approvecomp"));
Route::PUT("fundraiser/{id}", array("DivisionalSecretariat@updateFundraiser"));
Route::PUT("borrowRequests/{command}/{requestId}", array("DivisionalSecretariat@commandBorrowRequests"));
Route::PUT("notice/{command}/{noticeId}", array("DivisionalSecretariat@commandNotice"));
Route::DELETE("fundraiser/{id}", array("DivisionalSecretariat@deleteFundraiser"));
Route::GET("fundraiser/{id}", array("DivisionalSecretariat@getmyFundraiser"));
Route::PUT("fundraiserstatus", array("DivisionalSecretariat@changeFundraiserStatus"));

// District Sec
Route::GET("dseccomp", array("DistrictSecretariat@getCompensations"));
Route::GET("dsecprop/{id}", array("DistrictSecretariat@getProperty"));

Route::PUT("dseccompapprove", array("DistrictSecretariat@approvecomp"));
