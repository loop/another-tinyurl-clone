<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta http-equiv="content-language" content="en-us" />
<meta name="description" content="Another tinyurl clone" />
<meta name="keywords" content="tiny url, clone, url shortner" />
<meta name="robots" content="all" />
<meta name="revisit-after" content="1 Day" />
<base href="{$url->url_base}/" />
<title>{$lang.eng.1} {if $page_title != ''} - {$page_title} {/if}</title>

<link rel="stylesheet" type="text/css" href="./assets/css/reset.css" />
<link rel="stylesheet" type="text/css" href="./assets/css/main.css" />
<link rel="stylesheet" type="text/css" href="./assets/css/fancybox.css" />
<script type="text/javascript" src="./assets/javascript/jquery.js"></script>
<script type="text/javascript" src="./assets/javascript/jquery.alphanumeric.js"></script>
<script type="text/javascript" src="./assets/javascript/jquery.fancybox.js"></script> 
<script type="text/javascript" src="./assets/javascript/zeroclipboard.js"></script>
<script type="text/javascript" src="./assets/javascript/captcha.js"></script>
<script type="text/javascript" src="./assets/javascript/default.js"></script>
<script type="text/javascript" src="./assets/javascript/url_functions.js"></script>
<script type="text/javascript" src="./assets/javascript/preview.js"></script>
</head>
<body>
<div id="wrapper">
<div id="header"> <a id="logo" href="{$url->url_base}/"></a> {if isset($smarty.session.logged_in)} <span id="links"> <a href="{$url->url_base}/">Home</a> | <a href="{$url->url_base}/about">About</a> | <a href="{$url->url_base}/terms">Terms</a> | <a href="{$url->url_base}/api.php?info">API</a> | <a href="{$url->url_base}/account/logout" onclick="return confirm('Logout?');">Logout</a> | <a href="{$url->url_base}/account/home">Account</a> </span> {else} <span id="links"> <a href="{$url->url_base}/">Home</a> | <a href="{$url->url_base}/about">About</a>| <a href="{$url->url_base}/terms">Terms</a> | <a href="{$url->url_base}/api.php?info">API</a> | <a href="{$url->url_base}/account/login">Login</a> | <a href="{$url->url_base}/account/register">Register</a></span> {/if} </div>
<br />
<br />
<br />
<center><a href="{$url->url_base}/"><img border="0" src="./assets/images/logo.png" width="201" height="134" /></a><center>