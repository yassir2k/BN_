$(document).ready(function()
{
	$('input#submitBnForm').click(function(){
												if( $('input#availCode').val() == "")
												{
													$('font#av_font').css('color','#f00');
													$('font#av_font').attr('title',"Availability code missing");
												}
												if( $('input#receiptNo').val() == "")
												{
													$('font#rec_font').css('color','#f00');
													$('font#rec_font').attr('title',"Receipt Number not provided");
												}
												if( $('input#datePaid').val() == "")
												{
													$('font#date_font').css('color','#f00');
													$('font#date_font').attr('title',"Date  missing");
												}
												if( $('input#approvedName').val() == "")
												{
													$('font#appr_font').css('color','#f00');
													$('font#appr_font').attr('title',"Approved name missing");
												}
												if( $('input#streetAddress').val() == "")
												{
													$('font#str_font').css('color','#f00');
													$('font#str_font').attr('title',"Street Address not provided");
												}
												if( $('select#state').val() == "")
												{
													$('font#st_font').css('color','#f00');
													$('font#st_font').attr('title',"State not chosen");
												}
												if( $('select#stateCode').val() == "")
												{
													$('font#os_font').css('color','#f00');
													$('font#os_font').attr('title',"Originating State not chosen");
												}
												if( $('select#lga').val() == "")
												{
													$('font#lga_font').css('color','#f00');
													$('font#lga_font').attr('title',"Local Government Area not chosen");
												}
												if( $('input#town').val() == "")
												{
													$('font#town_font').css('color','#f00');
													$('font#town_font').attr('title',"Town not provided.");
												}
												if( $('select#bnObject1').val() == "")
												{
													$('font#fbo_font').css('color','#f00');
													$('font#fbo_font').attr('title',"First Business Object not chosen");
												}
												<!-- Now The Unchecking Part-->
												if( $('input#availCode').val() != "")
												{
													$('font#av_font').css('color','#333');
													$('font#av_font').attr('title','');
												}
												if( $('input#receiptNo').val() != "")
												{
													$('font#rec_font').css('color','#333');
													$('font#rec_font').attr('title','');
												}
												if( $('input#datePaid').val() != "")
												{
													$('font#date_font').css('color','#333');
													$('font#date_font').attr('title','');
												}
												if( $('input#approvedName').val() != "")
												{
													$('font#appr_font').css('color','#333');
													$('font#appr_font').attr('title','');
												}
												if( $('input#streetAddress').val() != "")
												{
													$('font#str_font').css('color','#333');
													$('font#str_font').attr('title','');
												}
												if( $('select#state').val() != "")
												{
													$('font#st_font').css('color','#333');
													$('font#st_font').attr('title','');
												}
												if( $('select#stateCode').val() != "")
												{
													$('font#os_font').css('color','#333');
													$('font#os_font').attr('title','');
												}
												if( $('select#lga').val() != "")
												{
													$('font#lga_font').css('color','#333');
													$('font#lga_font').attr('title','');
												}
												if( $('input#town').val() != "")
												{
													$('font#town_font').css('color','#333');
													$('font#town_font').attr('title','');
												}
												if( $('select#bnObject1').val() != "")
												{
													$('font#fbo_font').css('color','#333');
													$('font#fbo_font').attr('title','');
												}
					if( ($('select#bnObject1').val() == "")|| ($('input#town').val() == "") || ($('select#lga').val() == "") 
					|| ($('select#state').val() == "")	|| ($('input#streetAddress').val() == "") || ($('input#approvedName').val() == "")
					|| ($('input#datePaid').val() == "")|| ($('input#receiptNo').val() == "") || ($('input#availCode').val() == "") 
					||($('select#stateCode').val() == ""))
					                            {
													return false;
												}
												else
												{
													if (confirm("Are you sure you want to submit & proceed?"))
													{
														var d = $('input#approvedName').val();
														d = encodeURIComponent(d.replace(/&amp;/g, "&"));
														var f = $('input#streetAddress').val();
														f = encodeURIComponent(f.replace(/&amp;/g, "&"));
														var i = $('input#town').val();
														i = encodeURIComponent(i.replace(/&amp;/g, "&"));
														var j = $('select#bnObject1').val();
														j = encodeURIComponent(j.replace(/&amp;/g, "&"));
														var k = $('select#bnObject2').val();
														k = encodeURIComponent(k.replace(/&amp;/g, "&"));
														var l = $('select#bnObject3').val();
														l = encodeURIComponent(l.replace(/&amp;/g, "&"));
													var dat = "a="+$('input#availCode').val()+"&b="+$('input#receiptNo').val()+
														"&c="+$('input#datePaid').val()+"&d="+d+
														"&f="+f+"&g="+$('select#state').val()+"&h="+$('select#lga').val()+
														"&i="+i+"&j="+j+"&k="+k+"&l="+l+"&m="+$('select#stateCode').val();
														$('#hoto').html('<img src="images/ajax-loader.gif"/>');
														$.ajax(
														{
															   type: "POST",
															   url: "insert_company.php",
															   data: dat,
															   success: function(msg){  
															   $('#hoto').ajaxComplete(function(event, request, settings)
															   {
														if(msg == 'Message Successfully Sent')
														{
															$("#displayer").load('partner_page.php?avc='+$('input#availCode').val());
														} 
														else 
														{ 
															$("#hoto").html('');
															$("#hoto").html("<font color=red><b style='font-size:12px'>" + msg + "</b></font>");
														}
															   });
															   }
															   
														 });
													}
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