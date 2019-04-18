<?php 
	include '../includes/db.php';
	$user_id = $_POST['user_id'];
	$data = $_POST['data'];
	$q = mysqli_query($connection, "INSERT INTO `bucket` (`item_id`, `user_id`) VALUES ('".$data."','".$user_id."')");
 ?>