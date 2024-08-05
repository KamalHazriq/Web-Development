<!DOCTYPE html>
<html>
<head>
  <title>Disney Souvenirs : Staffs</title>
</head>
<body bgcolor="#d4d4dc">
  <center>
    <h3 align ="center"><font color="black" face="verdana" >  
        <a href="index.php "style="color:black;">Home</a> | 
        <a href="products.php "style="color:black;">Products</a> | 
        <a href="customers.php" style="color:black;">Customers</a> | 
        <a href="staffs.php" style="color:black;">Staffs</a> | 
        <a href="orders.php" style="color:black;" >Orders</a></font>
      </h3>
    <hr>
    <form action="staffs.php" method="post" align="center">
  <strong>Staff ID</strong>
  <input name="sid" type="text"> <br>
  <strong>Name</strong>
  <input name="name" type="text"> <br>
  <strong>Gender</strong>
  <input name="gender" type="radio" value="Male"> Male
  <input name="gender" type="radio" value="Female"> Female <br>

  <strong>Email</strong>
  <input name="email" type="email" placeholder="name@domain.com" required> <br>

  <button type="submit" name="create">Create</button>
  <button type="reset">Clear</button>
</form>

    <hr>
    <table border="1">
       <tr>
        <td>Staff ID</td>
        <td>Staff Name</td>
        <td>Gender</td>
        <td>Email Address</td>
        <td></td>
      </tr>
      <tr>
        <td>DS001</td>
        <td>Camelia</td>
        <td>Female</td>
        <td>camelia@disney.com</td>
        <td>
          <a href="staffs.php">Edit</a>
          <a href="staffs.php">Delete</a>
        </td>
      </tr>
      <tr>
        <td>DS002</td>
        <td>Siti</td>
        <td>Female</td>
        <td>siti@disney.com</td>
        <td>
          <a href="staffs.php">Edit</a>
          <a href="staffs.php">Delete</a>
        </td>
      </tr>
      <tr>
        <td>DS003</td>
        <td>David Guetta</td>
        <td>Male</td>
        <td>davidguetta@disney.com</td>
        <td>
          <a href="staffs.php">Edit</a>
          <a href="staffs.php">Delete</a>
        </td>
      </tr>
      <tr>
        <td>DS004</td>
        <td>Haziq</td>
        <td>Male</td>
        <td>haziq@disney.com</td>
        <td>
          <a href="staffs.php">Edit</a>
          <a href="staffs.php">Delete</a>
        </td>
      </tr>
      <tr>
        <td>DS005</td>
        <td>Muzaffar</td>
        <td>Male</td>
        <td>muzaffar@disney.com</td>
        <td>
          <a href="staffs.php">Edit</a>
          <a href="staffs.php">Delete</a>
        </td>
      </tr>

    </table>
  </center>
</body>
</html>