<?php

/** start sessions **/
@session_start();

/** include header **/
include("header.php");

/** set page name **/
$page = 'register';

/** reset error & success vars **/
$error = 0;
$error_message = '';
$success = 0;

if(isset($_POST['register']))
{
   /** check all required fields are filled **/
   if(empty($_POST['username']) || empty($_POST['password']) || empty($_POST['password2']) || empty($_POST['email']))
   {
      $error = 1;
	  $error_message = 'Please fill in all the required fields.';
   }else
   
   /** check username is alphanumeric **/
   if(!ctype_alnum($_POST['username']))
   { 
      $error = 1; 
	  $error_message = 'Username must be alphanumeric.'; 
   }else

   /** clean up username **/
   $username = ereg_replace("[^A-Za-z0-9]", "", $_POST['username']);

   /** make sure password is longer than 6 characters **/
   if(validate_password($_POST['password'], 6, 25) == false)
   { 
      $error = 1; 
	  $error_message = 'password must be 6 characters or more.'; 
   }else
   
   /** make sure passwords match **/
   if($_POST['password'] != $_POST['password2'])
   {
      $error = 1;
	  $error_message = 'Passwords don\'t match.';
   }else
   
   /** check email address is valid **/
   if(!is_valid_email($_POST['email']))
   {
      $error = 1;
	  $error_message = 'Please enter a valid email address.';
   }else
   
   /** check if user has agreed to terms **/
   if(empty($_POST['terms']))
   {
      $error = 1;
	  $error_message = 'You must agree to our terms of service.';
   }else
   
   /** check if email account is already in use **/
   $query = mysql_query("SELECT email FROM members WHERE email = '".$_POST['email']."'");
   if(@mysql_num_rows($query))
   {
      $error = 1;
	  $error_message = 'Email address already in use, Please login to that account.';
   }else
   
   /** check if username is already in use **/
   $query = mysql_query("SELECT username FROM members WHERE username = '".$username."'");
   if(@mysql_num_rows($query))
   {
      $error = 1;
	  $error_message = 'Username already in use, please choose again.';
   }else
   
   /** check captcha **/
   if($_POST['Captcha'] != $_SESSION['Captcha'] || $_POST['Captcha'] == '')
   {
      $error = 1;
	  $error_message = 'Please choose the correct captcha image.';
   }else
   
   /** no error? **/
   if($error == 0)
   {
      /** insert user in to database **/
	  mysql_query("INSERT INTO members (username,
	                                    email,
									    password,
									    signup_date,
									    signup_ip,
									    banned,
									    active
									    ) VALUES (
									    '".mysql_real_escape_string($username)."',
									    '".mysql_real_escape_string($_POST['email'])."',
									    '".mysql_real_escape_string(sha1($_POST['password']))."',
									    '".mktime()."',
									    '".$_SERVER['REMOTE_ADDR']."',
									    '0',
									    '1')");
										
	  /** send out welcome email **/									
      send_welcome($_POST['email'], $username, $_POST['password']);
	  
	  /** unset captcha session **/
	  unset($_SESSION['Captcha']);
	  
	  /** set success **/
	  $success = 1;
   }

}

/** check username is available **/
if($_GET['task'] == 'checkUsername')
{ 
   /** query database **/
   $query = "SELECT username FROM members WHERE username = '".$_GET['username']."'";
   $result = mysql_query($query);
   
   /** check **/
   if(mysql_num_rows($result) != 0){ echo '<span style="color:red;">Username Unavailable</span>'; }else{ echo '<span style="color:green;">Username Available</span>'; } 
   
   /** exit **/
   exit;
}

/** include footer **/
include("footer.php");

?>