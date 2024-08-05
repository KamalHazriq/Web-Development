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
  <tr>
  <td bgcolor="#feda6a" width="200" height="600">
       <object name="menu" type="text/html" data="menu.html" height="600" /> 
    </td>
    <td width="*" valign="top">


     <form method="post" action="insert.php">
  Nama :
  <input type="text" name="name" size="40" required>
  <br>
  Email :
  <input type="email" name="email" size="25" required>
  <br>

  
   How did you find me?
  <select name="how" required>
    <option value="From a friend">From a friend</option>
    <option value="I googled you">I googled you</option>
    <option value="Just surf on in">Just surf on in</option>
    <option value="From your Facebook">From your Facebook</option>
    <option value="I clicked an ad">I clicked an ad</option>
    </select>
  <br>
  I like your:
  <br>
  <input type="checkbox" name="like1" value="Front page"> Front page
  <br>
  <input type="checkbox" name="like1" value="Form"> Form
  <br>
  <input type="checkbox" name="like1" value="User interface"> User interface

  <br>
  Comments :<br>
  <textarea name="comment" cols="30" rows="8" required></textarea>
  <br>
  <input type="submit" name="add_form" value="Add a New Comment">
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


