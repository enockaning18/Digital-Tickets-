<?php function db_connection(){
    $connection = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME,);
    confirm_db_connection($connection);
    return $connection;
}

function confirm_db_connection($connection){
    if($connection->connect_errno){
        $msg = "Database connection failed :";
        $msg .= $connection->connect_errno;
        exit($msg); 
    }
}
