<!DOCTYPE html>
<html>
<head>
  <title>My Bike Ordering System : Customers</title>
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
    <form action="customers.php" method="post">
      Customer ID
      <input name="cid" type="text"> <br>
      First Name
      <input name="fname" type="text"> <br>
      Last Name
      <input name="lname" type="text"> <br>
      Gender
      <input name="gender" type="radio" value="Male"> Male
      <input name="gender" type="radio" value="Female"> Female <br>
      Phone Number
      <input name="phone" type="text"> <br>
      <button type="submit" name="create">Create</button>
      <button type="reset">Clear</button>
    </form>
    <hr>
    <table border="1">
      <tr>
        <td>Customer ID</td>
        <td>First Name</td>
        <td>Last Name</td>
        <td>Gender</td>
        <td>Phone Number</td>
        <td></td>
      </tr>
      <tr>
        <td>C001</td>
        <td>Maria</td>
        <td>Garcia</td>
        <td>Female</td>
        <td>019-2849132</td>
        <td>
          <a href="customers.php">Edit</a>
          <a href="customers.php">Delete</a>
        </td>
      </tr>
      <tr>
        <td>C002</td>
        <td>Antonio</td>
        <td>Goldman</td>
        <td>Male</td>
        <td>011-7226581</td>
        <td>
          <a href="customers.php">Edit</a>
          <a href="customers.php">Delete</a>
        </td>
      </tr>
    </table>
  </center>
</body>
</html>