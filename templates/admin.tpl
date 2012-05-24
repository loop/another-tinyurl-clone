{include file="header.tpl"}
  <div id="subpage2">
    <h1>Admin</h1>
    <p id="links"><a href="{$url->url_base}/admin">Manage Members</a> | <a href="{$url->url_base}/admin?manage_urls">Manage URLS</a></p>
	{if isset($smarty.get.manage_urls)}
	{if $num_urls != 0}
  <table align="center">
    <thead>
      <tr class="odd">
        <th scope="col">Preview</th>
        <th scope="col">Link</th>
        <th scope="col">Hits</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
    {foreach from=$urls item=urls}
    <tr class="{cycle values="even,odd"}">
	  <td><a href="http://open.thumbshots.org/image.aspx?url={$urls.long_url}" class="preview"><img src="http://open.thumbshots.org/image.aspx?url={$urls.long_url}" alt="" width="44" height="44" /></a></td>
      <td><a href="{$url->url_base}/{$urls.url_id}" target="_blank">{$url->url_base}/{$urls.url_id}</a></td>
      <td>{$urls.url_hits}</td>
      <td><a href="{$url->url_base}/admin?task=delete_url&id={$urls.url_id}" onclick="return confirm('Delete?');"><img src="./assets/images/cross.png" width="16" height="16" alt="Delete" /></a></td>
    </tr>
    {/foreach}
    </tbody>
  </table>
  {else}
  <div id="info">There are currently no urls hosted.</div>
  {/if} 
	{else}
	{if $num_members != 0}
  <table align="center">
    <thead>
      <tr class="odd">
        <th scope="col">Username</th>
        <th scope="col">Email</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
    {foreach from=$members item=members}
    <tr class="{cycle values="even,odd"}">
      <td><a href="{$url->url_base}/{$members.username}" target="_blank">{$members.username}</a></td>
      <td>{$members.email}</td>
      <td><a href="{$url->url_base}/admin?task=delete_member&id={$members.id}" onclick="return confirm('Delete?');"><img src="./assets/images/cross.png" width="16" height="16" alt="Delete" /></a></td>
    </tr>
    {/foreach}
    </tbody>
  </table>
  {else}
  <div id="info">There are currently no members.</div>
	{/if}
	{/if}
  </div>
  <div class="divider"></div>
