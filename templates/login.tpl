{include file="header.tpl"}
 <div id="subpage">
    <h1>Account Login</h1>
    <div id="login" class="clearfix">
	{if $error == '1'}<center><span style="color:red;">{$error_message}</span></center>{/if}
      <form action="{$url->url_base}/account/login" method="post">
        <label for="username">Username</label>
        <input name="username" id="username" size="30" type="text" />
        <label for="password">Password</label>
        <input name="password" id="password" size="30" type="password" />
        <hr>
        <input name="login" value="Login &raquo;" type="submit" />
        <input name="forgot" value="Forgot Password" type="button" onclick="location.href=('{$url->url_base}/account/forgot');" />
      </form>
     <script type="text/javascript">{literal} $(document).ready(function(){ $("#username").focus(); }); {/literal}</script>
    </div>
  </div>
  <div class="divider"></div>
