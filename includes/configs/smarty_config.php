<?php

/** paths to smarty directorys **/
$smartypath_template_dir = $_CONFIG['paths']['base'] . '/templates';
$smartypath_compile_dir = $_CONFIG['paths']['base'] . '/cache/templates';
$smartypath_cache_dir = $_CONFIG['paths']['base'] . '/cache/templates';

/** initiate smarty class **/
require($_CONFIG['paths']['base'] . '/includes/smarty/Smarty.class.php');
$smarty = new Smarty();

/** assign smarty directory paths **/
$smarty->template_dir = $smartypath_template_dir;
$smarty->compile_dir = $smartypath_compile_dir;
$smarty->cache_dir = $smartypath_cache_dir;
$smarty->config_dir = $smartypath_config_dir;

?>