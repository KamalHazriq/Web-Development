<?php
  include_once 'products_crud.php';
?>

<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Disney Souvenirs : Products</title>
   <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

 

        
</head>
<body bgcolor="#d4d4dc">
  
    <?php include_once 'nav_bar.php'; ?>

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

  
    <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <div class="page-header">
        <h2>Products List</h2>
      </div>
      <table class="table table-striped table-bordered">
      <tr>
        <th> Product ID </th>
        <th> Name </th>
        <th> Price (RM) </th>
        <th> Type </th>
        <th> Color </th>
        <th> Franchise </th>
        <th> Actions</th>
      </tr>

      <?php
      // Read

      $per_page = 5;
      if (isset($_GET["page"]))
        $page = $_GET["page"];
      else
        $page = 1;
      $start_from = ($page-1) * $per_page;


      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT * FROM tbl_products_a189646_pt2 LIMIT $start_from, $per_page");
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
          <a href="products_details.php?pid=<?php echo $readrow['fld_product_id']; ?>"class="btn btn-warning btn-xs" role="button">Details</a>
          <a href="products.php?edit=<?php echo $readrow['fld_product_id']; ?>" class="btn btn-success btn-xs" role="button">Edit</a>
          <a href="products.php?delete=<?php echo $readrow['fld_product_id']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs" role="button">Delete</a>
        </td>
      </tr>
      <?php
      }
      $conn = null;
      ?>


    </table>
    </div>
  </div>

<div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <nav>
          <ul class="pagination">
          <?php
          try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM tbl_products_a189646_pt2");
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
            <li><a href="products.php?page=<?php echo $page-1 ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
          <?php
          }
          for ($i=1; $i<=$total_pages; $i++)
            if ($i == $page)
              echo "<li class=\"active\"><a href=\"products.php?page=$i\">$i</a></li>";
            else
              echo "<li><a href=\"products.php?page=$i\">$i</a></li>";
          ?>
          <?php if ($page==$total_pages) { ?>
            <li class="disabled"><span aria-hidden="true">»</span></li>
          <?php } else { ?>
            <li><a href="products.php?page=<?php echo $page+1 ?>" aria-label="Previous"><span aria-hidden="true">»</span></a></li>
          <?php } ?>
        </ul>
      </nav>
    </div>
  

  </div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>
