<?php

/** assign global smarty variables **/
$smarty->assign('url', $url);
$smarty->assign('lang', $_LANG);
$smarty->assign('page_title', isset($page_title) ? $page_title : '');
$smarty->assign('error', isset($error) ? $error : '');
$smarty->assign('error_message', isset($error_message) ? $error_message : '');
$smarty->assign('success', isset($success) ? $success : '');

/** display template file **/
$smarty->display("$page.tpl");

/** footer copyright notice - Leave this to show some kind of thanks **/
echo '<div id="footer" class="clearfix"><span id="copyright">Short URLs for everyone!</span></div></div>';

/** display footer **/
$smarty->display("footer.tpl");

?>