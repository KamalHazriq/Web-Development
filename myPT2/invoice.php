<?php
  include_once 'database.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title> Disney Collectibles : Invoice</title>
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
    <strong>Disney Collectibles Sdn. Bhd.</strong> <br>
    Kolej Ibrahim Yaakub <br>
    Universiti Kebangsaan Malaysia <br>
    43600 <br>
    Selangor <br>
    <hr>
     <?php
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $stmt = $conn->prepare("SELECT * FROM tbl_orders_a189646_pt2, tbl_staffs_a189646_pt2,
        tbl_customers_a189646_pt2, tbl_orders_details_a189646_pt2 WHERE
        tbl_orders_a189646_pt2.fld_staff_id = tbl_staffs_a189646_pt2.fld_staff_id AND
        tbl_orders_a189646_pt2.fld_customer_id = tbl_customers_a189646_pt2.fld_customer_id AND
        tbl_orders_a189646_pt2.fld_order_id = tbl_orders_details_a189646_pt2.fld_order_id AND
        tbl_orders_a189646_pt2.fld_order_id = :oid");
      $stmt->bindParam(':oid', $oid, PDO::PARAM_STR);
      $oid = $_GET['oid'];
      $stmt->execute();
      $readrow = $stmt->fetch(PDO::FETCH_ASSOC);
      }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
    ?>
    Order ID: <?php echo $readrow['fld_order_id'] ?>
    Order Date: <?php echo $readrow['fld_order_time'] ?>
    <hr>
    Staff: <?php echo $readrow['fld_staff_id']." ".$readrow['fld_staff_name'] ?>
    Customer ID: <?php echo $readrow['fld_customer_id']." ".$readrow['fld_customer_name'] ?>
    Date: <?php echo date("d M Y"); ?>
    <hr>
    <table border="1">
      <tr>
        <td><strong>No</strong></td>
        <td><strong>Product</strong></td>
        <td><strong>Quantity</strong></td>
        <td><strong>Price(RM)/Unit</strong></td>
        <td><strong>Total(RM)</strong></td>
      </tr>
       <?php
      $grandtotal = 0;
      $counter = 1;
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT * FROM tbl_orders_details_a189646_pt2,
            tbl_products_a189646_pt2 where 
            tbl_orders_details_a189646_pt2.fld_product_id = tbl_products_a189646_pt2.fld_product_id AND
            fld_order_id = :oid");
        $stmt->bindParam(':oid', $oid, PDO::PARAM_STR);
          $oid = $_GET['oid'];
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $detailrow) {
      ?>
      <tr>
        <td><?php echo $counter; ?></td>
        <td><?php echo $detailrow['fld_product_name']; ?></td>
        <td><?php echo $detailrow['fld_order_quantity']; ?></td>
        <td><?php echo $detailrow['fld_product_price']; ?></td>
        <td><?php echo $detailrow['fld_product_price']*$detailrow['fld_order_quantity']; ?></td>
      </tr>
      <?php
        $grandtotal = $grandtotal + $detailrow['fld_product_price']*$detailrow['fld_order_quantity'];
        $counter++;
      } // while
      $conn = null;
      ?>
      <tr>
        <td colspan="4" align="right"><strong>Grand Total</strong></td>
        <td><?php echo $grandtotal ?></td>
      </tr>
    </table>
    <hr>
    <em>Computer-generated invoice. No signature is required.</em>
  </center>
</body>
</html>