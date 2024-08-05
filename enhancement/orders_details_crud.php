<?php
 
include_once 'database.php';
 
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
//Create
if (isset($_POST['addproduct'])) {
 
  try {
 
    $stmt = $conn->prepare("INSERT INTO tbl_orders_details_a189646_pt2(fld_details_id,
      fld_order_id, fld_product_id, fld_order_quantity) VALUES(:did, :oid,
      :pid, :quantity)");
   
    $stmt->bindParam(':did', $did, PDO::PARAM_STR);
    $stmt->bindParam(':oid', $oid, PDO::PARAM_STR);
    $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
    $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
       
    $did = uniqid('D', true);
    $oid = $_POST['oid'];
    $pid = $_POST['pid'];
    $quantity= $_POST['quantity'];
     
    $stmt->execute();
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
  $_GET['oid'] = $oid;
}
 
// Delete
if (isset($_GET['delete'])) {
    try {
        $stmt = $conn->prepare("DELETE FROM tbl_orders_details_a189646_pt2 WHERE fld_details_id = :did");
        $stmt->bindParam(':did', $did, PDO::PARAM_STR);
        $did = $_GET['delete'];
        $stmt->execute();

        // Check if $_GET['oid'] is set before redirecting
        $redirectURL = isset($_GET['oid']) ? "Location: orders_details.php?oid=" . $_GET['oid'] : "Location: orders_details.php";
        header($redirectURL);
    } catch (PDOException $e) {
        echo "Error deleting order detail: " . $e->getMessage();
    }
}

 
?>