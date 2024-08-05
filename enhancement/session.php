<?php
include_once 'db.php';

session_start(); 
	
	$sid = $_SESSION['staffid'];
	
	$stmt = $conn->prepare("SELECT * FROM tbl_staffs_a189646_pt2 WHERE fld_staff_id = '$sid'");

	$stmt->execute();
	
	$readrow = $stmt->fetch(PDO::FETCH_ASSOC);

	$sid = $readrow['fld_staff_id'];
	$name = $readrow['fld_staff_name'];
	$gender = $readrow['fld_staff_gender'];
	$email = $readrow['fld_staff_email'];
	$pass= $readrow['fld_password'];
	$level = $readrow['fld_user_level'];
	
		
if($sid==''){
	header("location:login.php");
	}
	else {
	header("");
	}
?>