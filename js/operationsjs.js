function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
    }

$(document).ready(function()
{
	<!-----------------------------------------------Change Of Business Name--------------------------------------------------->
	$('input#conFieldBox').attr('disabled',"disabled");
	$('#conErr').hide();
	$('input#searchCon').attr('disabled',"disabled");
	$('select#bN').change(function()
								  {
									  if( ($('select#bN').val()) != "")
									  {
										  $('input#conFieldBox').attr('disabled','');
										  $('input#searchCon').attr('disabled','');
										  $('#conTblLoad').hide();
									  }
									  else
									  {
										  $('input#conFieldBox').attr('disabled',"disabled");
										  $('input#searchCon').attr('disabled',"disabled");
										  $('#conTblLoad').hide();
									  }
								  });
	$('input#searchCon').click(function()
										{
											$('#conTblLoad').show();
											$('#conErr').hide();
											if( ($('input#conFieldBox').val()) == "" )
											{
												$('#conErr').show();
												return false();
											}
											else
											{
												if( ($('select#bN').val()) == "AV Code")
												//Meaning Search Input Is A Business Name Number
												{
													var dat = "input=" + $('input#conFieldBox').val()+"&flag=avc";
													$('#conTblLoad').html('<img src="images/ajax-loader.gif"/>');
													$.ajax(
													{
													   type: "POST",
													   url: "search_bn_number.php",
													   data: dat,
													   success: function(msg){  
													   $('#conTblLoad').ajaxComplete(function(event, request, settings)
													   {
														 if( (msg.indexOf('@')) != -1)
														  {
				                         $('#conTblLoad').html('<object width = "500" data = "change_of_business_name.php?'+dat+'">');
														  } 
														  else 
														  { 
															 $("#conTblLoad").html('');
															 $("#conTblLoad").html("<b style='font-size:12px; color:red'>" + msg + "</b>");
														  }
														});
													   }
													 });
													
												}
												else
												//Meaning Search Input Is A Company Busines Name
												{
													var dat = "input=" + $('input#conFieldBox').val()+"&flag=rc";
													$('#conTblLoad').html('<img src="images/ajax-loader.gif"/>');
													$.ajax(
													{
													   type: "POST",
													   url: "search_company_rc.php",
													   data: dat,
													   success: function(msg){  
													   $('#conTblLoad').ajaxComplete(function(event, request, settings)
													   {
														 if( (msg.indexOf('@')) != -1)
														  {
				                    $('#conTblLoad').html('<object width = "500" data = "change_of_business_name.php?'+dat+'">');
														  } 
														  else 
														  { 
												$("#conTblLoad").html('');
												$("#conTblLoad").html("<b style='font-size:12px; color:red'>" + msg + "</b>");
														  }
														});
													   }
													 });
												}
											}
										});

	<!------------------------------------------End Of Change Of Business Name------------------------------------------------->
	
	<!------------------------------------------------Change Of Address--------------------------------------------------------> 
	$('input#coaFieldBox').attr('disabled',"disabled");
	$('#coaErr').hide();
	$('input#searchCoa').attr('disabled',"disabled");
	$('select#bCoa').change(function()
								  {
									  if( ($('select#bCoa').val()) != "")
									  {
										  $('input#coaFieldBox').attr('disabled','');
										  $('input#searchCoa').attr('disabled','');
										  $('#coaTblLoad').hide();
									  }
									  else
									  {
										  $('input#coaFieldBox').attr('disabled',"disabled");
										  $('input#searchCoa').attr('disabled',"disabled");
										  $('#coaTblLoad').hide();
									  }
								  });

	$('input#searchCoa').click(function()
										{
											$('#coaTblLoad').show();
											$('#coaErr').hide();
											$("#updateLoad2").hide();
											$('#coaTblLoad').html('<br />');
											if( ($('input#coaFieldBox').val()) == "" )
											{
												$('#coaErr').show();
												return false();
											}
											else
											{
												if( ($('select#bCoa').val()) == "AV Code")
												//Meaning Search Input Is A Business Name Number
												{
													var dat = "input=" + $('input#coaFieldBox').val()+"&flag=avc";
													$('#coaTblLoad').html('<img src="images/ajax-loader.gif"/>');
													$.ajax(
													{
													   type: "POST",
													   url: "search_address_using_av_code.php",
													   data: dat,
													   success: function(msg){  
													   $('#coaTblLoad').ajaxComplete(function(event, request, settings)
													   {
														 if( (msg.indexOf('@')) != -1)
														  {
	                       $('#coaTblLoad').html('<object height="auto" width = "500" data = "change_of_address.php?'+dat+'">');														
														  } 
														  else 
														  { 
												$("#coaTblLoad").html('');
												$("#coaTblLoad").html("<b style='font-size:12px; color:red'>" + msg + "</b>");
														  }
														});
													   }
													 });
												}
												else
												//Meaning Search Input Using RC Number
												{
													var dat = "input=" + $('input#coaFieldBox').val()+"&flag=rc";
													$('#coaTblLoad').html('<img src="images/ajax-loader.gif"/>');
													$.ajax(
													{
													   type: "POST",
													   url: "search_address_using_rc_number.php",
													   data: dat,
													   success: function(msg){  
													   $('#coaTblLoad').ajaxComplete(function(event, request, settings)
													   {
														  if( (msg.indexOf('@')) != -1)
														  {
						$('#coaTblLoad').html('<object height = "200" width = "500" data = "change_of_address.php?'+dat+'">');
														  } 
														  else 
														  { 
															  $("#coaTblLoad").html('');
													          $("#coaTblLoad").html("<b style='font-size:12px; color:red'>" + msg + "</b>");
														  }
														});
													   }
													 });
												}
											}
										});
	<!---------------------------------------------End Of Change Of Address-------------------------------------------------->
	
	<!--------------------------------------------------Change Of Objects---------------------------------------------------->
	$('input#cooFieldBox').attr('disabled',"disabled");
	$('#cooErr').hide();
	$('input#searchCoo').attr('disabled',"disabled");
	$('select#bCoo').change(function()
								  {
									  if( ($('select#bCoo').val()) != "")
									  {
										  $('input#cooFieldBox').attr('disabled','');
										  $('input#searchCoo').attr('disabled','');
										  $("#updateLoad3").html('');
									  }
									  else
									  {
										  $('input#cooFieldBox').attr('disabled',"disabled");
										  $('input#searchCoo').attr('disabled',"disabled");
										  $("#updateLoad3").html('');
									  }
								  });
	$('input#searchCoo').click(function()
										{
											$('#cooErr').hide();
											$("#updateLoad3").hide();
											$('#cooTblLoad').html('<br />');
											if( ($('input#cooFieldBox').val()) == "" )
											{
												$('#cooErr').show();
												return false();
											}
											else
											{
												if( ($('select#bCoo').val()) == "AV Code")
												//Meaning Search Input Is An Availability Code
												{
													var dat = "input=" + $('input#cooFieldBox').val()+"&flag=avc";
													$('#cooTblLoad').html('<img src="images/ajax-loader.gif"/>');
													$.ajax(
													{
													   type: "POST",
													   url: "search_object_using_av_code.php",
													   data: dat,
													   success: function(msg){  
													   $('#cooTblLoad').ajaxComplete(function(event, request, settings)
													   {
														 if( (msg.indexOf('@')) != -1)
														  {
						$('#cooTblLoad').html('<object height = "150" width = "700" data = "change_of_objects.php?'+dat+'">');
														  } 
														  else 
														  { 
												$("#cooTblLoad").html('');
												$("#cooTblLoad").html("<b style='font-size:12px; color:red'>" + msg + "</b>");
														  }
														});
													   }
													 });
												}
												else
												//Meaning Search Input Is A BN RC Number
												{
													var dat = "input=" + $('input#cooFieldBox').val()+"&flag=rc";
													$('#cooTblLoad').html('<img src="images/ajax-loader.gif"/>');
													$.ajax(
													{
													   type: "POST",
													   url: "search_object_using_rc_number.php",
													   data: dat,
													   success: function(msg){  
													   $('#cooTblLoad').ajaxComplete(function(event, request, settings)
													   {
														  if( (msg.indexOf('@')) != -1)
														  {
						$('#cooTblLoad').html('<object height = "150" width = "700" data = "change_of_objects.php?'+dat+'">');
														  } 
														  else 
														  { 
															  $("#cooTblLoad").html('');
													          $("#cooTblLoad").html("<b style='font-size:12px; color:red'>" + msg + "</b>");
														  }
														});
													   }
													 });
												}
											}
										});
	<!----------------------------------------------End Of Change Of Objects------------------------------------------------->
	<!--------------------------------------------------Winding Up Company--------------------------------------------------->
	$('input#wucFieldBox').attr('disabled',"disabled");
	$('#wucErr').hide();
	$('input#searchWuc').attr('disabled',"disabled");
	$('select#bWind').change(function()
								  {
									  if( ($('select#bWind').val()) != "")
									  {
										  $('input#wucFieldBox').attr('disabled','');
										  $('input#searchWuc').attr('disabled','');
										  $('#conTblLoad').hide();
									  }
									  else
									  {
										  $('input#wucFieldBox').attr('disabled',"disabled");
										  $('input#searchWuc').attr('disabled',"disabled");
										  $('#conTblLoad').hide();
									  }
								  });
	<!----------------------------------------------End Of Winding Up Company------------------------------------------------>
	$('fieldset#one').hide();
	$('fieldset#two').hide();
	$('fieldset#three').hide();
	$('fieldset#four').hide();
	$('input#operation_0').change(function()
	 {
		 $('fieldset#one').show();
		 $('fieldset#two').hide();
		 $('fieldset#three').hide();
		 $('fieldset#four').hide();
	 });
	$('input#operation_1').change(function()
	 {
		 $('fieldset#one').hide();
		 $('fieldset#two').show();
		 $('fieldset#three').hide();
		 $('fieldset#four').hide();
	 });
	$('input#operation_2').change(function()
	 {
		 $('fieldset#one').hide();
		 $('fieldset#two').hide();
		 $('fieldset#three').show();
		 $('fieldset#four').hide();
	 });
	$('input#operation_3').change(function()
	 {
		 $('fieldset#one').hide();
		 $('fieldset#two').hide();
		 $('fieldset#three').hide();
		 $('fieldset#four').show();
	 });
});