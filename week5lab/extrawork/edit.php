<?php
 
if (isset($_GET['id'])) {
 
  include "db.php";
 
  try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
      $stmt = $conn->prepare("SELECT * FROM myguestbook WHERE id = :record_id");
      $stmt->bindParam(':record_id', $id, PDO::PARAM_INT);
      $id = $_GET['id'];
 
      $stmt->execute();
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
 
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
 <!DOCTYPE html>
<html>
<head>
    <title>Week 5 Lab Deliverables</title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body bgcolor= "#d4d4dc">
<table width="100%" border="0" cellpadding="20" cellspacing="1" align="center">
  <tr>
    <td colspan="2" bgcolor="#1d1e22">
      <h1><font color="#feda6a" face="verdana">Week 5 Lab Task</font></h1>
    </td>
  </tr>
  </tr>
  <tr>
  <td bgcolor="#feda6a" width="200" height="600">
       <object name="menu" type="text/html" data="menu.html" height="600" /> 
    </td>
    <td width="*" valign="top">
    <font size="6" face="Lucida Console">Edit <form></form></font>
    <hr>

     <form method="post" action="update.php">
  Nama :
  <input type="text" name="name" size="40" required value="<?php echo $result["user"]; ?>">
  <br>
  Email :
  <input type="email" name="email" size="25" required value="<?php echo $result["email"]; ?>">
  <br>

   How did you find me?
    <select name="how">
        <option value="From a friend" <?php if ($result['how'] === 'From a friend') echo ' selected = "selected"' ?> >From a friend</option>
        <option value="I googled you" <?php if ($result['how'] === 'I googled you') echo ' selected = "selected"' ?> >I googled you</option>
        <option value="Just surf on in" <?php if ($result['how'] === 'Just surf on in') echo ' selected = "selected"' ?> >Just surf on in</option>
        <option value="From your facebook" <?php if ($result['how'] === 'From your facebook') echo ' selected = "selected"' ?> >From your facebook</option>
        <option value="I clicked an ads" <?php if ($result['how'] === 'I clicked an ads') echo ' selected = "selected"' ?> >I clicked an ads</option>
      </select>  
      <br>
      
I like your:

<br>

<input type="checkbox" name="like1" value="Front page" <?php if (strpos($result["like1"], "Front page") !== false) echo "checked"; ?>>Front page

<br>

<input type="checkbox" name="like2" value="Form" <?php if (strpos($result["like2"], "Form") !== false) echo "checked"; ?>>Form

<br>

<input type="checkbox" name="like3" value="User interface" <?php if (strpos($result["like3"], "User interface") !== false) echo "checked"; ?>>User interface

<br>

  Comments :<br>
  <textarea name="comment" cols="30" rows="8" required><?php echo $result["comment"]; ?></textarea>
  <br>
  <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
  <input type="submit" name="edit_form" value="Modify Comment">
  <input type="reset">
  <br>
</form>


    </td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="black" align="center">
      <footer style="color: #feda6a;font-family: Verdana;">
        TP2543 - WEB PROGRAMMING
      </footer>
    </td>

  </tr>
</table>


</body>
</html>


