<html>
<head>
<title>Sending email using PHP</title>
</head>
<body>
<?php

ini_set("SMTP","smtp.gmail.com");
ini_set("smtp_port","465");

   $to = "lasman007@yahoo.com";
   $subject = "Trial Message";
   $message = "This is simple text message.";

$headers = 'From: lasman007@gmail.com' . "\r\n" .
    'Reply-To: lasman007@yahoo.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

   $retval = mail ($to,$subject,$message,$headers);
   if( $retval == true )  
   {
      echo "Message sent successfully...";
   }
   else
   {
      echo "Message could not be sent...";
	  echo mysql_error();
   }
?>
</body>
</html>