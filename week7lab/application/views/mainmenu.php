<!DOCTYPE html>
<html>

<head>
  <title><?php echo $title; ?></title>

  <style>
    td {
      background: linear-gradient(to bottom, #ff0000, #ffcc00);
    }

    body {
      background-color: #d4d4dc;
      color: #000000;
      margin: 0; /* Remove default margin to extend the button to the edges */
    }

    div.container {
      text-align: center;
    }

    table {
      margin: 0 auto;
    }
  </style>

</head>

<body bgcolor="#d4d4dc">
  <?php date_default_timezone_set("Asia/Kuala_Lumpur"); ?>
  <div align="center" class="container">
   <a href="https://lrgs.ftsm.ukm.my/users/a189646/#" style="position: fixed;top: 10px; left: 10px; padding: 10px; background: linear-gradient(to bottom, #ff0000, #ffcc00); color: #000000; font-weight: bold; text-decoration: none; cursor: pointer;">Landing Page</a>
    <table width="379" height="286" border="3" bordercolor="#666666">
      <tr>
        <td height="190" bgcolor="#999999">
          <p align="center"><strong>My Guestbook</strong></p>
          <p align="center">Date : <?php echo date("d-m-Y", time()); ?></p>
          <p align="center">Time : <?php echo date("h:i", time()); ?></p>
          <p align="center"><a href="<?php echo base_url('myguestbook/create/'); ?>">Add</a> | <a
              href="<?php echo base_url('myguestbook/view/'); ?>">List</a></p>
        </td>
      </tr>
    </table>
  </div>

</body>

</html>
