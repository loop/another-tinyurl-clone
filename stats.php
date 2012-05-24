<?php

/** include header **/
include("header.php");

/** set page name **/
$page = 'stats';

/** get url id **/
$id = $_GET['url'];

/** run query **/
$stats = mysql_fetch_array(mysql_query("SELECT * FROM short_urls WHERE url_id = '".$id."' LIMIT 1"));

/** assign smarty variables **/
$smarty->assign('stats', $stats);

/** include footer **/
include("footer.php");

?>