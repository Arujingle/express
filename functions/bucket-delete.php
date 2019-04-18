<?php 
	include '../includes/db.php';
	$data = $_POST['data'];
	$user_id = $_POST['user_id'];
	$id = mysqli_query($connection, "SELECT * FROM `bucket` WHERE `item_id`='".$data."' AND `user_id`='".$user_id."'");
	$items = mysqli_fetch_assoc($id);
	$q = mysqli_query($connection, "DELETE FROM `bucket` WHERE `id` = '" . $items['id'] . "'");
 ?>