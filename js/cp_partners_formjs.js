$(document).ready(function()
{
	$('input#cpSubmitPartners').click(function()
									  {
										  var temp = $('#hideen_no').val();
										  for(var i=0; i < temp; i++)
										  {
											 if( $('input#cRC_'+String(i+1)).val() == "")
											 {
												 $('font#crcn_'+String(i+1)).css('color','#f00');
												 $('font#crcn_'+String(i+1)).attr('title',"Corporate RC Number Missing.");
											 }
											 if( $('input#cName_'+String(i+1)).val() == "")
											 {
												 $('font#cn_'+String(i+1)).css('color','#f00');
												 $('font#cn_'+String(i+1)).attr('title',"Corporate Name Missing.");
											 }
											 if( $('input#cRegDate_'+String(i+1)).val() == "")
											 {
												 $('font#crd_'+String(i+1)).css('color','#f00');
												 $('font#crd_'+String(i+1)).attr('title',"Corporate Registration Date Not Entered.");
											 }
											 if( $('select#cState_'+String(i+1)).val() == "")
											 {
												 $('font#csr_'+String(i+1)).css('color','#f00');
												 $('font#csr_'+String(i+1)).attr('title',"Corporate State of Residence Not Provided.");
											 }
											 if( $('select#lga_'+String(i+1)).val() == "")
											 {
												 $('font#clgaor_'+String(i+1)).css('color','#f00');
												 $('font#clgaor_'+String(i+1)).attr('title',"Corporate LGA of Residence Not Chosen");
											 }
											 if( $('input#cTown_'+String(i+1)).val() == "")
											 {
												 $('font#ctor_'+String(i+1)).css('color','#f00');
												 $('font#ctor_'+String(i+1)).attr('title',"Corporate Town of Residence Not Entered.");
											 }
											 if( $('input#cStreet_'+String(i+1)).val() == "")
											 {
												 $('font#csa_'+String(i+1)).css('color','#f00');
												 $('font#csa_'+String(i+1)).attr('title',"Street Address Missing.");
											 }
										  }
										for(var i=0; i < temp; i++)
										{
										if( ($('input#cRC_'+String(i+1)).val() == "") || ($('input#cName_'+String(i+1)).val() == "")
										||  ($('input#cRegDate_'+String(i+1)).val() == "") || ($('select#cState_'+String(i+1)).val() == "") 
										||  ($('select#lga_'+String(i+1)).val() == "") || ($('input#cTown_'+String(i+1)).val() == "")
										||  ($('input#cStreet_'+String(i+1)).val() == ""))
											 {
												 return false;
											 }
										}
											 var dat = "num=" + temp;
											 for (var i = 0; i < temp; i++)
											 {
					dat = dat +"&a_"+String(i+1)+"="+$('input#cRC_'+String(i+1)).val() + "&b_"+String(i+1)+"="+$('input#cName_'+String(i+1)).val()
					+ "&c_"+String(i+1)+"="+$('input#cRegDate_'+String(i+1)).val() + "&d_"+String(i+1)+"="+$('select#cState_'+String(i+1)).val()
					+ "&e_"+String(i+1)+"="+$('select#lga_'+String(i+1)).val() + "&f_"+String(i+1)+"="+$('input#cTown_'+String(i+1)).val()
					+ "&g_"+String(i+1)+"="+$('input#cStreet_'+String(i+1)).val();
											 }
											 $('#cHoto').html('<img src="images/ajax-loader.gif"/>');
											 dat = dat+"&avc="+$('input#availCode_1').val();
											 $.ajax(
												  {
														 type: "POST",
														 url: "insert_corporate_partners.php",
														 data: dat,
														 success: function(msg){  
			                                             $('#cHoto').ajaxComplete(function(event, request, settings)
														 {
															 if(msg == 'Data Successfully Saved.')
															 {
														   $("#displayer").load('finished.php?avc='+$('input#availCode_1').val());
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
function getLgas(state,index)
{
   var strURL="local_government_area.php?state="+state+"&index="+index;
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
	    document.getElementById('loadLga_'+index).innerHTML=req.responseText;
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