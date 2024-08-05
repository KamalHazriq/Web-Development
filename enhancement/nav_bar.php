<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>


      <a class="navbar-brand" href="index.php">
        
        Disney Collectibles by Kamal

  </a>
  <img src="logoS.png" alt="Logo" style="height: 20px;margin-top: 15px;">
    </div>
 
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
      <li><a href="index.php">Home</a></li>
    </ul>
      <ul class="nav navbar-nav navbar-right">
        
        <li>
          <a href="#" disabled="disabled">
            <span class="glyphicon" aria-hidden="true" style="font-weight: bold; color:lightgray;">
              <strong><?php echo str_replace(' ', '', $name); ?></strong> (<strong><?php echo str_replace(' ', '', $level); ?></strong>)
            </span>
          </a>
        </li>

        <li >
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu 
            <span class="caret">
            </span></a>

          <ul class="dropdown-menu">
            <li><a href="products.php"><span class="glyphicon " aria-hidden="true"></span> Products</font></a></li> 

            <li><a href="customers.php"><span class="glyphicon " aria-hidden="true"></span> Customers</font></a></li>
            
        
            <li>
    <?php if ($level === "Admin" || $level === "Supervisor") { ?>
        <a href="staffs.php"><span class="glyphicon" aria-hidden="true"></span> Staffs</a>
    <?php } else { ?>
        <a href="#" class="disabled" data-toggle="tooltip" data-placement="right" title="You are not authorized to access this page" onclick="showErrorBox()"><span class="glyphicon" aria-hidden="true"></span> Staffs</a>
    <?php } ?>
</li>
          

            <li><a href="orders.php"><span class="glyphicon " aria-hidden="true"></span> Orders</a></font></li>
            
            <li><a href="logout.php" ><span class="glyphicon " aria-hidden="true"></span>   Logout </a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<script>
    function showErrorBox() {
        // Show your error box here, for example using Bootstrap modal
        $('#errorModal').modal('show');
    }
</script>

<div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="errorModalLabel">Error</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                You are not authorized to access this page.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>