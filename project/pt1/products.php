<!DOCTYPE html>
<html>
<head>
  <title>My Bike Ordering System : Products</title>
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
    <form action="products.php" method="post">
      Product ID
      <input name="pid" type="text"> <br>
      Name
      <input name="name" type="text"> <br>
      Price
      <input name="price" type="text"> <br>
      Brand
      <select name="brand">
        <option value="Kawasaki">Kawasaki</option>
        <option value="Honda">Honda</option>
        <option value="Suzuki">Suzuki</option>
      </select> <br>
      Condition
      <input name="cond" type="radio" value="New"> New
      <input name="cond" type="radio" value="Used"> Used <br>
      Manufacturing Year
      <select name="year">
        <option value="2013">2013</option>
        <option value="2014">2014</option>
        <option value="2015">2015</option>
      </select> <br>
      Quantity
      <input name="quantity" type="text"> <br>
      <button type="submit" name="create">Create</button>
      <button type="reset">Clear</button>
    </form>
    <hr>
    <table border="1">
      <tr>
        <td>Product ID</td>
        <td>Name</td>
        <td>Price</td>
        <td>Brand</td>
        <td></td>
      </tr>
      <tr>
        <td>P001</td>
        <td>Ninja Zx-14r Abs 30th Anniversary</td>
        <td>15899</td>
        <td>Kawasaki</td>
        <td>
          <a href="products_details.php">Details</a>
          <a href="products.php">Edit</a>
          <a href="products.php">Delete</a>
        </td>
      </tr>
    </table>
  </center>
</body>
</html>