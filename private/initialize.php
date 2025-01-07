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
require_once('shared/scripts.php');
require_once('vendor/autoload.php');


$database = db_connection();


foreach (glob('classes/*.class.php') as $file) {
    require_once($file);
}

// Autoload class definitions
function my_autoload($class)
{
    if (preg_match('/\A\w+\Z/', $class)) {
        include('classes/' . $class . '.class.php');
    }
}
spl_autoload_register('my_autoload');

databaseObject::set_database($database);

function h($string = '')
{
    return htmlspecialchars($string);
}

function slugify($text)
{
    // Replace non-alphanumeric characters with hyphens
    $text = preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($text));
    // Trim hyphens at the beginning and end
    $text = trim($text, '-');
    return $text;
}

$session = new Session;
$attendee_session = new Attendee_Session;

function require_login()
{
    global $session;
    if (!$session->is_logged_in()) {
        header('Location: ../index.php');
        exit;
    }
}

function attendee_require_login()
{
    global $attendee_session;
    if (!$attendee_session->is_logged_in()) {
        header('Location: ../index.php');
        exit;
    }
}


// oath for organizer signup and sign in using google authorization 
$client_id = '733098577785-o0ei2ogi9fh6on2a9u5vt67p1vdu7ir0.apps.googleusercontent.com';
$client_secret = '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';
$redirect_url = 'http://localhost/event/public/organizer/organizer_dashboard.php';
$oauth_login_attendee_organizer_url = 'http://localhost/event/private/oauth_google/oauth_login_attendee_organizer.php';
$oauth_register_attendee_url = 'http://localhost/event/private/oauth_google/oauth_register_attendee.php';



// create Client Request to access Google API
// for organizer signup
$client = new Google_Client();
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_url);
$client->addScope("email");
$client->addScope("profile");

// create Client Request to access Google API
// for both organizer & attendee login
$attendee_organizer = new Google_Client();
$attendee_organizer->setClientId($client_id);
$attendee_organizer->setClientSecret($client_secret);
$attendee_organizer->setRedirectUri($oauth_login_attendee_organizer_url);
$attendee_organizer->addScope("email");
$attendee_organizer->addScope("profile");

// create Client Request to access Google API
// for attendee signup 
$attendee_signup = new Google_Client();
$attendee_signup->setClientId($client_id);
$attendee_signup->setClientSecret($client_secret);
$attendee_signup->setRedirectUri($oauth_register_attendee_url);
$attendee_signup->addScope("email");
$attendee_signup->addScope("profile");
