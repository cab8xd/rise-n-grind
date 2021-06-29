<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
  
  <title>PHP form handling</title>    
</head>
<body>

<?php session_start(); // make sessions available ?>
  
  <div class="container">
    <h1>Rise and Grind</h1>     
    Successfully logged out. 
  </div>

<?php
// Set session variables can be removed by specifying their element name to unset() function.
// A session can be completely terminated by calling the session_destroy() function.

if (count($_SESSION) > 0 or count($_COOKIE) > 0)     // Check if there are session variables
{   
   foreach ($_SESSION as $key => $value)
   {
      // Deletes the variable (array element) where the value is stored in this PHP.
      // However, the session object still remains on the server.    	
      unset($_SESSION[$key]);      
   }       
   foreach ($_COOKIE as $key => $value)
   {
     unset($_COOKIE[$key]);
     setcookie($key, '', time()-36000);
   }
   session_destroy();     // complete terminate the session instance

   // redirect with 5 seconds delay
   header('refresh:3; url=login-handler.php'); // TODO: switch to welcome page 
}

?>


</body>
</html>
