$(document).ready(function()
{
	$('input#submitPartners').click(function()
									  {
										  var temp = $('#hideen_no').val();
										  for(var i=0; i < temp; i++)
										  {
											 if( $('input#name_'+String(i+1)).val() == "")
											 {
												 $('font#pn_'+String(i+1)).css('color','#f00');
												 $('font#pn_'+String(i+1)).attr('title',"Partner's name missing");
											 }
											 if( $('input#fname_'+String(i+1)).val() == "")
											 {
												 $('font#fn_'+String(i+1)).css('color','#f00');
												 $('font#fn_'+String(i+1)).attr('title',"Former name missing");
											 }
											 if( $('select#sex_'+String(i+1)).val() == "")
											 {
												 $('font#ps_'+String(i+1)).css('color','#f00');
												 $('font#ps_'+String(i+1)).attr('title',"Sex not chosen");
											 }
											 if( $('input#occupation_'+String(i+1)).val() == "")
											 {
												 $('font#occ_'+String(i+1)).css('color','#f00');
												 $('font#occ_'+String(i+1)).attr('title',"Occupation not provided");
											 }
											 if( $('select#nationality_'+String(i+1)).val() == "")
											 {
												 $('font#nat_'+String(i+1)).css('color','#f00');
												 $('font#nat_'+String(i+1)).attr('title',"Nationality not chosen");
											 }
											 if( $('select#state_'+String(i+1)).val() == "")
											 {
												 $('font#nsr_'+String(i+1)).css('color','#f00');
												 $('font#nsr_'+String(i+1)).attr('title',"State not chosen");
											 }
											 if( $('select#lga_'+String(i+1)).val() == "")
											 {
												 $('font#nlr_'+String(i+1)).css('color','#f00');
												 $('font#nlr_'+String(i+1)).attr('title',"L.G.A not chosen");
											 }
											 if( $('input#town_'+String(i+1)).val() == "")
											 {
												 $('font#tor_'+String(i+1)).css('color','#f00');
												 $('font#tor_'+String(i+1)).attr('title',"Town not provided");
											 }
											 if( $('input#street_'+String(i+1)).val() == "")
											 {
												 $('font#sa_'+String(i+1)).css('color','#f00');
												 $('font#sa_'+String(i+1)).attr('title',"Street Address not provided");
											 }
											 //Not Empty
											 if( $('input#name_'+String(i+1)).val() != "")
											 {
												 $('font#pn_'+String(i+1)).css('color','#333');
												 $('font#pn_'+String(i+1)).attr('title','');
											 }
											 if( $('input#fname_'+String(i+1)).val() != "")
											 {
												 $('font#fn_'+String(i+1)).css('color','#333');
												 $('font#fn_'+String(i+1)).attr('title','');
											 }
											 if( $('select#sex_'+String(i+1)).val() != "")
											 {
												 $('font#ps_'+String(i+1)).css('color','#333');
												 $('font#ps_'+String(i+1)).attr('title','');
											 }
											 if( $('input#occupation_'+String(i+1)).val() != "")
											 {
												 $('font#occ_'+String(i+1)).css('color','#333');
												 $('font#occ_'+String(i+1)).attr('title','');
											 }
											 if( $('select#nationality_'+String(i+1)).val() != "")
											 {
												 $('font#nat_'+String(i+1)).css('color','#333');
												 $('font#nat_'+String(i+1)).attr('title','');
											 }
											 if( $('select#state_'+String(i+1)).val() != "")
											 {
												 $('font#nsr_'+String(i+1)).css('color','#333');
												 $('font#nsr_'+String(i+1)).attr('title','');
											 }
											 if( $('select#lga_'+String(i+1)).val() != "")
											 {
												 $('font#nlr_'+String(i+1)).css('color','#333');
												 $('font#nlr_'+String(i+1)).attr('title','');
											 }
											 if( $('input#town_'+String(i+1)).val() != "")
											 {
												 $('font#tor_'+String(i+1)).css('color','#333');
												 $('font#tor_'+String(i+1)).attr('title','');
											 }
											 if( $('input#street_'+String(i+1)).val() != "")
											 {
												 $('font#sa_'+String(i+1)).css('color','#333');
												 $('font#sa_'+String(i+1)).attr('title','');
											 }
										  }
										for(var i=0; i < temp; i++)
										{
										if( ($('input#name_'+String(i+1)).val() == "") || ($('input#fname_'+String(i+1)).val() == "")
										||  ($('select#sex_'+String(i+1)).val() == "") || ($('input#occupation_'+String(i+1)).val() == "") 
										||  ($('select#nationality_'+String(i+1)).val() == "") || ($('select#state_'+String(i+1)).val() == "")
										||  ($('select#lga_'+String(i+1)).val() == "") || ($('input#town_'+String(i+1)).val() == "")
										||  ($('input#street_'+String(i+1)).val() == ""))
											 {
												 return false;
											 }
										}
											 var dat = "num=" + temp;
											 for (var i = 0; i < temp; i++)
											 {
			dat = dat +"&a_"+String(i+1)+"="+$('input#name_'+String(i+1)).val() + "&b_"+String(i+1)+"="+$('input#fname_'+String(i+1)).val()
			+ "&c_"+String(i+1)+"="+$('select#sex_'+String(i+1)).val() + "&d_"+String(i+1)+"="+$('input#occupation_'+String(i+1)).val()
			+ "&e_"+String(i+1)+"="+$('select#nationality_'+String(i+1)).val() + "&f_"+String(i+1)+"="+$('select#state_'+String(i+1)).val()
			+ "&g_"+String(i+1)+"="+$('select#lga_'+String(i+1)).val() + "&h_"+String(i+1)+"="+$('input#town_'+String(i+1)).val()
			+ "&i_"+String(i+1)+"="+$('input#street_'+String(i+1)).val();
											 }
											 $('#hoto').html('<img src="images/ajax-loader.gif"/>');
											 dat = dat+"&avc="+$('input#availCode_1').val();
											 $.ajax(
												  {
														 type: "POST",
														 url: "insert_partners.php",
														 data: dat,
														 success: function(msg){  
			                                             $('#hoto').ajaxComplete(function(event, request, settings)
														 {
															 if(msg == 'Data Successfully Saved.')
															 {
														     $("#displayer").load('corporate_partner_page.php?avc='+$('input#availCode_1').val());
															 }
															 else
															 {
																 $("#hoto").html('');
													        $("#hoto").html("'<font color=red><b style='font-size:12px'>" + msg + "</b></font>'");
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