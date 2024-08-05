<?php
  include_once 'database.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>My Bike Ordering System : Products Details</title>
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
   <?php
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM tbl_products_a189646 WHERE fld_product_num = :pid");
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
    Product ID: <?php echo $readrow['fld_product_num'] ?> <br>
    Name: <?php echo $readrow['fld_product_name'] ?> <br>
    Price: RM <?php echo $readrow['fld_product_price'] ?> <br>
    Brand: <?php echo $readrow['fld_product_brand'] ?> <br>
    Condition: <?php echo $readrow['fld_product_condition'] ?> <br>
    Manufacturing Year: <?php echo $readrow['fld_product_year'] ?> <br>
    Quantity: <?php echo $readrow['fld_product_quantity'] ?> <br>
    <img src="products/<?php echo $readrow['fld_product_image'] ?>" width="50%" height="50%">
  </center>
</body>
</html>