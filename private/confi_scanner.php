<?php 
ob_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);


define("PRIVATE_PATH", dirname(__FILE__));
define("PROJECT_PATH", dirname(PRIVATE_PATH));
define("PUBLIC_PATH", PROJECT_PATH . '/public');
define("SHARED_PATH", PRIVATE_PATH . '/shared');

// define("ATTENDEE", PROJECT_PATH . '/attendee');
// define("ATTENDEE_SHARED", ATTENDEE . '/shared');
// define("ORGANIZER", PROJECT_PATH . '/organizer');
// define("ORGANIZER_SHARED", ORGANIZER . '/shared');

$public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
$doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);


require_once('db_credentials.php');
require_once('db_functions.php');
require_once('status_error_functions.php');
require_once('validation_functions.php');
require_once('calc_queries.php');
require_once('vendor/autoload.php');
require __DIR__ . "/vendor/autoload.php";


$database = db_connection();