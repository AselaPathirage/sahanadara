<?php
// Database
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");

define("DB_NAME", "newdbsahanadara");
define("LOG_PATH", "/log");
define("ENCRYPTION_KEY","AHkjghjvHJGKNKLlkBG54J");
define("TRANSLATOR_KEY","");

//SMS
define("SENDER", ""); 
define("SMS_PASSWORD", "");
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
                    'wrongLanguageCode' => 820,
                    'recordNoteFound' => 820,
                    );
