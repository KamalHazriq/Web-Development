<!DOCTYPE html>
<html>
<head>
  <title>My Bike Ordering System : Orders</title>
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
    <form action="orders.php" method="post">
      Order ID
      <input name="oid" type="text" disabled> <br>
      Order Date
      <input name="orderdate" type="date" disabled> <br>
      Staff
      <select name="sid">
        <option value="S001">Larry Bay</option>
        <option value="S002">James Martin</option>
        <option value="S003">Jennifer Henderson</option>
      </select> <br>
      Customer
      <select name="cid">
        <option value="C001">Maria Garcia</option>
        <option value="C002">Antonio Goldman</option>
        <option value="C003">William Johnson</option>
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
        <td>O5603f03a9349f0.39900158</td>
        <td>09-09-2015</td>
        <td>James Martin</td>
        <td>Maria Garcia</td>
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