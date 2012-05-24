{include file="header.tpl"}
<form id="shorten_url" name="shorten_url" class="clearfix" method="post" action="shorten.php">
  <input id="url" type="text" name="url" value="" />
  <input id="submit" type="submit" name="submit" onclick="this.blur();" value="{$lang.eng.2}" />
  <input type="hidden" name="task" value="shorten" />
</form>
<div id="response" class="clearfix"> 
{if $is_error == '1'}
  <div id="error">{$error_message}</div>
  {elseif $is_success == '1'}
  <center>
    <input id="link" readonly="readonly" onClick="this.select();" value="{$short_url}" type="text">
    <input id="oldLink" value="{$short_url}" type="hidden">
  </center>
  <div id="buttons"><input type="button" class="button" value="Share" onClick="return addthis_open(this, 'more', '{$short_url}', '{$short_url}')"><span id="saveButton"><input type="button" class="button" value="Customize" onClick="customizeLink();" style="width:150px"></span></div>
</div>
{/if}
<div class="divider"></div>
{include file="footer.tpl"} 