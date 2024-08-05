<?php
  include_once 'database.php';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Disney Souvenirs : Products Details</title>

  <style>
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
    <?php
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM tbl_products_a189646_pt2 WHERE fld_product_id = :pid");
      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
      $pid = $_GET['pid'];
      $stmt->execute();
      $readrow = $stmt->fetch(PDO::FETCH_ASSOC);
      }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
    ?>
      <strong>Product ID:</strong> <?php echo $readrow['fld_product_id'] ?><br>
      <strong>Name:</strong> <?php echo $readrow['fld_product_name'] ?><br>
      <strong>Price:</strong> RM <?php echo $readrow['fld_product_price'] ?><br>
      <strong>Type:</strong> <?php echo $readrow['fld_product_type'] ?><br>
      <strong>Color:</strong> <?php echo implode(', ', explode(',', $readrow['fld_product_color'])); ?> <br>
      <strong>Franchise:</strong> <?php echo $readrow['fld_product_franchise'] ?><br>
      <strong>Stock:</strong> <?php echo $readrow['fld_product_stock'] ?><br>
      <strong>Description:</strong> <?php echo $readrow['fld_product_description']?><br><br>

      <img src="products/<?php echo $readrow['fld_product_id'] ?>.jpg" width="50%" height="50%">
  </center>
</body>
</html>