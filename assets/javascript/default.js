/** set vars **/
var urllink;
var relink;
var addthis_config = {data_use_flash: false, data_use_cookies: false}
var addthis_share = {templates: {blogger: '{{lurl}}', twitter: '{{lurl}}', typepad: '{{lurl}}', wordpress: '{{lurl}}'}}
ZeroClipboard.setMoviePath('assets/flash/zeroclipboard.swf');
var clip = new ZeroClipboard.Client();
clip.setHandCursor(true);

/** format functions **/
function changeFormat(type)
{
    type = jQuery.trim(type).toLowerCase();
	switch (type)
	{
		case 'forum':
	    relink = '[URL]' + urllink + '[/URL]';
		break;
		case 'html':
	    relink = '<a href="' + urllink + '" />' + urllink + '</a>';
		break;
	    default:
		relink = urllink;
	}
    $('#link').val(relink);
    clip.setText(relink);
}

$('.label').live('click', function(){
$('.radio').removeClass('on');
$(this).prev('.radio').addClass('on');
changeFormat($(this).text());
});

$('.radio').live('click', function(){
$('.radio').removeClass('on');
$(this).addClass('on');
changeFormat($(this).next('.label').text());
});


/** check if username is available **/
function check_username(doc)
{
    $.get("register.php", { task: 'checkUsername',  username: doc.value },
    function(data){ $("#result").html(data) });
}

/** fancybox setup **/
$(document).ready(function() 
{
    $("a.iframe").fancybox({ 'hideOnContentClick': true }); 
}); 