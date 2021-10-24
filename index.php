<?php
date_default_timezone_set("Asia/Colombo");

// if ($_SERVER['REQUEST_METHOD'] === 'PUT' || $_SERVER['REQUEST_METHOD'] === 'DELETE' || $_SERVER['REQUEST_METHOD'] === 'POST') {
//     if (isset($_GET['formControl'])) {
//         require  "public/index.php";
//     } else {
//         require  "app/index.php";
//     }
// } else {
//     require  "public/index.php";
// }

define("baseUrl","sahanadara");
define("HOST","http://localhost/sahanadara/");
define("API","http://localhost/sahanadara/api/");

require  "public/index.php";

