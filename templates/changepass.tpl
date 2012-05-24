{include file="header.tpl"}
 <div id="subpage">
    <h1>Change Password</h1>
	<p id="links"><a href="{$url->url_base}/account/home">My URLs</a> | <a href="{$url->url_base}/account/changepass">Change Password</a>{if isset($smarty.session.is_admin)} | <a href="{$url->url_base}/admin">Site Admin</a>{/if}</p>
    <div id="login" class="clearfix">
	{if $error == '1'}<center><span style="color:red;">{$error_message}</span></center>{/if}
	{if $success == '1'}<center><span style="color:green;">Password Has Been Successfully Updated.</span></center>{/if}
      <form action="{$url->url_base}/account/changepass" method="post">
        <label for="current_pass">Current Password</label>
        <input name="current_pass" id="current_pass" size="30" type="password" />
        <label for="new_pass">New Password</label>
        <input name="new_pass" id="new_pass" size="30" type="password" />
		<label for="new_pass2">Confirm New Password</label>
        <input name="new_pass2" id="new_pass2" size="30" type="password" />
        <hr>
        <input value="Change Password" type="submit" />
        <input type="hidden" name="task" value="changepass" />
      </form>
    </div>
  </div>
  <div class="divider"></div>
