<!DOCTYPE html>
<html>
<head>
  <title>Disney Souvenirs : Order Details</title>
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
    <strong>Order ID:</strong> OR1<br>
    <strong>Order Date:</strong> 09-09-2023 <br>
    <strong>Staff:</strong> David Guetta <br>
    <strong>Customer:</strong> Siti Khadijahh <br>

    <hr>
    <form action="orders_details.php" method="post">
      Product
      <select name="pid">
    <option value="AF001">Luke Skywalker Action Figure</option>
    <option value="AF002">Doctor Strange Gallery Diorama</option>
    <option value="CL001">Ursula Light-Up Figure</option>
    <option value="CL002">Black Panther Collectible Mask</option>
    <option value="DL001">Anna and Elsa Collector Doll Set</option>
    <option value="KE001">Star Wars Imperial Medal</option>
    <option value="KE002">AT-M6 Pewter Vehicle</option>
    <option value="LG001">LEGO Darth Vader Helmet</option>
    <option value="LG002">LEGO Mini Disney Castle</option>
    <option value="PB001">Mike and Sully Monsters, Inc Pin Pals</option>
    <option value="PP001">Mickey and Minnie Mouse Deluxe Print</option>
    <option value="VF001">Loki Cosbaby Bobble-Head</option>
      </select>

      Quantity
      <input name="quantity" type="text">
      <button type="submit" name="addproduct">Add Product</button>
      <button type="reset">Clear</button>
    </form>
    <hr>
    <table border="1">
      <tr>
        <td><strong>Order Detail ID</strong></td>
        <td><strong>Product</strong></td>
        <td><strong>Quantity</strong></td>
        <td></td>
      </tr>
      <tr>
        <td>OR1</td>
        <td>LEGO Mini Disney Castle</td>
        <td>1</td>
        <td>
          <a href="orders_details.php">Delete</a>
        </td>
      </tr>
      <tr>
        <td>OR1</td>
        <td>Mike and Sully Monsters, Inc Pin Pals</td>
        <td>2</td>
        <td>
          <a href="orders_details.php">Delete</a>
        </td>
      </tr>
    </table>
    <hr>
    <a href="invoice.php" target="_blank">Generate Invoice</a>
  </center>
</body>
</html>