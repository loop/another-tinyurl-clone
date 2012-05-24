<?php

/** include header **/
include("header.php");

/** set page name **/
$page = 'changepass';

/** reset error & success vars **/
$error = 0;
$error_message = '';
$success = 0;

/** change password **/
if(isset($_POST['task']) && $_POST['task'] == 'changepass')
{
    /** get users curret information **/
	$user = @mysql_fetch_array(@mysql_query("SELECT * FROM members WHERE id = '".$userid."' LIMIT 1"));
	
	/** get current password **/
	$current_pass = $user['password'];
	
	/** get new password **/
	$new_pass = $_POST['new_pass'];
	
	/** check if new passwords match **/
	if($new_pass != $_POST['new_pass2'])
	{
	    $error = 1;
		$error_message = 'New passwords don\'t match.';
	}else
	
	/** check old password **/
	if($current_pass != sha1($_POST['current_pass']))
	{
	    $error = 1;
		$error_message = 'Current password does not match one on file.';
	}else
	
	/** check for empty fields **/
	if(empty($_POST['current_pass']) || empty($_POST['new_pass']) || empty($_POST['new_pass2']))
	{
	    $error = 1;
		$error_message = 'Please fill all required fields.';
	}else
	
	/** no error?, update password **/
	if($error != 1)
	{
	    /** sha1 password **/
		$new_pass = sha1($new_pass);
		
		/** update password **/
		mysql_query("UPDATE members SET password = '".mysql_real_escape_string($new_pass)."' WHERE id = '".$userid."'");
		
		/** set success **/
		$success = 1;
	}
}

/** include footer **/
include("footer.php");

?>