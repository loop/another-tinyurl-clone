<?php

/** include header **/
include("header.php");

/** set page name **/
$page = 'login';

/** reset error vars **/
$error = 0;
$error_message = '';

/** do login **/
if(isset($_POST['login']))
{
   /** get username and password **/
   $username = mysql_real_escape_string($_POST['username']);
   $password = mysql_real_escape_string($_POST['password']);
   
   /** check if all required fields are filled **/
   if(empty($username) || empty($password))
   {
      $error = 1;
	  $error_message = 'Please fill in all the required fields.';
   }else
   
   /** check login details **/
   $query = mysql_query("SELECT * FROM members WHERE username = '".$username."' AND password = '".sha1($password)."' LIMIT 1");
   if(@mysql_num_rows($query) == 0)
   {
      $error = 1;
	  $error_message = 'Incorrect username or password.';
   }else
   
   /** no error? **/
   if($error == 0)
   {
      /** get users info **/
	  $query = "SELECT * FROM members WHERE username = '".$username."' AND password = '".sha1($password)."' LIMIT 1";
	  $row = mysql_fetch_array(mysql_query($query));
	  
      /** set sessions **/
	  $_SESSION['username'] = $row['username'];
	  $_SESSION['userid'] = $row['id'];
	  $_SESSION['logged_in'] = true;
	  if($row['is_admin'] == '1'){ $_SESSION['is_admin'] = true; }
	  
	  /** redirect **/
	  redirect($url->url_base . '/account/home');
	  
	  /** exit **/
	  exit;
   }
}

/** include footer **/
include("footer.php");

?>