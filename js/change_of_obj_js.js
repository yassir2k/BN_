$(document).ready(function()
{	
	$('input#submitObj').click(function()
									{
										var dat="";
										$("#updateLoad3").hide();
										if (document.getElementById("bnAVCObj1"))
										{
										  if( ($('select#bnAVCObj1').val()) == "")
										  {
											  $('font#cooFont1').css('color','#f00');
											  $('font#cooFont1').attr('title',"Business Object 1 Cannot Be Left Empty");
										  }
										  //Now Checking If Values Aren't Default
										  if( ($('select#bnAVCObj1').val()) != "")
										  {
											  $('font#cooFont1').css('color','#333');
											  $('font#cooFont1').attr('title','');
											  
										  }
									    }
										if (document.getElementById("bnRCObj1"))
										{
										  if( ($('select#bnRCObj1').val()) == "")
										  {
											  $('font#cooFont1').css('color','#f00');
											  $('font#cooFont1').attr('title',"Business Object 1 Cannot Be Left Empty");
										  }
										  //Now Checking If Values Aren't Default
										  if( ($('select#bnRCObj1').val()) != "")
										  {
											  $('font#cooFont1').css('color','#333');
											  $('font#cooFont1').attr('title','');
											  
										  }
									    }
										if( ($('select#bnRCObj1').val()) == "")
										{
											$("#updateLoad3").html('');
											return false;
										}
									    if( ($('select#bnAVCObj1').val()) == "")
										{
											$("#updateLoad3").html('');
											return false;
										}
										else
										{ 
											if (document.getElementById("bnAVCObj1"))
											{
                                                                                           var a = $('select#bnAVCObj1').val();
											   a = encodeURIComponent(a.replace(/&amp;/g, "&"));
                                                                                           var b = $('select#bnObj2').val();
											   b = encodeURIComponent(b.replace(/&amp;/g, "&"));
                                                                                           var c = $('select#bnObj3').val();
											   c = encodeURIComponent(c.replace(/&amp;/g, "&"));
											dat = "avc=" + $('input#cooDetails').val() + "&obj1=" + a +
											"&obj2=" + b + "&obj3=" + c +"&f=1";
											}
											else if (document.getElementById("bnRCObj1"))
											{
                                                                                           var a = $('select#bnRCObj1').val();
											   a = encodeURIComponent(a.replace(/&amp;/g, "&"));
                                                                                           var b = $('select#bnObj2').val();
											   b = encodeURIComponent(b.replace(/&amp;/g, "&"));
                                                                                           var c = $('select#bnObj3').val();
											   c = encodeURIComponent(c.replace(/&amp;/g, "&"));
											dat = "rc=" + $('input#cooDetails').val() + "&obj1=" + a +
											"&obj2=" + b + "&obj3=" + $('select#bnObj3').val()+"&f=2";
											}
											else {;}
												$.ajax(
												{
												   type: "POST",
												   url: "update_company_objects.php",
												   data: dat,
												   success: function(msg){  
												   $('#updateLoad3').ajaxComplete(function(event, request, settings)
												   {
													  if( msg == "Confirmed")
													  {
														  $("#updateLoad3").show();
														  $("#updateLoad3").html('');
														  var text = "Data is successfully saved.";
											$("#updateLoad3").html("<b style='font-size:12px; color:Green'>" + text + "</b>");
													  } 
													  else 
													  { 
													      $("#updateLoad3").show();
														  $("#updateLoad3").html('');
												$("#updateLoad3").html("<b style='font-size:12px; color:red'>" + msg + "</b>");
													  }
													});
												   }
												 });
										}
									});
});