<!DOCTYPE html>
<html>
<head>
  <title>My Bike Ordering System : Staffs</title>
</head>
<body bgcolor="#d4d4dc">
  <center>
    <h3 align ="center"><font color="black" face="verdana" >  
        <a href="index.php "style="color:black;">Home</a> | 
        <a href="products.php "style="color:black;">Products</a> | 
        <a href="customer.php" style="color:black;">Customers</a> | 
        <a href="staffs.php" style="color:black;">Staffs</a> | 
        <a href="orders.php" style="color:black;" >Orders</a></font>
      </h3>
    <hr>
    <form action="staffs.php" method="post">
      Staff ID
      <input name="sid" type="text"> <br>
      First Name
      <input name="fname" type="text"> <br>
      Last Name
      <input name="lname" type="text"> <br>
      Gender
      <input name="gender" type="radio" value="Male"> Male
      <input name="gender" type="radio" value="Female"> Female <br>
      Phone Number
      <input name="phone" type="text"> <br>
      Email Address
      <input name="email" type="text"> <br>
      <button type="submit" name="create">Create</button>
      <button type="reset">Clear</button>
    </form>
    <hr>
    <table border="1">
      <tr>
        <td>Staff ID</td>
        <td>First Name</td>
        <td>Last Name</td>
        <td>Gender</td>
        <td>Phone Number</td>
        <td>Email Address</td>
        <td></td>
      </tr>
      <tr>
        <td>S001</td>
        <td>Larry</td>
        <td>Bay</td>
        <td>Male</td>
        <td>013-3922010</td>
        <td>larry.bay@bike.com</td>
        <td>
          <a href="staffs.php">Edit</a>
          <a href="staffs.php">Delete</a>
        </td>
      </tr>
      <tr>
        <td>S002</td>
        <td>James</td>
        <td>Martin</td>
        <td>Male</td>
        <td>019-8321266</td>
        <td>james.martin@bike.com</td>
        <td>
          <a href="staffs.php">Edit</a>
          <a href="staffs.php">Delete</a>
        </td>
      </tr>
    </table>
  </center>
</body>
</html>