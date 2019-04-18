<?php 
	include '../includes/db.php';
	$data = $_POST['data'];
	$q = mysqli_query($connection, "DELETE FROM `item` WHERE `id` = '" . $data . "'");
 ?>