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
/*------------------------------------------END OF LLC JS-----------------------------------------*/
$(document).ready(function()
{
	$('table#verificationTbl td a.edit_entries').click(function()
	{
		var gif = $("#entries");
		gif.html('<img src="images/ajax-loader.gif"/>');
		var id = $(this).parent().parent().attr('id');
		$("#entries").load("invoke_entries.php?id="+id);
	});
	
	$('table#verificationTbl td a.edit_partners').click(function()
	{
		var gif = $("#entries");
		gif.html('<img src="images/ajax-loader.gif"/>');
		var id = $(this).parent().parent().attr('name');
		$("#entries").load("invoke_partners.php?avc="+id);
	});
	
	$('table#verificationTbl td a.edit_corp_partners').click(function()
	{
		var gif = $("#entries");
		gif.html('<img src="images/ajax-loader.gif"/>');
		var id = $(this).parent().parent().attr('name');
		$("#entries").load("invoke_corporate.php?avc="+id);
	});

	$('input#addPartner').click(function()
	 { 
		  $('#show').load("new_partner.php?id=" + $('input#avCode').val());
	 });
	
	$('#closeForm').click(function()
	 { 
		  $('#base').fadeOut("slow");
		  return false;
	 });
});