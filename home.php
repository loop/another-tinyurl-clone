<?php 

/** start sessions **/
@session_start();

/** include header **/
include("header.php");

/** set page name **/
$page = 'home';

/** set page title **/
$page_title = 'Member Home';

/** check if user is logegd in **/
if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != true){ redirect($url->url_base . '/account/login'); }

/** get all users urls **/
$query = mysql_query("SELECT * FROM short_urls WHERE owner = '".$userid."'");
$num_urls = mysql_num_rows($query);
while($row = mysql_fetch_array($query)){ $urls[] = $row; }

/** delete url **/
if(isset($_GET['task']) && $_GET['task'] == 'delete_url')
{
    /** get url id **/
	$url_id = $_GET['id'];
	
	/** delete url **/
	$short_url->delete_url($url_id);
}

/** assign smarty variables **/
$smarty->assign('urls', $urls);
$smarty->assign('num_urls', $num_urls);

/** include footer **/
include("footer.php");

?>