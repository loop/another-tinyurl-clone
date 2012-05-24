<?php

/** class url **/
class url 
{

    /** set initial vars **/
    var $is_error;
    var $url_base;
	
	
	/* this function sets the base url to which file name can be appended **/
	function url() 
	{
	    /** set globals **/
	    global $_CONFIG;
		
		/** determin base url **/
		$server_array = explode("/", $_SERVER['PHP_SELF']);
		$server_array_mod = array_pop($server_array);
		if ($server_array[count($server_array) - 1] == "admin"){ $server_array_mod = array_pop($server_array);}
		$server_info = implode("/", $server_array);
		
	   /** base url **/
	   $this->url_base = "http://" . $_SERVER['HTTP_HOST'] . $server_info;
    }

	/** this function returns the current url of page **/
	function url_current() 
	{
	    /** get current url domain **/
	    $current_url_domain = $_SERVER['HTTP_HOST'];
		
		/** get current url path **/
	    $current_url_path = $_SERVER['SCRIPT_NAME'];
		
		/** get current url query string if any **/
	    $current_url_querystring = $_SERVER['QUERY_STRING'];
		
		/** make current url **/
	    $current_url = "http://".$current_url_domain.$current_url_path;
	    if($current_url_querystring != "") {  $current_url .= "?".$current_url_querystring; }
	    $current_url = urlencode($current_url);
		
		/** output **/
	    return $current_url;
	}


	/** this function returns the path to the given users dir **/
	function url_userdir($user_id) 
	{
	    $userdir = 'uploads_user/1000/' . $user_id . '/';
	    return $userdir;
	}

    /** this function encodes a given url **/
	function url_encode($url){ return urlencode($url); }
	
	/** this function decodes a given url **/
	function url_decode($url){ return urldecode($url); }

}
?>