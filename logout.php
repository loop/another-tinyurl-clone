<?php

/** start sessions **/
@session_start();

/** include required files **/
include('./includes/common.php');

/** unset sessions **/
unset($_SESSION['logged_in']);
unset($_SESSION['username']);
unset($_SESSION['userid']);
unset($_SESSION['is_admin']);

/** redirect **/
redirect($url->url_base);

?>