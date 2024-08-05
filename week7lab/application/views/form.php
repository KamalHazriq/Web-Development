<!DOCTYPE html>
<html>
<head>
<meta>
  <title><?php echo $title; ?></title>

   <style>
    body {
      background-color: #d4d4dc;
      color: #000000;
      margin-top: 50px; /* Adding margin on top */
      text-align: center; /* Centering the content */
      font-weight: bold; /* Making all text bold */
    }

    form {
      display: inline-block; /* Ensuring the form stays inline */
      text-align: left; 
    }

    textarea {
      vertical-align: top; /* Aligning the top of the textarea with other form elements */
    }
  </style>

</head>
  
<body bgcolor="#d4d4dc" text="#000000">

  <a href="https://lrgs.ftsm.ukm.my/users/a189646/#" style="position: fixed;top: 10px; left: 10px; padding: 10px; background: linear-gradient(to bottom, #ff0000, #ffcc00); color: #000000; font-weight: bold; text-decoration: none; cursor: pointer;">Landing Page</a>

  <a href="https://lrgs.ftsm.ukm.my/users/a189646/week7lab/myguestbook" style=" position: fixed; top: 70px; left: 10px;  padding: 10px; background: linear-gradient(to bottom, #ff0000, #ffcc00); color: #000000; font-weight: bold; text-decoration: none; cursor: pointer; position: fixed;">Main Menu</a>
  
<?php echo validation_errors(); ?>
<form name="form1" method="post" action="">
  Nama : &nbsp;
  <input type="text" name="name" size="40">
  <br><br>
  Email : &nbsp;
  <input type="text" name="email" size="25">
  <br><br>
  Catatan :
  <textarea name="comment" cols="30" rows="8"></textarea>
  <br><br> 
  <input type="hidden" name="form-submitted" value="add" />
  <input type="submit" name="Submit" value="Add a New Comment">
  <input type="reset">
  <br><br>
</form>
</body>
</html>