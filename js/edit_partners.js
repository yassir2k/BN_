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
		if( ($('select#optionDrop').val()) == "AV Code")
		//Meaning Search Input Is A Business Name Number
		{
			var dat = "search_partners.php?input=" + $('input#copFieldBox').val()+"&option=avc";
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
							  $('#loadPartnersTable').load("partners_table.php?id=" + $('input#copFieldBox').val()+"&flag=avc");
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
		<!------------------------------------------------------------Second IF-------------------------------------------->
		if( ($('select#optionDrop').val()) == "BN Number")
		//Meaning Search Input Is A Business Name Number
		{
			var dat = "search_partners.php?input=" + $('input#copFieldBox').val()+"&option=RC";
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
						  if(mine == "RC is available")
						  {
							  $("#partnersTable").html('');
							  var tBox = $('input#copFieldBox').val();
							  tBox = encodeURIComponent(tBox.replace(/&amp;/g, "&"));
							  $('#loadPartnersTable').load("partners_table.php?id=" + tBox +"&flag=RC");
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