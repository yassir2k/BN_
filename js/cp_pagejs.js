$(document).ready(function()
{
	$('select#cPartnersNum').change(function()
									  {
										  var num_of_partners = $('select#cPartnersNum').val();
										  var avc = $('input#avc').val();
									$('#displayCPartners').load('corporate_partners_form.php?num_of_partners='+num_of_partners+"&avc="+avc);
									  });
	$('input#finish').click(function()
										   {
											   $('#displayer').load('finished.php?avc='+$('input#avc').val());
										   });
});