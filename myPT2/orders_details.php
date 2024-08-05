<?php
include_once 'orders_details_crud.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Disney Collectibles: Order Details</title>

    <style>
  /* Center the form container and left-align its content */
  body {
    text-align: center;
  }

    table.detail-table{
    width: 350px; /* Adjust the width as needed */
    margin-left: auto;
    margin-right: auto;
    text-align: center; /* Left-align the form elements */
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

   table.detail-table td:first-child {
    width: 100px; /* Adjust the width as needed */
  }
</style>

</head>

<body bgcolor="#d4d4dc">
    <center>
        <h3 align="center">
            <font color="black" face="verdana">
                <a href="../index.html "style="color:black;">Landing Page</a> |
                <a href="index.php" style="color:black;">Home</a> |
                <a href="products.php" style="color:black;">Products</a> |
                <a href="customers.php" style="color:black;">Customers</a> |
                <a href="staffs.php" style="color:black;">Staffs</a> |
                <a href="orders.php" style="color:black;">Orders</a>
            </font>
        </h3>
        <hr>
        <?php
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM tbl_orders_a189646_pt2, tbl_staffs_a189646_pt2,
              tbl_customers_a189646_pt2 WHERE
              tbl_orders_a189646_pt2.fld_staff_id = tbl_staffs_a189646_pt2.fld_staff_id AND
              tbl_orders_a189646_pt2.fld_customer_id = tbl_customers_a189646_pt2.fld_customer_id AND
              fld_order_id = :oid");
            $stmt->bindParam(':oid', $oid, PDO::PARAM_STR);
            $oid = isset($_GET['oid']) ? $_GET['oid'] : '';
            $stmt->execute();
            $readrow = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $conn = null;
        }
        ?>
        <table align="center" border="0" class="detail-table">
  <tr>
    <td><strong>Order ID:</strong></td>
    <td><?php echo $readrow['fld_order_id'] ?></td>
  </tr>
  <tr>
    <td><strong>Order Date:</strong></td>
    <td><?php echo $readrow['fld_order_time'] ?></td>
  </tr>
  <tr>
    <td><strong>Staff:</strong></td>
    <td><?php echo $readrow['fld_staff_id'] . " " . $readrow['fld_staff_name'] ?></td>
  </tr>
  <tr>
    <td><strong>Customer:</strong></td>
    <td><?php echo $readrow['fld_customer_id'] . " " . $readrow['fld_customer_name'] ?></td>
  </tr>
</table>

        <hr>

        <form action="orders_details.php" method="post">
            <strong>Product :</strong><br><br>
            <select name="pid">
                <?php
                try {
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $stmt = $conn->prepare("SELECT * FROM tbl_products_a189646_pt2");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach ($result as $productrow) {
                        ?>
                        <option value="<?php echo $productrow['fld_product_id']; ?>"><?php echo $productrow['fld_product_franchise'] . " " . $productrow['fld_product_name']; ?></option>
                    <?php
                    }
                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                } finally {
                    $conn = null;
                }
                ?>
            </select>
            <br><br>

            <strong>Quantity : </strong><br><br>

            <input name="quantity" type="number">
            <input name="oid" type="hidden" value="<?php echo $oid; ?>">
            <br><br>
            <button type="submit" name="addproduct">Add Product</button>
            <button type="reset">Clear</button>

        </form>
        <hr>
        <table border="1">
            <tr>
                <td>Order Detail ID</td>
                <td>Product</td>
                <td>Quantity</td>
                <td>Price (RM)</td>
                <td>Subtotal (RM)</td>
                <td>Actions</td>
            </tr>
            <?php
            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Check if the 'oid' index is set in the $_GET array
              $oid = isset($_GET['oid']) ? $_GET['oid'] : '';

                $stmt = $conn->prepare("SELECT * FROM tbl_orders_details_a189646_pt2, tbl_products_a189646_pt2 WHERE
                    tbl_orders_details_a189646_pt2.fld_product_id = tbl_products_a189646_pt2.fld_product_id AND fld_order_id = :oid");
                $stmt->bindParam(':oid', $oid, PDO::PARAM_STR);
                $stmt->execute();
                $result = $stmt->fetchAll();
                foreach ($result as $detailrow) {
                    ?>
                    <tr>
                        <td><?php echo $detailrow['fld_details_id']; ?></td>
                        <td><?php echo $detailrow['fld_product_name']; ?></td>
                        <td><?php echo $detailrow['fld_order_quantity']; ?></td>
                        <td><?php echo $detailrow['fld_product_price']; ?></td>
                        <td><?php echo number_format($detailrow['fld_order_quantity'] * $detailrow['fld_product_price'], 2); ?></td>
                        <td>
                            <a href="orders_details.php?delete=<?php echo $detailrow['fld_details_id']; ?>&oid=<?php echo $oid; ?>" onclick="return confirm('Are you sure to delete?');">Delete</a>
                        </td>
                    </tr>
                <?php
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            } finally {
                $conn = null;
            }
            ?>
        </table>
        <hr>
        <a href="invoice.php?oid=<?php echo $oid; ?>" target="_blank">Generate Invoice</a>

    </center>
</body>

</html>
