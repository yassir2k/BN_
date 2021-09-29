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
			var num = 0;
			var dat = "search_corporate_partners.php?input=" + $('input#copFieldBox').val()+"&option=code";
			$('#CorporatePartnersTable').html('<img src="images/ajax-loader.gif"/>');
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
							  $("#CorporatePartnersTable").html('');
					$('#loadCorporatePartnersTable').load("corporate_partners_table.php?id=" + $('input#copFieldBox').val());
						  }
						  else
						  {
							  $('#loadCorporatePartnersTable').html('');
							  $("#CorporatePartnersTable").html('');
							  $("#CorporatePartnersTable").html("<b style='font-size:12px; color:red'>" + mine + "</b>");
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
			var dat = "search_corporate_partners.php?input=" + $('input#copFieldBox').val()+"&option=name";
			$('#CorporatePartnersTable').html('<img src="images/ajax-loader.gif"/>');
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
							  $("#CorporatePartnersTable").html('');
							  var the = "corporate_partners_table.php?name=" + $('input#copFieldBox').val();
							  the = the.replace(/ /g,"%20");
					$('#loadCorporatePartnersTable').load(the);
						  }
						  else
						  {
							  $('#loadCorporatePartnersTable').html('');
							  $("#CorporatePartnersTable").html('');
							  $("#CorporatePartnersTable").html("<b style='font-size:12px; color:red'>" + mine + "</b>");
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