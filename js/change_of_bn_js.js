$(document).ready(function()
{
	$('input#submitCon').click(function()
										{
											$('font#conFont2').css('color','#333');
											$('font#conFont2').attr('title','');
											if( ($('input#bnCon').val()) == "")
											{
												$('font#conFont2').css('color','#f00');
												$('font#conFont2').attr('title',"Business Name Filed Cannot Be Left Blank");
												$("#updateLoad1").html('');
												return false;
											}
											else
											{ 
											var dat="";
											if (document.getElementById("bnRCNo"))
											{
												var name = $('input#bnCon').val();
												var n = encodeURIComponent(name.replace(/&amp;/g, "&"));
												dat = "bname=" + n +"&rc=" + $('input#bnRCNo').val()+"&f=1";
											}
											else if (document.getElementById("bnAVC"))
											{
												var name = $('input#bnCon').val();
												var n = encodeURIComponent(name.replace(/&amp;/g, "&"));
												dat = "bname=" + n +"&avc=" + $('input#bnAVC').val()+"&f=2";
											}
											else
											{
												;
											}
													$.ajax(
													{
													   type: "POST",
													   url: "update_company_name.php",
													   data: dat,
													   success: function(msg){  
													   $('#updateLoad1').ajaxComplete(function(event, request, settings)
													   {
														  if( msg == "Confirmed")
														  {
											var text = "Data is successfully saved.";
											$("#updateLoad1").html("<b style='font-size:12px; color:Green'>" + text + "</b>");
														  } 
														  else 
														  {   
										$("#updateLoad1").html("<b style='font-size:12px; color:red'>" + msg + "</b>");
														  }
														});
													   }
													 });
											}
										});
});