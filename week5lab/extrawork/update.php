<?php
 
if (isset($_POST['edit_form'])) {
 
  include "db.php";
 
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
    $stmt = $conn->prepare("UPDATE myguestbook SET user = :name, email = :email, how = :how, like1 = :like1, like2 = :like2, like3 = :like3, comment = :comment WHERE id = :record_id");
 
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':how', $how, PDO::PARAM_STR);
    $stmt->bindParam(':like1', $like1, PDO::PARAM_STR);
    $stmt->bindParam(':like2', $like2, PDO::PARAM_STR);
    $stmt->bindParam(':like3', $like3, PDO::PARAM_STR);
    $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
    $stmt->bindParam(':record_id', $id, PDO::PARAM_INT);
       
    $name = $_POST['name'];
    $email = $_POST['email'];
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

    $comment = $_POST['comment'];
    $id = $_POST['id'];
 
    $stmt->execute();
     
    header("Location:list.php");
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