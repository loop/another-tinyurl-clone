{include file="header.tpl"}
<div id="subpage2">
  <h1>Member Home</h1>
  <p id="links"><a href="{$url->url_base}/account/home">My Urls</a> | <a href="{$url->url_base}/account/changepass">Change Password</a>{if isset($smarty.session.is_admin)} | <a href="{$url->url_base}/admin">Site Admin</a>{/if}</p>
  {if $num_urls != 0}
  <table align="center">
    <thead>
      <tr class="odd">
	    <th scope="col">Preview</th>
        <th scope="col">Link</th>
        <th scope="col">Stats</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
    {foreach from=$urls item=urls}
    <tr class="{cycle values="even,odd"}">
	  <td><a href="http://open.thumbshots.org/image.aspx?url={$urls.long_url}" class="preview"><img src="http://open.thumbshots.org/image.aspx?url={$urls.long_url}" alt="" width="44" height="44" /></a></td>
      <td><a href="{$url->url_base}/{$urls.url_id}" target="_blank">{$url->url_base}/{$urls.url_id}</a></td>
      <td><a class="iframe" href="{$url->url_base}/stats.php?url={$urls.url_id}"><img src="./assets/images/stats.png" width="16" height="16" alt="Stats" /></a></td>
      <td><a href="{$url->url_base}/account/home?task=delete_url&id={$urls.url_id}" onclick="return confirm('Delete?');"><img src="./assets/images/cross.png" width="16" height="16" alt="Delete" /></a></td>
    </tr>
    {/foreach}
    </tbody>
  </table>
  {else}
  <div id="info">{$lang.eng.3}</div>
  {/if} 
  </div>
<div class="divider"></div>
