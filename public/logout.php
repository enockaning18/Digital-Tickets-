<?php
require_once('../private/initialize.php');

// Log out the admin
$session->logout();


header('Location:index.php');
