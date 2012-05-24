<?php

/** this function validates an email address */
function is_valid_email($email) 
{
  if(preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/",$email))
  {
  return true;
  }
  return false;
}

/** validate users password **/
function validate_password($password, $min_char = 6, $max_char = 20)  
{  
    // Remove whitespaces from the beginning and end of a string  
    $password = trim($password);   
   
    // Accept only letters, numbers and underscore  
    $eregi = eregi_replace('([a-zA-Z0-9_]{'.$min_char.','.$max_char.'})', '', $password);  
  
    if(empty($eregi)){ return true; }else{ return false; }  
}

/** this function performs a redirection **/
function redirect($url)
{
    if(ereg("Microsoft", $_SERVER['SERVER_SOFTWARE']))
	{
		@header("Refresh: 0; URL=$url");
	}else{
	    @header("Location: $url");
	}
	exit();
}

/** this function checks for a valid url **/
function is_valid_url($url = NULL)
{
    if($url == NULL){ return false; }
	$protocol = '(http://|https://)';
	$allowed = '([a-z0-9]([-a-z0-9]*[a-z0-9]+)?)';
	$regex = "^". $protocol . '(' . $allowed . '{1,63}\.)+'. '[a-z]' . '{2,6}';
    if(eregi($regex, $url) == true){ return true; }else{ return false; }
}

/** this function creates a randowm string **/
function rand_string($min = "8", $max = "30") 
{
    $code = NULL;
	for($i=0;$i<$min;$i++) 
	{
	    $char = chr(rand(48,122));
	    while(!ereg("[a-zA-Z0-9]", $char))
		{
	        if($char == $lchar) { continue; }
	        $char = chr(rand(48,90));
	    }
	  $pass .= $char;
	  $lchar = $char;
	}
    return $pass;
}

?>