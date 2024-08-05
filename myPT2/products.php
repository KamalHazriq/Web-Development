<?php
  include_once 'products_crud.php';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Disney Souvenirs : Products</title>

  <style>
  /* Center the form container and left-align its content */
  body {
    text-align: center;
  }

  form {
    width: 600px; /* Adjust the width as needed */
    margin-left: auto;
    margin-right: auto;
    text-align: center; /* Left-align the form elements */
  }

  table {
    width: 70%; /* Adjust the width as needed */
    margin: 0 auto; /* Center the table on the page */
    border-collapse: collapse; /* Optional: Add border-collapse for a cleaner table look */
  }

  td {
    text-align: left;
    padding: 10px; /* Add padding for better spacing */
  }

   table.form-table td:first-child {
    width: 30%; /* Adjust the width as needed */
  }
</style>

        
</head>
<body bgcolor="#d4d4dc">
  <center>
    <h3 align ="center"><font color="black" face="verdana" >
        <a href="../index.html "style="color:black;">Landing Page</a> |  
        <a href="index.php "style="color:black;">Home</a> | 
        <a href="products.php "style="color:black;">Products</a> | 
        <a href="customers.php" style="color:black;">Customers</a> | 
        <a href="staffs.php" style="color:black;">Staffs</a> | 
        <a href="orders.php" style="color:black;" >Orders</a></font>
      </h3>
    <hr>
    <form action="products.php" method="post" align="center">

     <table align="center"class="form-table"  border="0">
    <tr>
      <td><strong>Product ID :</strong></td>
      <td><input name="pid"  type="text" style="width: 250px;" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_id']; ?>"></td>
    </tr>
    <tr>
      <td><strong>Name :</strong></td>
      <td><input name="name" type="text" style="width: 250px;" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_name']; ?>"></td>
    </tr>
    <tr>
      <td><strong>Price :</strong></td>
      <td><input name="price" type="text" style="width: 250px;" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_price']; ?>"></td>
    </tr>
    <tr>
      <td><strong>Type :</strong></td>
      <td>
    <select name="type" style="width: 257px;">
    <option value="Action Figures" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Action Figures") echo "selected"; ?>>Action Figures</option>
    <option value="Collectibles" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Collectibles") echo "selected"; ?>>Collectibles</option>
    <option value="Dolls" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Dolls") echo "selected"; ?>>Dolls</option>
    <option value="Wall Decorations" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Wall Decorations") echo "selected"; ?>>Wall Decorations</option>
    <option value="Lego" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Lego") echo "selected"; ?>>Lego</option>
    <option value="Keepsakes" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Keepsakes") echo "selected"; ?>>Keepsakes</option>
    <option value="Pins,Buttons & Patches" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Pins,Buttons & Patches") echo "selected"; ?>>Pins, Buttons & Patches</option>
    <option value="Snowglobes" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Snowglobes") echo "selected"; ?>>Snowglobes</option>
    <option value="Posters & Prints" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Posters & Prints") echo "selected"; ?>>Posters & Prints</option>
    <option value="Vinyl Figures" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Vinyl Figures") echo "selected"; ?>>Vinyl Figures</option>
    </select>

 </td>
    </tr>
    <tr>
      <td><strong>Color :</strong></td>
      <td>
            <?php
            $colorOptions = array("Cream", "Rose Gold", "Blue", "Red", "Black", "Orange", "Brown","White", "Purple","Silver","Yellow","Green","Gray","Gold", "Pink");
            ?>
            <?php foreach ($colorOptions as $colorOption) { ?>
            <input type="checkbox" name="color[]" value="<?php echo $colorOption; ?>" <?php if (isset($_GET['edit']) && in_array($colorOption, $selectedColors)) echo "checked"; ?>><?php echo $colorOption; ?>
            <?php } ?>
      </td>
    </tr>
    <tr>
      <td><strong>Franchise :</strong></td>
      <td>
        <select name="franchise" style="width: 257px;">
        <option value="Disney" <?php if(isset($_GET['edit'])) if($editrow['fld_product_franchise']=="Disney") echo "selected"; ?>>Disney</option>
        <option value="Pixar" <?php if(isset($_GET['edit'])) if($editrow['fld_product_franchise']=="Pixar") echo "selected"; ?>>Pixar</option>
        <option value="Marvel" <?php if(isset($_GET['edit'])) if($editrow['fld_product_franchise']=="Marvel") echo "selected"; ?>>Marvel</option>
        <option value="Star Wars" <?php if(isset($_GET['edit'])) if($editrow['fld_product_franchise']=="Star Wars") echo "selected"; ?>>Star Wars</option>
        </select>
      </td>
    </tr>
    <tr>
      <td><strong>Stock :</strong></td>
      <td><input name="stock" type="number" style="width: 250px;" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_stock']; ?>"></td>
    </tr>
    <tr>
      <td><strong>Description :</strong></td>
      <td> <textarea name="description" rows="4" style="width: 253px;"><?php if(isset($_GET['edit'])) echo $editrow['fld_product_description']; ?></textarea></td>
    </tr>
  </table>

<br>
    <?php if (isset($_GET['edit'])) { ?>
      <input type="hidden" name="oldpid" value="<?php echo $editrow['fld_product_id']; ?>">
      <button type="submit" name="update">Update</button>
      <?php } else { ?>
      <button type="submit" name="create">Create</button>
      <?php } ?>
      <button type="reset">Clear</button>

  </form>

<br>
    <hr>
    <table border="1">
      <tr>
        <td> Product ID </td>
        <td> Name </td>
        <td> Price (RM) </td>
        <td> Type </td>
        <td> Color </td>
        <td> Franchise </td>
        <td> Actions</td>
      </tr>

      <?php
      // Read
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT * FROM tbl_products_a189646_pt2");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $readrow) {
      ?>   
      
      <tr>
        <td><?php echo $readrow['fld_product_id']; ?></td>
        <td><?php echo $readrow['fld_product_name']; ?></td>
        <td><?php echo $readrow['fld_product_price']; ?></td>
        <td><?php echo $readrow['fld_product_type']; ?></td>
        <td> <?php echo implode(', ', explode(',', $readrow['fld_product_color'])); ?></td>
        <td><?php echo $readrow['fld_product_franchise']; ?></td>
        <td>
          <a href="products_details.php?pid=<?php echo $readrow['fld_product_id']; ?>">Details</a>
          <a href="products.php?edit=<?php echo $readrow['fld_product_id']; ?>">Edit</a>
          <a href="products.php?delete=<?php echo $readrow['fld_product_id']; ?>" onclick="return confirm('Are you sure to delete?');">Delete</a>
        </td>
      </tr>
      <?php
      }
      $conn = null;
      ?>


    </table>
  </center>
</body>
</html>
