<?php
  include_once 'customers_crud.php';
  include_once 'session.php';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="logo.ico" type="image/x-icon">
  <title>Disney Collectibles : Customers</title>
  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

<style>
  body {
    background-image: url("background.jpg");
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center center;
    background-attachment: fixed;
  }

  @media (max-width: 768px) {
    body {
      background-size: contain;
    }
  }

  .white-table {
  background-color: white;
}

.white-table th {
  color: black;
}

</style>


</head>
<body>
  <?php include_once 'nav_bar.php'; ?>
 

 <?php if ($level === "Admin"||$level === "Supervisor") { ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
        <div class="page-header">
          <h2>Create New Customer</h2>
        </div>
        <form action="customers.php" method="post" class="form-horizontal">
          <!-- Your form fields go here -->
          <div class="form-group">
        <label for="customerid" class="col-sm-3 control-label">Customer ID :</label>
        <div class="col-sm-9">
          <input name="cid" type="text" class="form-control" id="customerid" placeholder="Customer ID" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_customer_id']; ?>" required>
        </div>
      </div>
      <div class="form-group">
        <label for="customername" class="col-sm-3 control-label">Customer Name :</label>
        <div class="col-sm-9">
          <input name="name" type="text" class="form-control" id="customername" placeholder="Customer Name" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_customer_name']; ?>" required>
        </div>
      </div>
      
      <div class="form-group">
        <label for="customergender" class="col-sm-3 control-label">Gender :</label>
        <div class="col-sm-9">
          <div class="radio">
            <label>
              <input name="gender" type="radio" id="customergender" value="Male" <?php if(isset($_GET['edit']) && $editrow['fld_customer_gender']=="Male") echo "checked"; ?> required> Male
            </label>
          </div>
          <div class="radio">
            <label>
              <input name="gender" type="radio" id="customergender" value="Female" <?php if(isset($_GET['edit']) && $editrow['fld_customer_gender']=="Female") echo "checked"; ?>> Female
            </label>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label for="customeremail" class="col-sm-3 control-label">Email :</label>
        <div class="col-sm-9">
          <input name="email" type="email" class="form-control" id="customeremail" placeholder="Customer Email" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_customer_email']; ?>" required>
        </div>
      </div>

      <div class="form-group">
        <label for="customerphone" class="col-sm-3 control-label">Phone No :</label>
        <div class="col-sm-9">
          <input name="phone" type="text" class="form-control" id="customerphone" placeholder="Customer Phone No" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_customer_phone']; ?>" required>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
          <?php if (isset($_GET['edit'])) { ?>
            <input type="hidden" name="oldsid" value="<?php echo $editrow['fld_customer_id']; ?>">
            <button class="btn btn-default" type="submit" name="update"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Update</button>
          <?php } else { ?>
            <button class="btn btn-default" type="submit" name="create"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create</button>
          <?php } ?>
          <button class="btn btn-default" type="reset"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Clear</button>
        </div>
      </div>
    </form>
  </div>
</div>
<?php } ?>
        <div class="row">
  <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
    <div class="page-header">
      <h2>Customer List</h2>
    </div>
    
    <table class="table table-striped table-bordered" >
      <tr style="font-weight:bold; background-color: #A94438;color: white;">
        <th>Customer ID</th>
        <th>Customer Name</th>
        <th>Gender</th>
        <th>Email</th>
        <th>Phone Number</th>

        <?php if ($level === "Admin" || $level === "Supervisor") { ?>
        <th>Actions</th>
        <?php } ?>

      </tr>
      <?php
      // Pagination
      $per_page = 5;
      if (isset($_GET["page"]))
        $page = $_GET["page"];
      else
        $page = 1;
      $start_from = ($page-1) * $per_page;
      
      // Read
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM tbl_customers_a189646_pt2 LIMIT $start_from, $per_page");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $readrow) {
      ?>
      <tr>
        <td><?php echo $readrow['fld_customer_id']; ?></td>
        <td><?php echo $readrow['fld_customer_name']; ?></td>
        <td><?php echo $readrow['fld_customer_gender']; ?></td>
        <td><?php echo $readrow['fld_customer_email']; ?></td>
        <td><?php echo $readrow['fld_customer_phone']; ?></td>

        <?php if ($level === "Admin" || $level === "Supervisor") { ?>

        <td>
          
          <a href="customers.php?edit=<?php echo $readrow['fld_customer_id']; ?>" class="btn btn-success btn-xs" role="button">Edit</a>
          <a href="customers.php?delete=<?php echo $readrow['fld_customer_id']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs" role="button">Delete</a>

        </td>

        <?php } ?>

      </tr>
      <?php
      }
      $conn = null;
      ?>
    </table>
    <div class="row">
      <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
        <nav>
          <ul class="pagination">
            <?php
            try {
              $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $stmt = $conn->prepare("SELECT * FROM tbl_customers_a189646_pt2");
              $stmt->execute();
              $result = $stmt->fetchAll();
              $total_records = count($result);
            }
            catch(PDOException $e){
              echo "Error: " . $e->getMessage();
            }
            $total_pages = ceil($total_records / $per_page);
            ?>
            <?php if ($page==1) { ?>
              <li class="disabled"><span aria-hidden="true">«</span></li>
            <?php } else { ?>
              <li><a href="customers.php?page=<?php echo $page-1 ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
            <?php
            }
            for ($i=1; $i<=$total_pages; $i++)
              if ($i == $page)
                echo "<li class=\"active\"><a href=\"customers.php?page=$i\">$i</a></li>";
              else
                echo "<li><a href=\"customers.php?page=$i\">$i</a></li>";
            ?>
            <?php if ($page==$total_pages) { ?>
              <li class="disabled"><span aria-hidden="true">»</span></li>
            <?php } else { ?>
              <li><a href="customers.php?page=<?php echo $page+1 ?>" aria-label="Previous"><span aria-hidden="true">»</span></a></li>
            <?php } ?>
          </ul>
        </nav>
      </div>
    </div>
  </div>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
