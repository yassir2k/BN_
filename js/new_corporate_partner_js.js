$(document).ready(function()
{
		   			$('#closeForm').click(function()
                     { 
					      $('#base').fadeOut("slow");
						  return false;
					 });
	$('input#addCorpPartners').click(function()
		  {
			  var temp = $('#hideen_no').val();
				 if( $('input#cRC').val() == "")
				 {
					 $('font#crcn').css('color','#f00');
					 $('font#crcn').attr('title',"Corporate RC Number Missing.");
				 }
				 if( $('input#cName').val() == "")
				 {
					 $('font#cn').css('color','#f00');
					 $('font#cn').attr('title',"Corporate Name Missing.");
				 }
				 if( $('input#cRegDate').val() == "")
				 {
					 $('font#crd').css('color','#f00');
					 $('font#crd').attr('title',"Corporate Registration Date Not Entered.");
				 }
				 if( $('select#cState').val() == "")
				 {
					 $('font#csr').css('color','#f00');
					 $('font#csr').attr('title',"Corporate State of Residence Not Provided.");
				 }
				 if( $('select#lga').val() == "")
				 {
					 $('font#clgaor').css('color','#f00');
					 $('font#clgaor').attr('title',"Corporate LGA of Residence Not Chosen");
				 }
				 if( $('input#cTown').val() == "")
				 {
					 $('font#ctor').css('color','#f00');
					 $('font#ctor').attr('title',"Corporate Town of Residence Not Entered.");
				 }
				 if( $('input#cStreet').val() == "")
				 {
					 $('font#csa').css('color','#f00');
					 $('font#csa').attr('title',"Street Address Missing.");
				 }
                 //The Non Empty Part
				 if( $('input#cRC').val() != "")
				 {
					 $('font#crcn').css('color','#333');
					 $('font#crcn').attr('title',"");
				 }
				 if( $('input#cName').val() != "")
				 {
					 $('font#cn').css('color','#333');
					 $('font#cn').attr('title',"");
				 }
				 if( $('input#cRegDate').val() != "")
				 {
					 $('font#crd').css('color','#333');
					 $('font#crd').attr('title',"");
				 }
				 if( $('select#cState').val() != "")
				 {
					 $('font#csr').css('color','#333');
					 $('font#csr').attr('title',"");
				 }
				 if( $('select#lga').val() != "")
				 {
					 $('font#clgaor').css('color','#333');
					 $('font#clgaor').attr('title',"");
				 }
				 if( $('input#cTown').val() != "")
				 {
					 $('font#ctor').css('color','#333');
					 $('font#ctor').attr('title',"");
				 }
				 if( $('input#cStreet').val() != "")
				 {
					 $('font#csa').css('color','#333');
					 $('font#csa').attr('title',"");
				 }
				if( ($('input#cRC').val() == "") || ($('input#cName').val() == "")
				||  ($('input#cRegDate').val() == "") || ($('select#cState').val() == "") 
				||  ($('select#lga').val() == "") || ($('input#cTown').val() == "")
				||  ($('input#cStreet').val() == ""))
				 {
					 return false;
				 }
				var bb = $('input#cName').val();
				bb = encodeURIComponent(bb.replace(/&amp;/g, "&"));
				var ff = $('input#cTown').val();
				ff = encodeURIComponent(ff.replace(/&amp;/g, "&"));
				var gg = $('input#cStreet').val();
				gg = encodeURIComponent(gg.replace(/&amp;/g, "&"));
				var dat = "&a="+$('input#cRC').val() + "&b="+bb
				+ "&c="+$('input#cRegDate').val() + "&d="+$('select#cState').val()
				+ "&e="+$('select#lga').val() + "&f="+ff+ "&g="+gg;
				 $('#cHoto').html('<img src="images/ajax-loader.gif"/>');
				 dat = dat+"&avc="+$('input#availCode').val();
				 $.ajax(
					  {
							 type: "POST",
							 url: "insert_new_corporate_partners.php",
							 data: dat,
							 success: function(msg){  
							 $('#cHoto').ajaxComplete(function(event, request, settings)
							 {
								 if(msg == 'Data Successfully Saved.')
								 {
								    $("#cHoto").html("'<font color=green><b style='font-size:12px'>" + msg + "</b></font>'");
								 }
								 else
								 {
							        $("#cHoto").html("'<font color=red><b style='font-size:12px'>" + msg + "</b></font>'");
								 }
							 });
							 }
							 
					   });
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