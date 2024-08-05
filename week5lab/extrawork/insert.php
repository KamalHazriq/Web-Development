<?php
 
if (isset($_POST['add_form'])) {
 
  include "db.php";
 
  try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
      // Prepare the SQL statement
      $stmt = $conn->prepare("INSERT INTO myguestbook(user, email, postdate, posttime,how, like1, like2, like3,comment) VALUES (:user, :email, :pdate, :ptime,:how, :like1, :like2, :like3, :comment)");
     
      // Bind the parameters
      $stmt->bindParam(':user', $name, PDO::PARAM_STR);
      $stmt->bindParam(':email', $email, PDO::PARAM_STR);
      $stmt->bindParam(':pdate', $postdate, PDO::PARAM_STR);
      $stmt->bindParam(':ptime', $posttime, PDO::PARAM_STR);
      $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
      $stmt->bindParam(':how', $how, PDO::PARAM_STR);
      $stmt->bindParam(':like1', $like1, PDO::PARAM_STR);
      $stmt->bindParam(':like2', $like2, PDO::PARAM_STR);
      $stmt->bindParam(':like3', $like3, PDO::PARAM_STR);
       
      // Give value to the variables
      $name = $_POST['name'];
      $email = $_POST['email'];
      $postdate = date("Y-m-d",time());
      $posttime= date("H:i:s",time());
      $comment = $_POST['comment'];
      $how = $_POST['how'];
      
     if (isset($_POST['like1'])) {
      $like1 = $_POST['like1'];
    } else {
      $like1 = "";
    }

    if (isset($_POST['like2'])) {
      $like2 = $_POST['like2'];
    } else {
      $like2 = "";
    }

    if (isset($_POST['like3'])) {
      $like3 = $_POST['like3'];
    } else {
      $like3 = "";
    }

    
    $stmt->execute();
 
      header("Location:list.php"); "New records created successfully";
      }
 
    catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }
 
    $conn = null;
  }
else {
  echo "Error: You have execute a wrong PHP. Please contact the web administrator.";
  die();
}
 
 ?>