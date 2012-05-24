<?php

/** database config **/
$database_host = "localhost";
$database_username = "username";
$database_password = "password";
$database_name = "database";

/** connect to database **/
mysql_connect($database_host, $database_username, $database_password) or die('Unable to connect to database.');
mysql_select_db($database_name) or die('Unable to connect to database.');


?>