<?php
  include_once 'orders_crud.php';
?>

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
        <a href="customers.php" style="color:black;">Customers</a> | 
        <a href="staffs.php" style="color:black;">Staffs</a> | 
        <a href="orders.php" style="color:black;" >Orders</a></font>
      </h3>
    <hr>
   <form action="orders.php" method="post">
      Order ID
      <input name="oid" type="text" readonly value="<?php if(isset($_GET['edit'])) echo $editrow['fld_order_num']; ?>"> <br>
      Order Date
      <input name="orderdate" type="text" readonly value="<?php if(isset($_GET['edit'])) echo $editrow['fld_order_date']; ?>"> <br>

      <strong>Staff</strong>
      
      <select name="sid">
      <?php
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT * FROM tbl_staffs_a189646");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $staffrow) {
      ?>
        <?php if((isset($_GET['edit'])) && ($editrow['fld_staff_num']==$staffrow['fld_staff_num'])) { ?>
          <option value="<?php echo $staffrow['fld_staff_num']; ?>" selected><?php echo $staffrow['fld_staff_fname']." ".$staffrow['fld_staff_lname'];?></option>
        <?php } else { ?>
          <option value="<?php echo $staffrow['fld_staff_num']; ?>"><?php echo $staffrow['fld_staff_fname']." ".$staffrow['fld_staff_lname'];?></option>
        <?php } ?>
      <?php
      } // while
      $conn = null;
      ?> 
      </select> <br>

      <strong> Customer </strong>

      <select name="cid">
      <?php
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT * FROM tbl_customers_a189646");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $custrow) {
      ?>
        <?php if((isset($_GET['edit'])) && ($editrow['fld_customer_num']==$custrow['fld_customer_num'])) { ?>
          <option value="<?php echo $custrow['fld_customer_num']; ?>" selected><?php echo $custrow['fld_customer_fname']." ".$custrow['fld_customer_lname']?></option>
        <?php } else { ?>
          <option value="<?php echo $custrow['fld_customer_num']; ?>"><?php echo $custrow['fld_customer_fname']." ".$custrow['fld_customer_lname']?></option>
        <?php } ?>
      <?php
      } // while
      $conn = null;
      ?> 
      </select> <br>
      <?php if (isset($_GET['edit'])) { ?>
      <button type="submit" name="update">Update</button>
      <?php } else { ?>
      <button type="submit" name="create">Create</button>
      <?php } ?>
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
       <?php
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM tbl_orders_a189646, tbl_staffs_a189646, tbl_customers_a189646 WHERE ";
        $sql = $sql."tbl_orders_a189646.fld_staff_num = tbl_staffs_a189646.fld_staff_num and ";
        $sql = $sql."tbl_orders_a189646.fld_customer_num = tbl_customers_a189646.fld_customer_num";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $orderrow) {
      ?>
      <tr>
        <td><?php echo $orderrow['fld_order_num']; ?></td>
        <td><?php echo $orderrow['fld_order_date']; ?></td>
        <td><?php echo $orderrow['fld_staff_fname']." ".$orderrow['fld_staff_lname'] ?></td>
        <td><?php echo $orderrow['fld_customer_fname']." ".$orderrow['fld_customer_lname'] ?></td>
        <td>
          <a href="orders_details.php?oid=<?php echo $orderrow['fld_order_num']; ?>">Details</a>
          <a href="orders.php?edit=<?php echo $orderrow['fld_order_num']; ?>">Edit</a>
          <a href="orders.php?delete=<?php echo $orderrow['fld_order_num']; ?>" onclick="return confirm('Are you sure to delete?');">Delete</a>
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