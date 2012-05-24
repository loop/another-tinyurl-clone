<?php

/** this function sends a custom email **/ 
function send_generic($recipient, $sender, $subject, $message, $search = "", $replace = "") 
{
	/** decode subject and email for sending **/
	$subject = htmlspecialchars_decode($subject, ENT_QUOTES);
	$message = htmlspecialchars_decode($message, ENT_QUOTES);

	/** replace variables in subject and message **/
	$subject = str_replace($search, $replace, $subject);
	$message = str_replace($search, $replace, $message);

	/** encode subject for UTF8 **/
	$subject = "=?UTF-8?B?".base64_encode($subject)."?=";

	/** replace carriage returns with breaks **/
	$message = str_replace("\n", "<br>", $message);

	/** set headers **/
	$headers = "MIME-Version: 1.0"."\n";
	$headers .= "Content-type: text/html; charset=utf-8"."\n";
	$headers .= "Content-Transfer-Encoding: 8bit"."\n";
	$headers .= "From: $sender"."\n";
	$headers .= "Return-Path: $sender"."\n";
	$headers .= "Reply-To: $sender";

	/** send mail **/
	mail($recipient, $subject, $message, $headers);

	return true;
}

/** this function sends a welcome email to a new user **/
function send_welcome($email, $username, $password) 
{
    /** set globals **/
	global $_CONFIG, $_LANG;
	
	/** decode subject and email for sending **/
	$subject = htmlspecialchars_decode($_LANG['emails'][1], ENT_QUOTES);
	$message = htmlspecialchars_decode($_LANG['emails'][2], ENT_QUOTES);
	
	/** replace variables in subject and message **/
	$subject = str_replace("[username]", $username, $subject);
	$message = str_replace("[username]", $username, $message);
	$subject = str_replace("[password]", $password, $subject);
	$message = str_replace("[password]", $password, $message);

	/** encode subject for UTF8 **/
	$subject = "=?UTF-8?B?".base64_encode($subject)."?=";

	/** replace carriage returns with breaks **/
	$message = str_replace("\n", "<br>", $message);

	/** set headers **/
	$from_email = $_CONFIG['emails']['email_from'] . "<".$_CONFIG['emails']['admin'].">";
	$headers = "MIME-Version: 1.0"."\n";
	$headers .= "Content-type: text/html; charset=utf-8"."\n";
	$headers .= "Content-Transfer-Encoding: 8bit"."\n";
	$headers .= "From: $from_email"."\n";
	$headers .= "Return-Path: $from_email"."\n";
	$headers .= "Reply-To: $from_email";

	/** send mail **/
	@mail($email, $subject, $message, $headers);

	return true;
}

?>