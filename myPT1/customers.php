<!DOCTYPE html>
<html>
<head>
  <title>Disney Souvenirs : Customers</title>
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
<form action="customers.php" method="post" align="center">
    <strong>Customer ID</strong>
    <input name="cid" type="text"> <br>
    <strong>Name</strong>
    <input name="name" type="text"> <br>
    <strong>Gender</strong>
    <input name="gender" type="radio" value="Male"> Male
    <input name="gender" type="radio" value="Female"> Female <br>

    <strong>Email</strong>
    <input name="email" type="email" placeholder="name@domain.com" required> <br>

    <strong>Phone Number</strong>
    <input name="phone" type="text"> <br>

  <button type="submit" name="create">Create</button>
  <button type="reset">Clear</button>
</form>

    <hr>
    <table border="1">
      <tr>
        <td>Customer ID</td>
        <td>Customer Name</td>
        <td>Gender</td>
        <td>Email Address</td>
        <td>Phone Number</td>
        <td></td>
      </tr>
      <tr>
        <td>C001</td>
        <td>Haikal Amin</td>
        <td>Male</td>
        <td>ekalicious@gmail.com</td>
        <td>+60123456789</td>
        <td>
          <a href="customers.php">Edit</a>
          <a href="customers.php">Delete</a>
        </td>
      </tr>
      <tr>
        <td>C002</td>
        <td>Zainal Abidi</td>
        <td>Male</td>
        <td>zainal9612@gmail.com</td>
         <td>+60134567890</td>
        <td>
          <a href="customers.php">Edit</a>
          <a href="customers.php">Delete</a>
        </td>
      </tr>
      <tr>
        <td>C003</td>
        <td>Mansur Rahim</td>
        <td>Male</td>
        <td>mansurblitz@gmail.com</td>
        <td>+60145678901</td>
  
        <td>
          <a href="customers.php">Edit</a>
          <a href="customers.php">Delete</a>
        </td>
      </tr>

      <tr>
        <td>C004</td>
        <td>Anis Syuhada</td>
        <td>Female</td>
        <td>syuhsyuh@gmail.com</td>
         <td>+60156789012</td>
        <td>
          <a href="customers.php">Edit</a>
          <a href="customers.php">Delete</a>
        </td>
      </tr>
      <tr>
        <td>C005</td>
        <td>Siti Khadijahh</td>
        <td>Female</td>
        <td>khadijahahaha@gmail.com</td>
         <td>+60167890123</td>
        <td>
          <a href="customers.php">Edit</a>
          <a href="customers.php">Delete</a>
        </td>
      </tr>
    </table>
  </center>
</body>
</html>