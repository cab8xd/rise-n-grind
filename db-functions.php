<?php 
function connect_db(){
  $hostname = "localhost:3306";
  $username = "cbaca";
  $password = "stars12345";
  $dbname = "rg_db";

  // DSN (Data Source Name) specifies the host computer for the MySQL database 
  // and the name of the database. If the MySQL database is running on the same server
  // as PHP, use the localhost keyword to specify the host computer

  $dsn = "mysql:host=$hostname;dbname=$dbname";
  $db = ""; 

    /** connect to the database **/
  try 
    {
    //  $db = new PDO("mysql:host=$hostname;dbname=$dbname, $username, $password);
      $db = new PDO($dsn, $username, $password); // creating instance and connection to database
      // dispaly a message to let us know that we are connected to the database 
      // echo "<p>You are connected to the database</p>";
      return $db; 
    }
  catch (PDOException $e)     // handle a PDO exception (errors thrown by the PDO library)
    {
      // Call a method from any object, use the object's name followed by -> and then method's name
      // All exception objects provide a getMessage() method that returns the error message 
      $error_message = $e->getMessage();        
      echo "<p>An error occurred while connecting to the database: $error_message </p>";
    }
  catch (Exception $e)       // handle any type of exception
    {
      $error_message = $e->getMessage();
      echo "<p>Error message: $error_message </p>";
    }
  return $db; 
}
/*************************/
/** get data **/
function selectData($table, $columns="*")
{
   $db = connect_db(); 
   $query = "select $columns from $table";
   $statement = $db->prepare($query); 
   $statement->execute();

   // fetchAll() returns an array for all of the rows in the result set
   $results = $statement->fetchAll();

   // closes the cursor and frees the connection to the server so other SQL statements may be issued 
   $statement->closecursor();
   return $results; 
}

function addUser($name, $password)
{
  $db = connect_db();
  $query = "INSERT INTO users (username, password_hash) VALUES (:name, :pwd)";
  $statement = $db->prepare($query);
  $statement->bindValue(':name', $name);
  $statement->bindValue(':pwd', $password);
  $statement->execute();
  $statement->closeCursor();
}
?>
