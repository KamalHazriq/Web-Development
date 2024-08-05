<?php
  include_once 'staffs_crud.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Disney Souvenirs : Staffs</title>

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
<body bgcolor="#d4d4dc" >
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
  <form action="staffs.php" method="post" align="center">
  <table align="center" class="form-table" >
    <tr>
      <td><strong>Staff ID : </strong></td>
      <td><input name="sid" type="text" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_staff_id']; ?>"></td>
    </tr>
    <tr>
      <td><strong>Staff Name : </strong></td>
      <td><input name="name" type="text" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_staff_name']; ?>"></td>
    </tr>
    <tr>
      <td><strong>Gender : </strong></td>
      <td>
        <input name="gender" type="radio" value="Male" <?php if(isset($_GET['edit'])) if($editrow['fld_staff_gender']=="Male") echo "checked"; ?>> Male
        <input name="gender" type="radio" value="Female" <?php if(isset($_GET['edit'])) if($editrow['fld_staff_gender']=="Female") echo "checked"; ?>> Female
      </td>
    </tr>
    <tr>
      <td><strong>Email : </strong></td>
      <td><input name="email" type="text" placeholder="name@domain.com" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_staff_email']; ?>"></td>
    </tr>
  </table>
<br>

  <?php if (isset($_GET['edit'])) { ?>
    <input type="hidden" name="oldsid" value="<?php echo $editrow['fld_staff_id']; ?>">
    <button type="submit" name="update">Update</button>
  <?php } else { ?>
    <button type="submit" name="create">Create</button>
  <?php } ?>
  <button type="reset">Clear</button>
</form>


    <hr>
    <table border="1" >
      <strong><tr style="text-align: center;" >
        <td >Staff ID</td>
        <td>Staff Name</td>
        <td>Gender</td>
        <td>Email Address</td>
        <td>Actions</td>
      </strong>
      </tr>
       <?php
      // Read
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
      foreach($result as $readrow) {
      ?>
      <tr>
        <td><?php echo $readrow['fld_staff_id']; ?></td>
        <td><?php echo $readrow['fld_staff_name']; ?></td>
        <td><?php echo $readrow['fld_staff_gender']; ?></td>
        <td><?php echo $readrow['fld_staff_email']; ?></td>
        <td>
          <a href="staffs.php?edit=<?php echo $readrow['fld_staff_id']; ?>">Edit</a>
          <a href="staffs.php?delete=<?php echo $readrow['fld_staff_id']; ?>" onclick="return confirm('Are you sure to delete?');">Delete</a>
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