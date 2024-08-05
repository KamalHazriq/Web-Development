<!DOCTYPE html>
<html>
<head>
<meta>
  <title><?php echo $title; ?></title>
</head>
 
<body bgcolor="#d4d4dc" text="#000000">
  
  <div align="center">
    [ <a href="<?php echo base_url('myguestbook/create/'); ?>">Add</a> ]
    [ <a href="<?php echo base_url('myguestbook'); ?>">Main Menu</a> ]
    [ <a href="https://lrgs.ftsm.ukm.my/users/a189646/#">Landing Page</a> ]
  </div>
  <ol>
    <?php

    if (empty($result)){
      redirect('myguestbook/','refresh');
    }


     foreach ($result as $record): ?>
      <li>
        <strong>Name :</strong> <?php echo $record->user; ?><br>
        <strong>Email :</strong> <?php echo $record->email; ?><br>
        <strong>Date / Time :</strong> <?php echo $record->postdate." / ".$record->posttime; ?><br>
        <strong>Comment :</strong> <?php echo nl2br($record->comment); ?><br>
        <strong>Action :</strong> <a href="<?php echo base_url('myguestbook/edit/'); echo $record->id; ?>">Edit</a>
        / <a href="<?php echo base_url('myguestbook/remove/'); echo $record->id; ?>">Delete</a>
        <hr>
      </li>
    <?php endforeach; ?>
  </ol>

</body>
  
</html>