<?php

ob_start();

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

function require_login()
{
    global $session;
    if (!$session->is_logged_in()) {
        header('Location: ../index.php');
    } else {
        #continue
    }
}
