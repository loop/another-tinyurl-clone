{include file="header.tpl"}

{if $success != '1'}
<div id="subpage">
    <h1>Account Register</h1>
    <div id="login" class="clearfix">
	{if $error == '1'}<center><span style="color:red;">{$error_message}</span></center>{/if}
      <form action="{$url->url_base}/account/register" method="post" name="register" id="register">
        <label for="username">Username</label>
        <input autocomplete="off" name="username" id="username" size="30" type="text" onChange="javascript:check_username(this);" class="alphanumeric" value="{$smarty.post.username}" />
		<br /><div id="result"></div>
        <label for="password">Password</label>
        <input name="password" id="password" size="30" type="password" />
		<label for="password2">Confirm Password</label>
        <input name="password2" id="password2" size="30" type="password" />
		<label for="email">Email</label>
        <input name="email" id="email" size="30" type="text" value="{$smarty.post.email}" />
		<div id="captcha">{include_php file="captcha.php"}</div><br /><br /><br />
		<label for="terms">I agree to the terms of service</label>
        <input name="terms" id="terms" type="checkbox" value="1" />
        <hr>
        <input name="register" value="Register Account" type="submit" />
      </form>
    </div>
  </div>
  <script type="text/javascript">{literal}
  $('.alphanumeric').alphanumeric(); 
  $(document).ready(function(){ $('#captcha').Captcha(); });
  </script>{/literal}
  <div class="divider"></div>
  
  {else}
  
  <div id="subpage">
    <h1>Account Register</h1>
	<p>Congratulations, your account has been created. You can now login. Your account details have also been emailed to you.</p>
  </div>
  <div class="divider"></div>
  
  {/if}
