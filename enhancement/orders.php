<?php
  include_once 'orders_crud.php';
  include_once 'session.php'
?>
 
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <link rel="shortcut icon" href="logo.ico" type="image/x-icon">
  
    <title>Disney Collectibles : Orders</title>
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
 
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
        <div class="page-header">
          <h2>Create New Order</h2>
        </div>
        <form action="orders.php" method="post" class="form-horizontal">
          <div class="form-group">
            <label for="orderid" class="col-sm-3 control-label">Order ID :</label>
            <div class="col-sm-9">
              <input name="oid" type="text" class="form-control" id="orderid" placeholder="Order ID" readonly value="<?php if(isset($_GET['edit'])) echo $editrow['fld_order_id']; ?>" required>
            </div>
          </div>

          <div class="form-group">
            <label for="orderdate" class="col-sm-3 control-label">Order Date :</label>
            <div class="col-sm-9">
              <input name="orderdate" type="text" class="form-control" id="orderdate" placeholder="date/month/year" readonly value="<?php if(isset($_GET['edit'])) echo $editrow['fld_order_time']; ?>" required>
            </div>
          </div>
 
          <div class="form-group">
            <label for="staffname" class="col-sm-3 control-label">Staff Name :</label>
            <div class="col-sm-9">
              <select name="sid" class="form-control" id="staffname" required>
                <option value="">Please select</option>
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
                }
                $conn = null;
                ?> 
              </select>
              </div>
          </div>

              <div class="form-group">
            <label for="customername" class="col-sm-3 control-label">Customer Name :</label>
            <div class="col-sm-9">
              <select name="cid" class="form-control" id="customername" required>
                <option value="">Please select</option>
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
                }
                $conn = null;
                ?> 
              </select> <br>
</div>
      </div>

              <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
          <?php if (isset($_GET['edit'])) { ?>
            <input type="hidden" name="oldsid" value="<?php echo $editrow['fld_staff_id']; ?>">
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
    <div class="row">
  <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
    <div class="page-header">
      <h2>Orders List</h2>
    </div>
    <hr>
    <table class="table table-bordered">
      <tr style="font-weight:bold; background-color: #A94438;color: white;">
        <th>Order ID</th>
        <th>Order Date</th>
        <th>Staff</th>
        <th>Customer</th>
        
        <th>Actions</th>
        

      </tr>
      <?php
      // Pagination
      $per_page = 5;
      if (isset($_GET["page"]))
        $page = $_GET["page"];
      else
        $page = 1;
      $start_from = ($page-1) * $per_page;
      
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM tbl_orders_a189646_pt2, tbl_staffs_a189646_pt2, tbl_customers_a189646_pt2 WHERE ";
        $sql = $sql."tbl_orders_a189646_pt2.fld_staff_id = tbl_staffs_a189646_pt2.fld_staff_id and ";
        $sql = $sql."tbl_orders_a189646_pt2.fld_customer_id = tbl_customers_a189646_pt2.fld_customer_id LIMIT $start_from, $per_page";
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
        <td><?php echo $orderrow['fld_order_id']; ?></td>
        <td><?php echo $orderrow['fld_order_time']; ?></td>
        <td><?php echo $orderrow['fld_staff_id']." ".$orderrow['fld_staff_name'] ?></td>
        <td><?php echo $orderrow['fld_customer_id']." ".$orderrow['fld_customer_name'] ?></td>

        

        <td>
          <a href="orders_details.php?oid=<?php echo $orderrow['fld_order_id']; ?>" class="btn btn-info">Details</a>

          <?php if ($level === "Admin" || $level === "Supervisor") { ?>

          <a href="orders.php?edit=<?php echo $orderrow['fld_order_id']; ?>" class="btn btn-warning">Edit</a>
          <a href="orders.php?delete=<?php echo $orderrow['fld_order_id']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger">Delete</a>

          <?php } ?>
          
        </td>

        

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
              $stmt = $conn->prepare("SELECT * FROM tbl_orders_a189646_pt2");
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
              <li><a href="orders.php?page=<?php echo $page-1 ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
            <?php
            }
            for ($i=1; $i<=$total_pages; $i++)
              if ($i == $page)
                echo "<li class=\"active\"><a href=\"orders.php?page=$i\">$i</a></li>";
              else
                echo "<li><a href=\"orders.php?page=$i\">$i</a></li>";
            ?>
            <?php if ($page==$total_pages) { ?>
              <li class="disabled"><span aria-hidden="true">»</span></li>
            <?php } else { ?>
              <li><a href="orders.php?page=<?php echo $page+1 ?>" aria-label="Previous"><span aria-hidden="true">»</span></a></li>
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
