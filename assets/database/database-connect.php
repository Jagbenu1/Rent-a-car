<?php

define('DB_HOST', '127.0.0.1');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'project_4');

$link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if($link === false){
    die("ERROR: could not connect." . mysqli_connect_error());
}

// mysql_select_db(DB_NAME) or die("Sorry, can't select the database");
// echo "Connect successful. Host info: " . mysqli_get_host_info($link);

//close when accessing the database.

?>