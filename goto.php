<?php

/** include header **/
include("header.php");

/** reset error vars **/
$error = 0;

/** get url id **/
$id = isset($_GET['id']) ? $_GET['id'] : '';

/** run query **/
$query = @mysql_query("SELECT * FROM short_urls WHERE url_id = '".$id."' LIMIT 1");
$num = @mysql_num_rows($query);
$row = @mysql_fetch_array($query);

/** if url does not exist throw to home page **/
if($num == 0){ redirect($url->url_base); exit; }else

/** if url exists go to it **/
if($num != 0)
{
    /** update hits **/
	@mysql_query("UPDATE short_urls SET url_hits = url_hits+1 WHERE url_id = '".$id."'");
	
	/** redirect to long url **/
	redirect($row['long_url']); 
	
	/** exit **/
	exit; 
}

?>