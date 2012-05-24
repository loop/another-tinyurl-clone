<?php

/** include header **/
include("header.php");

/** set page name **/
$page = 'forgot';

/** reset error vars **/
$error = 0;
$error_message = '';

/** do login **/
if(isset($_POST['forgot']))
{
	/** get username and password **/
    $username = mysql_real_escape_string($_POST['username']);

    /** check if all required fields are filled **/
    if(empty($username))
	{
		$error = 1;
		$error_message = 'Please fill in all the required fields.';
	}else

    /** check login details **/
    $query = mysql_query("SELECT * FROM members WHERE username = '".$username."' LIMIT 1");
    if(@mysql_num_rows($query) == 0)
    {
		$error = 1;
		$error_message = 'Incorrect username.';
	}else
	
	/** no error? **/
	if($error == 0)
	{
		/** get users info **/
		$query = "SELECT * FROM members WHERE username = '".$username."' LIMIT 1";
		$row = mysql_fetch_array(mysql_query($query));

                $email = $row['email'];
                srand ((double) microtime( )*1000000);
                $random_number = rand( );

                $query = "UPDATE members SET password='" .sha1($random_number). "' WHERE username='" .$username. "'";
                mysql_query($query) or die(mysql_error());

		send_welcome($email, $username, $random_number);

		/** redirect **/
		redirect($url->url_base . '/');
	}
}


/** include footer **/
include("footer.php");

?>