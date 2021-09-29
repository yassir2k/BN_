$(document).ready(function()
{
	$('input#submitCoa').click(function()
									{
										$('font#coaFont1').css('color','#333');
										$('font#coaFont1').attr('title','');
										$('font#coaFont2').css('color','#333');
										$('font#coaFont2').attr('title','');
										if( ($('input#bnStreet').val()) == "")
										{
											$('font#coaFont1').css('color','#f00');
											$('font#coaFont1').attr('title',"Street Address Cannot Be Left Empty");
											
										}
										if( ($('input#bnTown').val()) == "")
										{
											$('font#coaFont2').css('color','#f00');
											$('font#coaFont2').attr('title',"Town Cannot Be Left Empty");
											
										}
										if( ($('input#bnStreet').val()) == "" || ($('input#bnTown').val()) == "")
										{
											return false;
										}
										else
										{ 
											var dat="";
											if (document.getElementById("bnAVC_coa"))
											{
												var s = $('input#bnStreet').val();
												var t = $('input#bnTown').val();
												s = encodeURIComponent(s.replace(/&amp;/g, "&"));
												t = encodeURIComponent(t.replace(/&amp;/g, "&"));
						                        dat = "avc=" + $('input#bnAVC_coa').val() + "&street=" + s + "&town=" + t +
						                        "&lga=" + $('select#lga').val() + "&state=" + $('select#bnState').val()+"&f=av";
											}
											else if (document.getElementById("bnRC_coa"))
											{
												var s = $('input#bnStreet').val();
												var t = $('input#bnTown').val();
												s = encodeURIComponent(s.replace(/&amp;/g, "&"));
												t = encodeURIComponent(t.replace(/&amp;/g, "&"));
						                        dat = "rc=" + $('input#bnRC_coa').val() + "&street=" + s + "&town=" + t +
						                        "&lga=" + $('select#lga').val() + "&state=" + $('select#bnState').val()+"&f=rc";
											}
											else {;}										
												$.ajax(
												{
												   type: "POST",
												   url: "update_company_address.php",
												   data: dat,
												   success: function(msg){  
												   $('#updateLoad2').ajaxComplete(function(event, request, settings)
												   {
													  if( msg == "Confirmed")
													  {
											var text = "Data is successfully saved.";
											$("#updateLoad2").show();
											$("#updateLoad2").html("<b style='font-size:12px; color:Green'>" + text + "</b>");
													  } 
													  else 
													  { 
													      $("#updateLoad2").show();
														  $("#updateLoad2").html('');
														  $("#updateLoad2").html("<b style='font-size:12px; color:red'>" + msg + "</b>");
													  }
													});
												   }
												 });
										}
									});	
});
function getLgas(state)
{
   var strURL="local_government_area.php?state="+state;
   var req = getXMLHTTP();
   if (req)
   {
     req.onreadystatechange = function()
     {
      if (req.readyState == 4)
      {
	 // only if "OK"
	 if (req.status == 200)
         {
	    document.getElementById('loadLga').innerHTML=req.responseText;
	 } else {
   	   alert("There was a problem while using XMLHTTP:\n" + req.statusText);
	 }
       }
      }
   req.open("GET", strURL, true);
   req.send(null);
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