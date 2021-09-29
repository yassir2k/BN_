$(document).ready(function()
{
	$('select#partnersNum').change(function()
									  {
										  var num_of_partners = $('select#partnersNum').val();
										  var avc = $('input#avc').val();
										  $('#displayPartners').load('partners_form.php?num_of_partners='+num_of_partners+"&avc="+avc);
									  });
});