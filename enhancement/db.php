<?php
 
$servername = "lrgs.ftsm.ukm.my";
$username = "a189646";
$password = "smallpurplehamster";
$dbname = "a189646";
 
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
?>