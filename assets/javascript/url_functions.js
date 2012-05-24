/** shorten url function **/
function shorten_url()
{
	$('#response').slideUp('slow');
	$('#submit').val('Please Wait..').attr('disabled', 'disabled').animate({width: '150px'}, 1500).css({background: '#6182a1', color: '#f5f5f5', border: 'none'});

    $.post("shorten.php", { task: 'shorten',  url: $("#url").val() },
    function(response)
	{
	   $('#response').html(response).slideDown('slow').show();
	   $('#submit').attr('disabled', '').val('Shorten').animate({width: '72px'}, 1500).css({background: '#6182a1', color: '#f5f5f5', border: 'none'});
	   $("#url").val('')
		urllink = $('#link').val();
		clip.glue('copy');
		clip.setText(urllink);
		$('#submit').val('Shorten');
	});
}