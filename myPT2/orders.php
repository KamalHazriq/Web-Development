<?php
  include_once 'orders_crud.php';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Disney Collectibles : Orders</title>

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
        <a href="index.php "style="color:black;">Home</a> | 
        <a href="products.php "style="color:black;">Products</a> | 
        <a href="customers.php" style="color:black;">Customers</a> | 
        <a href="staffs.php" style="color:black;">Staffs</a> | 
        <a href="orders.php" style="color:black;" >Orders</a></font>
      </h3>
    <hr>
   <form action="orders.php" method="post">

      <table align="center">
  <tr>
    <td><strong>Order ID : </strong></td>
    <td><input name="oid" type="text" readonly value="<?php if(isset($_GET['edit'])) echo $editrow['fld_order_id']; ?>"></td>
  </tr>
  <tr>
    <td><strong>Order Date : </strong></td>
    <td><input name="orderdate" type="text" readonly value="<?php if(isset($_GET['edit'])) echo $editrow['fld_order_time']; ?>"></td>
  </tr>
  <tr>
    <td><strong>Staff : </strong></td>
    <td>
      <select name="sid">
        <?php
        try {
          $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT * FROM tbl_staffs_a189646_pt2");
          $stmt->execute();
          $result = $stmt->fetchAll();
        }
        catch(PDOException $e){
          echo "Error: " . $e->getMessage();
        }
        foreach($result as $staffrow) {
        ?>
          <?php if((isset($_GET['edit'])) && ($editrow['fld_staff_id']==$staffrow['fld_staff_id'])) { ?>
            <option value="<?php echo $staffrow['fld_staff_id']; ?>" selected><?php echo $staffrow['fld_staff_id']." ".$staffrow['fld_staff_name'];?></option>
          <?php } else { ?>
            <option value="<?php echo $staffrow['fld_staff_id']; ?>"><?php echo $staffrow['fld_staff_id']." ".$staffrow['fld_staff_name'];?></option>
          <?php } ?>
        <?php
        } // foreach
        $conn = null;
        ?> 
      </select>
    </td>
  </tr>
  <tr>
    <td><strong>Customer : </strong></td>
    <td>
      <select name="cid">
        <?php
        try {
          $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT * FROM tbl_customers_a189646_pt2");
          $stmt->execute();
          $result = $stmt->fetchAll();
        }
        catch(PDOException $e){
          echo "Error: " . $e->getMessage();
        }
        foreach($result as $custrow) {
        ?>
          <?php if((isset($_GET['edit'])) && ($editrow['fld_customer_id']==$custrow['fld_customer_id'])) { ?>
            <option value="<?php echo $custrow['fld_customer_id']; ?>" selected><?php echo $custrow['fld_customer_id']." ".$custrow['fld_customer_name']?></option>
          <?php } else { ?>
            <option value="<?php echo $custrow['fld_customer_id']; ?>"><?php echo $custrow['fld_customer_id']." ".$custrow['fld_customer_name']?></option>
          <?php } ?>
        <?php
        } // foreach
        $conn = null;
        ?> 
      </select>
    </td>
  </tr>
</table>
 <br>

      <?php if (isset($_GET['edit'])) { ?>
      <button type="submit" name="update">Update</button>
      <?php } else { ?>
      <button type="submit" name="create">Create</button>
      <?php } ?>
      <button type="reset">Clear</button>
    </form>
    <hr>
    <table border="1" align="center">
      <tr>
        <td>Order ID</td>
        <td>Order Date</td>
        <td>Staff ID</td>
        <td>Customer ID</td>
        <td>Actions</td>
      </tr>
       <?php
      try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT * FROM tbl_orders_a189646_pt2
        JOIN tbl_staffs_a189646_pt2 ON tbl_orders_a189646_pt2.fld_staff_id = tbl_staffs_a189646_pt2.fld_staff_id
        JOIN tbl_customers_a189646_pt2 ON tbl_orders_a189646_pt2.fld_customer_id = tbl_customers_a189646_pt2.fld_customer_id");

    $stmt->execute();
    $result = $stmt->fetchAll();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

foreach ($result as $orderrow) {
    ?>
    <tr>
        <td><?php echo $orderrow['fld_order_id']; ?></td>
        <td><?php echo $orderrow['fld_order_time']; ?></td>
        <td><?php echo $orderrow['fld_staff_id']." ".$orderrow['fld_staff_name'] ?></td>
        <td><?php echo $orderrow['fld_customer_id']." ".$orderrow['fld_customer_name'] ?></td>
        <td>
            <a href="orders_details.php?oid=<?php echo $orderrow['fld_order_id']; ?>">Details</a>
            <a href="orders.php?edit=<?php echo $orderrow['fld_order_id']; ?>">Edit</a>
            <a href="orders.php?delete=<?php echo $orderrow['fld_order_id']; ?>" onclick="return confirm('Are you sure to delete?');">Delete</a>
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