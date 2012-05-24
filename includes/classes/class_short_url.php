<?php

class ShortUrl
{
    /** set initial vars **/
    var $is_error;
	var $error_message;
	
	/** this function crates a new short url **/
	function create_url($long_url, $api = false)
	{
	    /** set globals **/
		global $url, $_LANG, $_CONFIG;
		
		/** start sessions **/
		@session_start();
		
		/** set url var **/
		$this->long_url = $long_url;
		
		/** check url has http:// or https:// **/
		if(substr($this->long_url, 0, 7) != "http://"){ $this->long_url = 'http://'.$long_url; }
		
		/** check that $url var is not empty **/
		if(empty($this->long_url) || $this->long_url == '')
		{
		    $this->is_error = 1;
			$this->error_message = '<div id="error">Please enter a url to shorten.</div>';
		}else
		
		/** check url is valid **/
		if(is_valid_url($this->long_url) == false)
		{
		    $this->is_error = 1;
			$this->error_message = '<div id="error">Please enter a valid url.</div>';
		}else
		
		/** no error? **/
		if($this->is_error != 1)
		{
		    /** generate new url id **/
			$this->short_url_id = rand_string(6, 30);
			
			/** insert link in to database **/
			@mysql_query("INSERT INTO short_urls (long_url, url_id, url_hits, owner, screenshot ) VALUES ( '".$this->long_url."', '".$this->short_url_id."', '0', '".$_SESSION['userid']."', '".$this->screenshot."')");
			
		    /** show new url **/
            echo '<center><input id="link" readonly="readonly" onClick="this.select();" value="'.$url->url_base.'/'.$this->short_url_id.'" type="text"></center><div id="buttons"> <a id="copy" class="button" href="javascript:;"><img src="./assets/images/copy-icon.png" alt=""> Copy</a><a class="button" href="javascript:;" onClick="return addthis_open(this, \'more\', \''.$url->url_base . '/' .$this->short_url_id.'\', \''.$url->url_base . '/' .$this->short_url_id.'\')"><img src="./assets/images/share-icon.png" alt=""> Share</a></div></div>';
			
			/** exit **/
			exit();
		}
	}
	
	
	/** this function deletes a url **/
	function delete_url($url_id, $admin = false)
	{
	    /** set globals **/
		global $url;
		
		/** start sessions **/
		@session_start();
		
	    /** do delete **/
		if($admin == true):
		mysql_query("DELETE FROM short_urls WHERE url_id = '".$url_id."' LIMIT 1");
		else:
		mysql_query("DELETE FROM short_urls WHERE url_id = '".$url_id."' AND owner = '".$_SESSION['userid']."' LIMIT 1");
		endif;
		
		/** redirect **/
		if($admin == true): redirect($url->url_base.'/admin?manage_urls'); else: redirect($url->url_base.'/account/home'); endif;
		
		/** exit **/
		exit;
	}
}

?>