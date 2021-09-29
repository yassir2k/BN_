$(document).ready(function()
{
	$('input#copFieldBox').attr('disabled',"disabled");
	$('#copErr').hide();
	$('input#searchCop').attr('disabled',"disabled");
	$('select#optionDrop').change(function()
								  {
									  
									  if( ($('select#optionDrop').val()) != "")
									  {
										  $('input#copFieldBox').attr('disabled','');
										  $('input#searchCop').attr('disabled','');
									  }
									  else
									  {
										  $('input#copFieldBox').attr('disabled',"disabled");
										  $('input#searchCop').attr('disabled',"disabled");
									  }
								  });
	

});

function drawTable(myData)
{
	$('#copErr').hide();
	if( ($('input#copFieldBox').val()) == "" )
	{
		$('#copErr').show();
		return false();
	}
	else
	{
		if( ($('select#optionDrop').val()) == "BN Number")
		//Meaning Search Input Is A Business Name Number
		{
			var num = 0;
			var dat = "search_bn.php?input=" + $('input#copFieldBox').val()+"&option=code";
			$('#partnersTable').html('<img src="images/ajax-loader.gif"/>');
	        var req = getXMLHTTP();
		    if (req)
			 {
			   req.onreadystatechange = function(data)
			   {
				  if (req.readyState == 4)
				  {
					 // only if "OK"
					 if(req.status == 200)
					   {
						  var mine = req.responseText;
						  if(mine == "It is available")
						  {
							  $("#partnersTable").html('');
							  $('#loadPartnersTable').load("bn_table.php?type=code&id=" + $('input#copFieldBox').val()+"&option=code");							  
						  }
						  else
						  {
							  $('#loadPartnersTable').html('');
							  $("#partnersTable").html('');
							  $("#partnersTable").html("<b style='font-size:12px; color:red'>" + mine + "</b>");
						  }
					   } 
				   }
				}
			   req.open("GET", dat, true);
			   req.send();
			 }
		}//End Of If
		else
		{
			var num = 0;
			var dat = "search_bn.php?input=" + $('input#copFieldBox').val()+"&option=name";
			$('#partnersTable').html('<img src="images/ajax-loader.gif"/>');
	        var req = getXMLHTTP();
		    if (req)
			 {
			   req.onreadystatechange = function(data)
			   {
				  if (req.readyState == 4)
				  {
					 // only if "OK"
					 if(req.status == 200)
					   {
						  var mine = req.responseText;
						  if(mine == "It is available")
						  {
							  $("#partnersTable").html('');
							  $('#loadPartnersTable').load("bn_table.php?id=" + $('input#copFieldBox').val()+"&option=name");
						  }
						  else
						  {
							  $('#loadPartnersTable').html('');
							  $("#partnersTable").html('');
							  $("#partnersTable").html("<b style='font-size:12px; color:red'>" + mine + "</b>");
						  }
					   } 
				   }
				}
			   req.open("GET", dat, true);
			   req.send();
			 }
		}
	}
} //End Of Function

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