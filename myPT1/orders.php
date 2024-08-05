<!DOCTYPE html>
<html>
<head>
  <title>Disney Souvenirs  : Orders</title>
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
    <form action="orders.php" method="post" align="center">
  <strong>Order ID</strong>
  <input name="oid" type="text" disabled> <br>
  <strong>Order Date</strong>
  <input name="orderdate" type="date" disabled> <br>
  <strong>Staff</strong>
  <select name="sid">
    <option value="DS001">Camelia</option>
    <option value="DS002">Siti</option>
    <option value="DS003">David Guetta</option>
    <option value="DS004">Haziq</option>
    <option value="DS005">Muzaffar</option>
  </select> <br>
  <strong>Customer</strong>
  <select name="cid">
    <option value="C001">Haikal Amin</option>
    <option value="C002">Zainal Abidi</option>
    <option value="C003">Mansur Rahim</option>
    <option value="C004">Anis Syuhada</option>
    <option value="C005">Siti Khadijahh</option>
  </select> <br>
  <button type="submit" name="create">Create</button>
  <button type="reset">Clear</button>
</form>

    <hr>
    <table border="1">
      <tr>
        <td>Order ID</td>
        <td>Order Date</td>
        <td>Staff ID</td>
        <td>Customer ID</td>
        <td></td>
      </tr>
      <tr>
        <td>OR1</td>
        <td>09-09-2023</td>
        <td>David Guetta</td>
        <td>Siti Khadijahh</td>
        <td>
          <a href="orders_details.php">Details</a>
          <a href="orders.php">Edit</a>
          <a href="orders.php">Delete</a>
        </td>
      </tr>
    </table>
  </center>
</body>
</html>