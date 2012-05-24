{include file="header.tpl"}
  <form id="shorten_url" name="shorten_url" class="clearfix" method="post" action="javascript:shorten_url();">
    <input id="url" type="text" name="url" value="" />
    <input id="submit" type="submit" name="submit" onclick="this.blur();" value="{$lang.eng.2}" />
  </form>
  <div id="response" class="clearfix"><a id="copy"></a></div>
  <div class="divider"></div>
  <script type="text/javascript">{literal} jQuery(document).ready(function($){ $("#url").focus(); }); {/literal}</script>
