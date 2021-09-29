$(document).ready(function()
{
	$('input#closeForm').click(function()
	  {
		  				  $("div#base").fadeOut("slow");
						  return false;
	  });
	$('input#addPartners').click(function()
									  {
											 if( $('input#name').val() == "")
											 {
												 $('font#pn').css('color','#f00');
												 $('font#pn').attr('title',"Partner's name missing");
											 }
											 if( $('input#fname').val() == "")
											 {
												 $('font#fn').css('color','#f00');
												 $('font#fn').attr('title',"Former name missing");
											 }
											 if( $('select#sex').val() == "")
											 {
												 $('font#ps').css('color','#f00');
												 $('font#ps').attr('title',"Sex not chosen");
											 }
											 if( $('input#occupation').val() == "")
											 {
												 $('font#occ').css('color','#f00');
												 $('font#occ').attr('title',"Occupation not provided");
											 }
											 if( $('select#nationality').val() == "")
											 {
												 $('font#nat').css('color','#f00');
												 $('font#nat').attr('title',"Nationality not chosen");
											 }
											 if( $('select#state').val() == "")
											 {
												 $('font#nsr').css('color','#f00');
												 $('font#nsr').attr('title',"State not chosen");
											 }
											 if( $('select#lga').val() == "")
											 {
												 $('font#nlr').css('color','#f00');
												 $('font#nlr').attr('title',"L.G.A not chosen");
											 }
											 if( $('input#town').val() == "")
											 {
												 $('font#tor').css('color','#f00');
												 $('font#tor').attr('title',"Town not provided");
											 }
											 if( $('input#street').val() == "")
											 {
												 $('font#sa').css('color','#f00');
												 $('font#sa').attr('title',"Street Address not provided");
											 }
											 //Not Empty
											 if( $('input#name').val() != "")
											 {
												 $('font#pn').css('color','#333');
												 $('font#pn').attr('title','');
											 }
											 if( $('input#fname').val() != "")
											 {
												 $('font#fn').css('color','#333');
												 $('font#fn').attr('title','');
											 }
											 if( $('select#sex').val() != "")
											 {
												 $('font#ps').css('color','#333');
												 $('font#ps').attr('title','');
											 }
											 if( $('input#occupation').val() != "")
											 {
												 $('font#occ').css('color','#333');
												 $('font#occ').attr('title','');
											 }
											 if( $('select#nationality').val() != "")
											 {
												 $('font#nat').css('color','#333');
												 $('font#nat').attr('title','');
											 }
											 if( $('select#state').val() != "")
											 {
												 $('font#nsr').css('color','#333');
												 $('font#nsr').attr('title','');
											 }
											 if( $('select#lga').val() != "")
											 {
												 $('font#nlr').css('color','#333');
												 $('font#nlr').attr('title','');
											 }
											 if( $('input#town').val() != "")
											 {
												 $('font#tor').css('color','#333');
												 $('font#tor').attr('title','');
											 }
											 if( $('input#street').val() != "")
											 {
												 $('font#sa').css('color','#333');
												 $('font#sa').attr('title','');
											 }
											if( ($('input#name').val() == "") || ($('input#fname').val() == "")
											||  ($('select#sex').val() == "") || ($('input#occupation').val() == "") 
											||  ($('select#nationality').val() == "") || ($('select#state').val() == "")
											||  ($('select#lga').val() == "") || ($('input#town').val() == "")
											||  ($('input#street').val() == ""))
											   {
												   return false;
											   }
											  dat ="&a="+$('input#name').val() + "&b="+$('input#fname').val()
											  + "&c="+$('select#sex').val() + "&d="+$('input#occupation').val()
											  + "&e="+$('select#nationality').val() + "&f="+$('select#state').val()
											  + "&g="+$('select#lga').val() + "&h="+$('input#town').val()
											  + "&i="+$('input#street').val();
											 $('#hoto').html('<img src="images/ajax-loader.gif"/>');
											 dat = dat+"&avc="+$('input#availCode').val();
											 $.ajax(
												  {
														 type: "POST",
														 url: "insert_new_partner.php",
														 data: dat,
														 success: function(msg){  
			                                             $('#hoto').ajaxComplete(function(event, request, settings)
														 {
															 if(msg == 'Data Successfully Saved.')
															 {
														    $("#hoto").html("'<font color=green><b style='font-size:12px'>" +msg+ "</b></font>'");
															 }
															 else
															 {
													        $("#hoto").html("'<font color=red><b style='font-size:12px'>" + msg + "</b></font>'");
															 }
														 });
														 }
														 
												   });
									  });
});

function getLgas(state,index)
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