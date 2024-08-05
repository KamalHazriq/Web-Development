<!DOCTYPE html>
<html>
<head>
  <title>Disney Souvenirs : Products</title>
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
    <form action="products.php" method="post" align="center">
  <strong>Product ID</strong>
  <input name="pid" type="text"> <br>
  <strong>Name</strong>
  <input name="name" type="text"> <br>
  <strong>Price</strong>
  <input name="price" type="text"> <br>
  <strong>Type</strong>
  <select name="type">
    <option value="Action Figures">Action Figures</option>
    <option value="Collectibles">Collectibles</option>
    <option value="Dolls">Dolls</option>
    <option value="Wall Decorations">Wall Decorations</option>
    <option value="Lego">Lego</option>
    <option value="Keepsakes">Keepsakes</option>
    <option value="Pins,Buttons & Patches">Pins, Buttons & Patches</option>
    <option value="Snowglobes">Snowglobes</option>
    <option value="Posters & Prints">Posters & Prints</option>
    <option value="Vinyl Figures">Vinyl Figures</option>
  </select> <br>

  <strong>Color</strong>
  <input name="color" type="text"> <br>

  <strong>Franchise</strong>
  <select name="franchise">
    <option value="Disney">Disney</option>
    <option value="Pixar">Pixar</option>
    <option value="Marvel">Marvel</option>
    <option value="Star Wars">Star Wars</option>
  </select> <br>

  <strong>Stock</strong>
  <input name="stock" type="text"> <br>

  <strong>Description</strong>
  <input name="description" type="text"> <br>

  <button type="submit" name="create">Create</button>
  <button type="reset">Clear</button>
</form>


    <hr>
    <table border="1">
      <tr>
        <td> Product ID </td>
        <td> Name </td>
        <td> Price (RM) </td>
        <td> Franchise </td>
        <td></td>
      </tr>

      <tr>
        <td>AF001</td>
        <td>Luke Skywalker Action Figure</td>
        <td>231.99</td>
        <td>Star Wars</td>
        <td>
          <a href="products_details.php">Details</a>
          <a href="products.php">Edit</a>
          <a href="products.php">Delete</a>
        </td>
      </tr>

      <tr>
        <td>AF002</td>
        <td>Doctor Strange Gallery Diorama</td>
        <td>50.20</td>
        <td>Marvel</td>
        <td>
          <a href="products.php">Edit</a>
          <a href="products.php">Delete</a>
        </td>
      </tr>

      <tr>
        <td>CL001</td>
        <td>Ursula Light-Up Figure</td>
        <td>119.99</td>
        <td>Disney</td>
        <td>
          <a href="products.php">Edit</a>
          <a href="products.php">Delete</a>
        </td>
      </tr>

      <tr>
        <td>CL002</td>
        <td>Black Panther Collectible Mask</td>
        <td>150.99</td>
        <td>Marvel</td>
        <td>
          <a href="products.php">Edit</a>
          <a href="products.php">Delete</a>
        </td>
      </tr>

      <tr>
        <td>DL001</td>
        <td>Anna and Elsa Collector Doll Set</td>
        <td>150.00</td>
        <td>Disney</td>
        <td>
          <a href="products.php">Edit</a>
          <a href="products.php">Delete</a>
        </td>
      </tr>

      <tr>
        <td>KE001</td>
        <td>Star Wars Imperial Medal</td>
        <td>75.00</td>
        <td>Star Wars</td>
        <td>
          <a href="products.php">Edit</a>
          <a href="products.php">Delete</a>
        </td>
      </tr>

      <tr>
        <td>KE002</td>
        <td>AT-M6 Pewter Vehicle</td>
        <td>280.00</td>
        <td>Star Wars</td>
        <td>
          <a href="products.php">Edit</a>
          <a href="products.php">Delete</a>
        </td>
      </tr>

      <tr>
        <td>LG001</td>
        <td>LEGO Darth Vader Helmet</td>
        <td>80.00</td>
        <td>Star Wars</td>
        <td>
          <a href="products.php">Edit</a>
          <a href="products.php">Delete</a>
        </td>
      </tr>

      <tr>
        <td>LG002</td>
        <td>LEGO Mini Disney Castle</td>
        <td>40.00</td>
        <td>Disney</td>
        <td>
          <a href="products.php">Edit</a>
          <a href="products.php">Delete</a>
        </td>
      </tr>

      <tr>
        <td>PB001</td>
        <td>Mike and Sully Monsters, Inc Pin Pals</td>
        <td>25.00</td>
        <td>Pixar</td>
        <td>
          <a href="products.php">Edit</a>
          <a href="products.php">Delete</a>
        </td>
      </tr>

      <tr>
        <td>PP001</td>
        <td>Mickey and Minnie Mouse Deluxe Print</td>
        <td>50.00</td>
        <td>Disney</td>
        <td>
          <a href="products.php">Edit</a>
          <a href="products.php">Delete</a>
        </td>
      </tr>

      <tr>
        <td>VF001</td>
        <td>Loki Cosbaby Bobble-Head</td>
        <td>25.64</td>
        <td>Marvel</td>
        <td>
          <a href="products.php">Edit</a>
          <a href="products.php">Delete</a>
        </td>
      </tr>


    </table>
  </center>
</body>
</html>
