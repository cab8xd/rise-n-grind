<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">   
  <meta http-equiv="X-UA-Compatible" content="IE=edge">  <!-- required to handle IE -->
  <meta name="viewport" content="width=device-width, initial-scale=1">  
  <title>Login</title>
  <!-- Styling -->
  <href rel="stylesheet" href=""css/handler.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <style>
    label { display: block; }
    input, textarea { display:inline-block; font-family:arial; margin: 5px 10px 5px 40px; padding: 8px 12px 8px 12px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; width: 90%; font-size: small; }
    div { margin-left: auto; margin-right: auto; width: 60%; }
    h1 { text-align: center; padding-top: 50px}       
    input[type=submit] { padding:5px 15px; border:0 none; cursor:pointer; border-radius: 5px; }
    input[type=submit]:hover { background-color: #ccceee; }
    .msg { margin-left:40px; font-style: italic; color: red; }    
    html{ height:100%; }
    body{ min-height:100%; padding:0; margin:0; position:relative; }    
    footer { position: absolute; bottom: 0; width: 100%; height: 50px; color: WhiteSmoke; padding: 10px; }
   </style>   
</head>

<body>
<?php
$number_attempt = null;
if (isset($_GET['attempt']))
    {
      echo "number_attempt = " . $_GET['attempt'] . "<br/>";
      $number_attempt = intval($_GET['attempt']);

      if ($number_attempt >= 3)
        echo "Please contact the admin <br/>";
    }
else
      $number_attempt = 0;
?>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="home.php">
        <img src="assets/icons/barista/png/055-paper.png" width="30" height="30" alt="logo">
      </a>
      <a class="navbar-brand" href="home.php">Rise and Grind</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarHome">
        <ul class="navbar-nav ml-auto">
          </li>
          <li class="nav-item">
              <!-- TODO -->
            <a class="nav-link" href="login-handler.php">[About page]
              <span class="sr-only">(current)</span>
            </a>
          </li>
        </ul>
      </div>
  </nav>
<div>  
  <h1 class="my-4 text-center">Login</h1>
  <hr>
   
  <!-- what are form inputs -->
  <!-- who will handle the form submission -->
  <!-- how are the request sent -->
    <form action="login-handler.php" method="post">
      Username: <input type="text" name="name" required autofocus /> <br/>
      Password: <input type="password" name="pwd" required /> <br/>
      <input type="hidden" name="attempt" value="<?php echo $number_attempt ?>" /> 
    <input type="submit" id = "submit" name="btn-submit" value="Submit" class="btn btn-secondary" 
    <?php if ($number_attempt >= 3) { ?> disabled <?php } ?>
    />
    <input type="button" onclick="window.location.href='./sign-up-handler.php'" name="btn-sign-up" value="Sign up" class="btn btn-outline-info""/> 
    <!-- TODO: implement into sign up  -->
  </form> 
  <span class="msg"><?php if (isset($_GET['msg'])) echo $_GET['msg'] ?></span>
</div>

<?php /*static*/ include('footer.html') // TODO: footer ?>

<?php
# If user exists on local database, send user to another page and start sessioon
# otherwise tell user their account doesn't exist / misentered.  
// # TODO - HASHING !! SESSION start
function authenticate()
{
  global $number_attempt;
  require('db-functions.php');
  $results = selectData("users", "username, password_hash");
  /** check if valid login credentials user **/
  foreach ($results as $result){
      echo $result['username'] . ":" . $result['password_hash'] . "<br/>";
      /** redirct user to home if valid credentials **/
      if ( $result['username'] == $_POST['name'] && $result['password_hash'] == $_POST['pwd']){
        // echo "Logged in successfullly! <br/>";
        require('start-session.php');
        setcookie('user', $_POST['name'], time()+36000);
        exit();
      }else{
        echo "Incorrect username or password. Please try again. <br/>";
        $number_attempt = intval($_POST['attempt']) + 1;
      }
  }
}
if(isset($_POST['btn-submit'])) # button clicked. 
    authenticate(); # calls authenticate.
?> 
<!-- <script> NOTE: this function is server side validation which cannot be easily done with this implementation - hence the commenting out our assignment 2 event listener req. 
  // Event listener. 
   document.getElementById("submit").addEventListener("click", handleSubmitEvent, true);

    function handleSubmitEvent() 
    {
        // TODO: Check if password exist.
        alert("Login denied. Please try again.");
    }
</script> -->
  
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    
</body>
</html>