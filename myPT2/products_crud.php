<?php
 
include_once 'database.php';
 
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
//Create
if (isset($_POST['create'])) {
 
  try {
 
      $stmt = $conn->prepare("INSERT INTO tbl_products_a189646_pt2(fld_product_id,
        fld_product_name, fld_product_price, fld_product_type,fld_product_color, fld_product_franchise,
        fld_product_stock, fld_product_description) VALUES(:pid, :name, :price, :type,
        :color, :franchise, :stock , :description )");
     
      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
      $stmt->bindParam(':name', $name, PDO::PARAM_STR);
      $stmt->bindParam(':price', $price, PDO::PARAM_INT);
      $stmt->bindParam(':type', $type, PDO::PARAM_STR);
      $stmt->bindParam(':color', $color, PDO::PARAM_STR);
      $stmt->bindParam(':franchise', $franchise, PDO::PARAM_INT);
      $stmt->bindParam(':stock', $stock, PDO::PARAM_INT);
      $stmt->bindParam(':description', $description, PDO::PARAM_INT);

    $pid = $_POST['pid'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $type =  $_POST['type'];
    $color = implode(',', $_POST['color']);
    $franchise = $_POST['franchise'];
    $stock = $_POST['stock'];
    $description = $_POST['description']; 

    $stmt->execute();
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Update
if (isset($_POST['update'])) {
 
  try {
 
      $stmt = $conn->prepare("UPDATE tbl_products_a189646_pt2 SET fld_product_id = :pid,
        fld_product_name = :name, fld_product_price = :price, fld_product_type = :type,
        fld_product_color = :color, fld_product_franchise = :franchise, fld_product_stock = :stock , fld_product_description = :description
        WHERE fld_product_id = :oldpid");
     
      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
      $stmt->bindParam(':name', $name, PDO::PARAM_STR);
      $stmt->bindParam(':price', $price, PDO::PARAM_INT);
      $stmt->bindParam(':type', $type, PDO::PARAM_STR);
      $stmt->bindParam(':color', $color, PDO::PARAM_STR);
      $stmt->bindParam(':franchise', $franchise, PDO::PARAM_INT);
      $stmt->bindParam(':stock', $stock, PDO::PARAM_INT);
      $stmt->bindParam(':description', $description, PDO::PARAM_INT);
      $stmt->bindParam(':oldpid', $oldpid, PDO::PARAM_STR);
       
    $pid = $_POST['pid'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $type =  $_POST['type'];
    $color = $_POST['color'];
    $franchise = $_POST['franchise'];
    $stock = $_POST['stock'];
    $description = $_POST['description']; 
    $oldpid = $_POST['oldpid'];

    
    $selectedColors = explode(',', $editrow['fld_product_color']);
    $newlySelectedColors = isset($_POST['color']) ? array_filter($_POST['color'], 'strlen') : [];
    $allColors = array_merge($selectedColors, $newlySelectedColors);
    $color = implode(',', array_unique($allColors));

    // Remove leading comma, if any
    $color = ltrim($color, ',');
     
    $stmt->execute();
 
    header("Location: products.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Delete
if (isset($_GET['delete'])) {
 
  try {
 
      $stmt = $conn->prepare("DELETE FROM tbl_products_a189646_pt2 WHERE fld_product_id = :pid");
     
      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
       
    $pid = $_GET['delete'];
     
    $stmt->execute();
 
    header("Location: products.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Edit
if (isset($_GET['edit'])) {
 
  try {
 
      $stmt = $conn->prepare("SELECT * FROM tbl_products_a189646_pt2 WHERE fld_product_id = :pid");
     
      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
       
    $pid = $_GET['edit'];
     
    $stmt->execute();
 
    $editrow = $stmt->fetch(PDO::FETCH_ASSOC);
    $selectedColors = explode(',', $editrow['fld_product_color']);
    } catch (PDOException $e) {
    }
 
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
  $conn = null;
?>