<?php

/** start sessions **/
@session_start();

/** include config files **/
include("configs/config_general.php");
include("configs/database_config.php");
include("configs/captcha_config.php");
include("configs/smarty_config.php");

/** include language files **/
include("language/english.php");

/** include function files **/
include("functions/functions_general.php");
include("functions/functions_email.php");

/** include class files **/
include("classes/class_url.php");
include("classes/class_short_url.php");

/** initiate classes **/
$url = new url();
$short_url = new ShortUrl();

/** global $userid & $username **/
$userid = isset($_SESSION['userid']) ? $_SESSION['userid'] : '-1';
$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';

?>