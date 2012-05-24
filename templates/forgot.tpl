{include file="header.tpl"}
 <div id="subpage">
    <h1>Forgot Password</h1>
    <div id="login" class="clearfix">
  {if $error == '1'}<center><span style="color:red;">{$error_message}</span></center>{/if}
      <form action="{$url->url_base}/account/forgot" method="post">
        <label for="username">Username</label>
        <input name="username" id="username" size="30" type="text" />
        <hr>
        <input name="forgot" value="Retrieve Password &raquo;" type="submit" />
	<p>After you press "Retrieve Password", a new password will be emailed to you.</p>
      </form>
     <script type="text/javascript">{literal} $(document).ready(function(){ $("#username").focus(); }); {/literal}</script>
    </div>
  </div>
  <div class="divider"></div>