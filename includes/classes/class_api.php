<?php

class API
{
    /** this function crates a new short url **/
	function create_url($long_url, $api = true)
	{
	    /** set globals **/
		global $url, $_LANG, $_CONFIG;
		
		/** set url var **/
		$this->long_url = $long_url;
		
		/** check url has http:// or https:// **/
		if(substr($this->long_url, 0, 7) != "http://"){ $this->long_url = 'http://'.$long_url; }
		
		/** check that $url var is not empty **/
		if(empty($this->long_url) || $this->long_url == '')
		{
		    $this->is_error = 1;
			echo 'Please enter a url to shorten.';
		}else
		
		/** check url is valid **/
		if(is_valid_url($this->long_url) == false)
		{
		    $this->is_error = 1;
			echo 'Please enter a valid url.';
		}else
		
		/** no error? **/
		if($this->is_error != 1)
		{
		    /** generate new url id **/
			$this->short_url_id = rand_string(6, 30);
			
		    /** insert link in to database **/
			@mysql_query("INSERT INTO short_urls (long_url,
			                                      url_id,
												  url_hits,
												  owner
												  ) VALUES (
												  '".$this->long_url."',
												  '".$this->short_url_id."',
												  '0',
												  '-1')");
			
		    /** show new url **/
            echo $url->url_base . '/' . $this->short_url_id;
		}
	}
}

?>