<?php

/** include header **/
include("header.php");

/** set page name **/
$page = 'admin';

/** check if admin is logged in **/
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true && !isset($_SESSION['is_admin']) && $_SESSION['is_admin'] != true || !isset($_SESSION['logged_in']) && $_SESSION['logged_in'] != true){ redirect($url->url_base); exit; }

/** get all members urls **/
$query = mysql_query("SELECT * FROM short_urls");
$num_urls = mysql_num_rows($query);
while($row = mysql_fetch_array($query)){ $urls[] = $row; }

/** get all members **/
$query2 = mysql_query("SELECT * FROM members");
$num_members = mysql_num_rows($query2);
while($row2 = mysql_fetch_array($query2)){ $members[] = $row2; }

/** delete url **/
if(isset($_GET['task']) && $_GET['task'] == 'delete_url')
{
    /** get url id **/
	$url_id = $_GET['id'];
	
	/** delete url **/
	$short_url->delete_url($url_id, true);
}

/** delete member **/
if(isset($_GET['task']) && $_GET['task'] == 'delete_member')
{
    /** get member id **/
	$member_id = $_GET['id'];
	
	/** if member id is admin, deny delete **/
	if($member_id == '1'){ redirect($url->url_base . '/admin'); exit;}
	
	/** delete member **/
	@mysql_query("DELETE FROM members WHERE id = '".$member_id."' LIMIT 1");
	
	/** delete members urls **/
	@mysql_query("DELETE FROM short_urls WHERE owner = '".$member_id."' LIMIT 1");
	
	/** redirect **/
	redirect($url->url_base . '/admin');
	
	/** exit **/
	exit;
	
}


/** assign smarty variables **/
$smarty->assign('urls', $urls);
$smarty->assign('members', $members);
$smarty->assign('num_urls', $num_urls);
$smarty->assign('num_members', $num_members);

/** include footer **/
include("footer.php");

?>