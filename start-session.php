<?php
session_start();    // make sessions available
// Session data are accessible from an implicit $_SESSION global array variable
// after a call is made to the session_start() function.
?>
<!DOCTYPE html>
<html>

<?php
/* set up session */
if ($_SERVER['REQUEST_METHOD'] == "POST" && strlen($_POST['name']) > 0)
{
   $user = trim($_POST['name']);
   $pwd = trim($_POST['pwd']);

   // set session attributes
   $_SESSION['user'] = $user;

   $hash_pwd = $pwd; // TODO: fix hashing
//         $hash_pwd = md5($pwd);
//          $hash_pwd = password_hash($pwd, PASSWORD_DEFAULT);
//          $hash_pwd = password_hash($pwd, PASSWORD_BCRYPT);

   $_SESSION['pwd'] = $hash_pwd;
   // redirect the browser to another page using the header() function to specify the target URL
   header("Location:http://localhost/my-project/webPl-project/webPL/home.php");   

}
?>
<html>
<body>