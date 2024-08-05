<?php
  include_once 'products_crud.php';
  include_once 'session.php'
?>

<!DOCTYPE html>
<html>
<head>

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

  /* Styling for DataTables pagination */
.dataTables_wrapper .dataTables_paginate {
    float: right;
    margin-top: 10px;
}

.dataTables_wrapper .dataTables_paginate .paginate_button {
    box-sizing: border-box;
    display: inline-block;
    min-width: 1.5em;
    padding: 0.5em 1em;
    margin-left: 2px;
    text-align: center;
    text-decoration: none !important;
    cursor: pointer;
    color: #fff !important;
    border: 1px solid transparent;
    border-radius: 2px;
    background-color: #A94438; /* Change this to your desired button color */
}

.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
    background-color: #4758F5; /* Change this to your desired hover color */
    border-color: #4758F5; /* Change this to your desired hover color */
}

.dataTables_wrapper .dataTables_paginate .paginate_button.current, 
.dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
    color: #fff !important;
    background-color: #A94438; /* Change this to your desired active/current color */
    border-color: #4758F5; /* Change this to your desired active/current color */
}

.dataTables_wrapper .dataTables_paginate .paginate_button.disabled {
    color: #ccc !important;
    cursor: default;
}

/* Responsive styling for pagination on small screens */
@media screen and (max-width: 768px) {
    .dataTables_wrapper .dataTables_paginate {
        float: none;
        text-align: center;
    }
}

</style>

   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <link rel="shortcut icon" href="logo.ico" type="image/x-icon">
  <title>Disney Collectibles : Products</title>
   <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap.min.css" />
  <link href="https://cdn.datatables.net/v/bs/jszip-3.10.1/b-2.4.2/b-html5-2.4.2/datatables.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap.min.css">
        
</head>
<body bgcolor="#d4d4dc">
  
    <?php include_once 'nav_bar.php'; ?>

<?php if ($level === "Admin"||$level === "Supervisor") { ?>
<div class="container-fluid">

    <form action="products.php" method="post" class="form-horizontal">

     <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
      <div class="page-header">
        <h2>Create New Product</h2>
      </div>
       <div class="form-group">
          <label for="productid" class="col-sm-3 control-label">Product ID :</label>

          <div class="col-sm-9">
      <input name="pid"  type="text" class="form-control" id="productid" placeholder="Product ID" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_id']; ?>" required>
    
    </div>
        </div>
      <div class="form-group">
          <label for="productname" class="col-sm-3 control-label">Name</label>
          <div class="col-sm-9">
    
      
      <input name="name" type="text" class="form-control" id="productname" placeholder="Product Name" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_name']; ?>" required>
    
    </div>
        </div>
      <div class="form-group">
          <label for="productprice" class="col-sm-3 control-label">Price :</label>
          <div class="col-sm-9">
      
      <input name="price" type="number" class="form-control" id="productprice" placeholder="Product Price"  value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_price']; ?>" required>

      </div>
        </div>

        <div class="form-group">
          <label for="producttype" class="col-sm-3 control-label">Type :</label>
          <div class="col-sm-9">
      
    <select name="type" class="form-control" id="producttype" required>
      <option value="">Please select</option>
    <option value="Action Figures" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Action Figures") echo "selected"; ?>>Action Figures</option>
    <option value="Collectibles" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Collectibles") echo "selected"; ?>>Collectibles</option>
    <option value="Dolls" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Dolls") echo "selected"; ?>>Dolls</option>
    <option value="Wall Decorations" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Wall Decorations") echo "selected"; ?>>Wall Decorations</option>
    <option value="Lego" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Lego") echo "selected"; ?>>Lego</option>
    <option value="Keepsakes" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Keepsakes") echo "selected"; ?>>Keepsakes</option>
    <option value="Pins,Buttons & Patches" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Pins,Buttons & Patches") echo "selected"; ?>>Pins, Buttons & Patches</option>
    <option value="Snowglobes" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Snowglobes") echo "selected"; ?>>Snowglobes</option>
    <option value="Posters & Prints" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Posters & Prints") echo "selected"; ?>>Posters & Prints</option>
    <option value="Vinyl Figures" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Vinyl Figures") echo "selected"; ?>>Vinyl Figures</option>
    </select>

</div>
    </div>
<div class="form-group">
          <label for="productcolor" class="col-sm-3 control-label">Color :</label>
          <div class="col-sm-9">
      
      
            <?php
            $colorOptions = array("Cream", "Rose Gold", "Blue", "Red", "Black", "Orange", "Brown","White", "Purple","Silver","Yellow","Green","Gray","Gold", "Pink");
            ?>
            <?php foreach ($colorOptions as $colorOption) { ?>
              <label class="checkbox-inline">
            <input type="checkbox" name="color[]" id="productcolor" value="<?php echo $colorOption; ?>" <?php if (isset($_GET['edit']) && in_array($colorOption, $selectedColors)) echo "checked"; ?> ><?php echo $colorOption; ?>
          </label>
            <?php } ?>
      
    </div>
    </div>
    
      <div class="form-group">
          <label for="productfranchise" class="col-sm-3 control-label">Franchise :</label>
          <div class="col-sm-9">
      
        <select name="franchise" class="form-control" id="productfranchise" required>
          <option value="">Please select</option>
        <option value="Disney" <?php if(isset($_GET['edit'])) if($editrow['fld_product_franchise']=="Disney") echo "selected"; ?>>Disney</option>
        <option value="Pixar" <?php if(isset($_GET['edit'])) if($editrow['fld_product_franchise']=="Pixar") echo "selected"; ?>>Pixar</option>
        <option value="Marvel" <?php if(isset($_GET['edit'])) if($editrow['fld_product_franchise']=="Marvel") echo "selected"; ?>>Marvel</option>
        <option value="Star Wars" <?php if(isset($_GET['edit'])) if($editrow['fld_product_franchise']=="Star Wars") echo "selected"; ?>>Star Wars</option>
        </select>
      
    </div>
    </div>
    
      <div class="form-group">
          <label for="productstock" class="col-sm-3 control-label">Stock :</label>
          <div class="col-sm-9">
    
     
      <input name="stock" type="number" class="form-control" id="productstock" placeholder="Product Stock" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_stock']; ?>" required>
    
    </div>
    </div>
    
      <div class="form-group">
          <label for="productdesc" class="col-sm-3 control-label">Description :</label>
          <div class="col-sm-9">
      
       <textarea name="description" class="form-control" rows="2"  id="productdesc" placeholder="Product Description" required><?php if(isset($_GET['edit'])) echo $editrow['fld_product_description']; ?></textarea>
    
  </div>
    </div>
<div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">

    <?php if (isset($_GET['edit'])) { ?>
      <input type="hidden" name="oldpid" value="<?php echo $editrow['fld_product_id']; ?>">
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
        <h2>Products List</h2>
      </div>
      <table class="table table-striped table-bordered white-table" id="product-table" >

      <thead>
      <tr style="font-weight:bold; background-color: #A94438;color: white;">
        <th> Product ID </th>
        <th> Name </th>
        <th> Price (RM) </th>
        <th> Type </th>
        <th> Color </th>
        <th> Franchise </th>
        <th> Actions</th>
      </tr>
      </thead>


      <tbody>
      <?php
      // Read

      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT * FROM tbl_products_a189646_pt2");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $readrow) {
      ?>   
      
      <tr>
        <td><?php echo $readrow['fld_product_id']; ?></td>
        <td><?php echo $readrow['fld_product_name']; ?></td>
        <td><?php echo $readrow['fld_product_price']; ?></td>
        <td><?php echo $readrow['fld_product_type']; ?></td>
        <td> <?php echo implode(', ', explode(',', $readrow['fld_product_color'])); ?></td>
        <td><?php echo $readrow['fld_product_franchise']; ?></td>
        <td>
          <button data-href="products_details.php?pid=<?php echo $readrow['fld_product_id']; ?>" class="btn btn-warning btn-xs btn-details" role="button">Details</button>

          <?php if ($level === "Admin" || $level === "Supervisor") { ?>

          <a href="products.php?edit=<?php echo $readrow['fld_product_id']; ?>" class="btn btn-success btn-xs" role="button">Edit</a>
          <a href="products.php?delete=<?php echo $readrow['fld_product_id']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs" role="button">Delete</a>

            <?php } ?>

        </td>
      </tr>
      <?php
      }
      $conn = null;
      ?>

    </tbody>
    </table>
    </div>
  </div>

<div id="myModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">Product Details</h3>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
          
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

  <script src="js/bootstrap.min.js"></script>

  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>


<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.5.0/jszip.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/vfs_fonts.js"></script>


<script>
  $(document).ready(function() {

    var table = $('#product-table').DataTable({
      "order": [[1, "asc"]], 
      "pagingType": "full_numbers", 
      "pageLength": 5, 
      "lengthMenu": [[5, 10, 20, 30, -1], [5, 10, 20, 30, "All"]], 
      "searching": true, 
      "columnDefs": [{ "searchable": false, "targets": 2 }],  
      "dom": '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>rt<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',

      "buttons": [
        {

          extend: 'excelHtml5',
          text: 'Excel',
          exportOptions: {
            columns: [0, 1, 2, 3,4,5]
          },
          className: 'btn btn-primary' 
        }
      ]
    });

    $('#myModal').on('hidden.bs.modal', function () {
      // Reset the modal content when it's closed
      $('.modal-body').html('');
    });

    $('#product-table tbody').on('click', 'button.btn-details', function() {
      var dataURL = $(this).attr('data-href');
      $('.modal-body').load(dataURL, function() {
        $('#myModal').modal({
          backdrop: 'static',
          keyboard: false
        });
      });
    });

    var exportContainer = $('<div class="export-container"></div>').insertAfter('.dataTables_info');
    table.buttons().container().appendTo(exportContainer);

    $('.export-container .btn-primary').removeClass('btn-secondary').addClass('btn-primary');

  });
</script>


  

</body>
</html>
