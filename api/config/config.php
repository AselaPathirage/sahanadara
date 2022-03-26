<?php
// Database
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
/*
define("DB_HOST", "sahanadara-new.ctwrngfezlnk.us-east-2.rds.amazonaws.com");
define("DB_USER", "user");
define("DB_PASS", "Qwer1234");
*/
define("DB_NAME", "sahanadara");
define("LOG_PATH", "/log");
define("ENCRYPTION_KEY","AHkjghjvHJGKNKLlkBG54J");
define("TRANSLATOR_KEY","AIzaSyDtcDT7w-D76oxrECf6qofOSRKMBDfOl40");

//SMS
define("SENDER", "94719867863"); 
define("SMS_PASSWORD", "7170");
$errorCode = array(
    	            'classNotFound' => 800,
                    'methodNotFound' => 801,
                    'attributeMissing' => 802,
                    'apiKeyError' => 803,
                    'userKeyError' => 804,
                    'unknownError' => 805,
                    'success' => 806,
                    'permissionError' => 807,
                    'jsonRequestNotFoundError' => 808,
                    'tokenExpired' => 809,
                    'tokenRewoked' => 810,
                    'userCreadentialWrong' => 811,
                    'routeNotFound' => 812,
                    'unhandledRequestingMetod' => 813,
                    'emailAlreadyInUse' => 814,
                    'emailNotInUse' => 815,
                    'urlTokenExpired' => 816,
                    'unableToHandle' => 817,
                    'smsSendFailed' => 818,
                    'translatorError' => 819,
                    'wrongLanguageCode' => 820
                    );