<?php

/** include header **/
include("header.php");

/** see if api info is set **/
if(isset($_GET['info'])) 
{
	/** set page name **/
    $page = 'api_info';
	
	/** include footer **/
	include('footer.php');
}else

/** normal api use **/
if(!isset($_GET['info']))
{
    /** include api class **/
    include("./includes/classes/class_api.php");

    /** initiate new api class **/
    $api = new API();

    /** shorten url **/
    $api->create_url(urldecode($_GET['url']));
}

?>