<?php 
	$uploaddir = "../img/";
	$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Auth</title>
	<link rel="stylesheet" href="../css/style.css" type="text/css" media="all" />
</head>
<body>
	<div class="main">
		<?php include "../includes/db.php" ?>
		<div class="faq-content">
			<h3>
				<?php

					$new_title = $_POST['topic'];
					$new_short = $_POST['short'];
					$new_full = $_POST['full'];
					$new_keywords = $_POST['keywords'];

					if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
					    echo "Новый элемент загружен.\n"; 
					    mysqli_query($connection, "INSERT INTO `item` (`title`, `short`, `full`, `keywords`, `image`) VALUES ('".$new_title."','".$new_short."','".$new_full."','".$new_keywords."','".$uploadfile."')");
					    $query = mysqli_query($connection, "SELECT * FROM `item` ORDER BY id DESC LIMIT 1");
					    $items = mysqli_fetch_assoc($query);
					    $array=explode(' ',$items['keywords']);
					    for ($i=0;$i<count($array);$i++){
					    	mysqli_query($connection, "INSERT INTO `categories` (`item_id`, `keyword`) VALUES ('".$items['id']."','".$array[$i]."')");
						}
					} else {
					    echo "Возможная атака с помощью файловой загрузки!\n";
					}
					header("Location: /");
				 ?>
			</h3>
		</div>
	</div>
</body>
</html>