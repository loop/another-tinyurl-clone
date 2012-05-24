<style type="text/css">{literal}
table{border-top:1px solid #e5eff8;border-right:1px solid #e5eff8;margin:1em auto;border-collapse:collapse;}
tr.odd td{background:#f7fbff;}
tr.odd .column1{background:#f4f9fe;}
.column1{background:#f9fcfe;}
td{color:#678197;border-bottom:1px solid #e5eff8;border-left:1px solid #e5eff8;padding:.3em 1em;text-align:center;}	
th{font-weight:normal;color:#678197;text-align:left;border-bottom:1px solid #e5eff8;border-left:1px solid #e5eff8;padding:.3em 1em;}	
thead th{background:#f4f9fe;text-align:center;font:bold 1.2em/2em inherit;color:#66a3d3;}	
td a{color:#678197;text-decoration:none;outline:none;}
td a:hover{color:#678197;text-decoration:underline;}
td img{outline:none;border:none;vertical-align:middle;}
#footer{width:auto;padding:0 5px;margin-bottom:10px;text-align:center;}
#footer span#copyright{margin-left:0;}
#footer span{margin-bottom:3px;color:#555a53;font:11px arial;}
#footer span.light{color:#c6c6c6;}
#footer span a{color:#6182a1;font:inherit;text-decoration:none;}
#footer span a:hover{text-decoration:underline;}
</style>{/literal}
  <table align="center" width="250">
    <thead>
      <tr class="odd">
        <th scope="col">Link ID</th>
	    <th scope="col">Link Hits</th>
      </tr>
    </thead>
    <tbody>
    <tr class="{cycle values="even,odd"}">
      <td>{$stats.url_id}</td>
	  <td>{$stats.url_hits}</td>
    </tr>
    </tbody>
  </table>
</div>