<?php
# getting data from form.php
$name = $email = $password = NULL;
$name_msg = $email_msg = $password_msg = NULL;

# check if user has actually tried to submit something. 
if($_SERVER['REQUEST_METHOD']== 'POST'){
    if (!empty($_POST['name']))
        $name = $_POST['name'];
    else
        $name_msg = "Please enter name";
    if (!empty($_POST['emailaddr']))
        $email = $_POST['emailaddr'];
    else 
        $email_msg = "Please enter email";
    if (!empty($_POST['password'])) 
        $password = $_POST['password'];
    else 
        $password_msg = "Please enter password";
    if ($name != NULL && $email != NULL && $password != NULL)
    {
        echo "Thanks for signing up, $name <br/> ";
        echo "We will send a confirmation to $email. <br/>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">   
  <meta http-equiv="X-UA-Compatible" content="IE=edge">  <!-- required to handle IE -->
  <meta name="viewport" content="width=device-width, initial-scale=1">  
  <title>Rise and Grind: Sign-up</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <!-- Styling -->
  <href rel="stylesheet" href=""css/handler.css">
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
<!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="home.html">
        <img src="assets/icons/barista/png/055-paper.png" width="30" height="30" alt="logo">
      </a>
      <a class="navbar-brand" href="home.html">Rise and Grind</a>
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
   
  <!-- News Article Header -->
  <h1 class="my-4 text-center">Sign-up</h1>
  <hr>

  <!-- what are form inputs -->
  <!-- who will handle the form submission -->
  <!-- how are the request sent -->
   
  <!-- TODO: <form action="form.php" method="post"> -->
    <form action = "<?php $_SERVER['PHP_SELF']?>" method ="post">
    <label>Username:</label>
    <input type="text" name="name" 
            value = "<?php if (!empty($_POST['name'])) echo $_POST['name'] # handles previous entered info?>" /> <br/>
    <span class = "msg">
        <?php if (empty($_POST['name'])) echo $name_msg # can display an error message ?>
    </span>

    <label>Email:</label>
    <input type="email" name="emailaddr" /> <br/>
    <span class = "msg">
        <?php if (empty($_POST['emailaddr'])) echo $email_msg # can display an error message ?>
    </span>

    <!-- TODO: further develop front and backend for allowing passwords -->
    <label>Password:</label>
    <input type="password" name="pwd" /> <br/>
    <span class = "msg">
        <?php if (empty($_POST['pwd'])) echo $password_msg # can display an error message ?>
    </span>

    <input type="submit" name="btn-submit" id="submit" value="Submit" class="btn btn-secondary" />
    <input type="button" id="buttonPaddingFix" onclick="window.location.href='./login-handler.php'" value="Already have an account? Sign in" class="btn btn-outline-info""/>
  </form>
</div>
<?php /*static*/ include('footer.html') // TODO: footer ?>
 <!-- TODO: Add padding to buttons. -->
<!-- Event handler: submission feedback -->
<?php

function authenticate_signup(){
  require('db-functions.php');
  $results = selectData("users", "username, password_hash");
  foreach ($results as $result){
    if ($result['username'] == $_POST['name'] ){
      echo "Username already exists. Please try again. <br/>";
      exit();
    }else{
      addUser($_POST['name'], $_POST['pwd']);
      require('start-session.php');
    }
  }
}
if(isset($_POST['btn-submit'])) # button clicked. 
    authenticate_signup(); # calls authenticate.
?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    
</body>
</html>