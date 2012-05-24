<?php

/** include header **/
include("header.php");

/** shorten url **/
if(isset($_POST['task']) && $_POST['task'] == 'shorten')
{
    /** pass variables to short url class **/
	$short_url->create_url(urldecode($_POST['url']), false);
	
	/** if there is an error output it **/
	if($short_url->is_error == 1){ echo $short_url->error_message; }
	
	/** exit **/
	exit;
}

?>