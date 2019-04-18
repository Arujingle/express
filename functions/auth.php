<?php 
	include '../includes/db.php';
	$data = $_POST['data'];
	$data = explode(",", $data);
	$q = mysqli_query($connection, "SELECT * FROM `users` WHERE `username` = '" . $data[0] . "' AND `password` = '" . $data[1] . "'");
	$user = mysqli_fetch_assoc($q);
	if(mysqli_num_rows($q) == 0) {
		echo json_encode("Incorrect login or password");
	}
	else {
		echo json_encode($user['id']);
	}
 ?>