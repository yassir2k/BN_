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

function showEdit(Id)
{
   var gif = $("#show");
   gif.html('<img src="images/ajax-loader.gif"/>');
   var strURL="show_edit.php?id="+Id;
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
	         document.getElementById('show').innerHTML=req.responseText;
	     } 
	 else {
   	   alert("There was a problem while using XMLHTTP:\n" + req.statusText);
	 }
       }
      }
   req.open("GET", strURL, true);
   req.send(null);
   }
}

/*------------------------------------------END OF LLC JS-----------------------------------------*/
$(document).ready(function()
{
	$('table#operationTbl td a.edit').click(function()
	{
		var gif = $("#show");
		gif.html('<img src="images/ajax-loader.gif"/>');
		var id = $(this).parent().parent().attr('id');
		$("#show").load("show_edit.php?id="+id);
	});
	
	
	    $('table#operationTbl td a.delete').click(function()
	    {
			var Id = $(this).parent().parent().attr('id');
	        if (confirm("Are you sure you want to delete this row?"))
	        {
	            var dat = "id=" + Id + "&avc=" + $('input#avCode').val();
	            var parent = $(this).parent().parent();
	            $.ajax(
	            {
	                   type: "POST",
	                   url: "delete_partner.php",
	                   data: dat, 
	                   cache: false,
	                   success: function()
	                   {
	                    parent.fadeOut('slow', function() {$(this).remove();});
	                   }
	             });
	        }
	    });
	
	$('input#addPartner').click(function()
	 { 
		  $('#show').load("new_partner.php?id="+$('input#avCode').val());
	 });
	   					$('#closeForm').click(function()
                     { 
					      $('#base').fadeOut("slow");
						  return false;
					 });
});