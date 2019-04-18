<?php 
	include '../includes/db.php';
	$data = $_POST['data'];
	$data = explode(",", $data);

	$q = mysqli_query($connection, "SELECT * FROM `users` WHERE `username` = '" . $data[0] . "'");
	if(mysqli_num_rows($q) == 0) {
		mysqli_query($connection, "INSERT INTO `users` (`id`, `username`, `password`, `access_level`) VALUES (NULL, '".$data[0]."', '".$data[1]."', '1');");
		$q = mysqli_query($connection, "SELECT * FROM `users` WHERE `username` = '" . $data[0] . "'");
		$user = mysqli_fetch_assoc($q);
		echo json_encode($user['id']);
	}
	else {
		echo json_encode("Username already exist");
	}
 ?>