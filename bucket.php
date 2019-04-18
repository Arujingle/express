<?php 
// Проверяем зашел ли пользователь на сайт. Если нет, выкидываем на главную
	include "includes/db.php";
	if (!isset($_COOKIE['userid'])){
		header("Location: /");
		exit;
	}
	$q = mysqli_query($connection,"SELECT * FROM `users` WHERE `id` = '".$_COOKIE['userid']."'");
	$user = mysqli_fetch_assoc($q);
 ?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Page</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<script type="text/javascript" src="js/bucket-delete.js" defer></script>
</head>
<body>
	<div class="main">
		<!-- HEADER PART -->
		<header>
		  <div class="header-bground">
			  <ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="faq.php">FAQ</a></li>
				<li><a href="login.php">Profile</a></li>
				<li><a href="bucket.php" class = "header-active">Bucket</a></li>
			  </ul>
		  </div>

		</header>
		<br>
		<form action="search.php" method="post" class="search-action-form"><div class="block-widg"><h1 class="logo">AkRinat</h1><div class="search"><img src="img/search.png" alt="" class="search-img"><input type="text" name="search" placeholder="Please type some words here" class="search-form"><button class="search-button">SEARCH</button></div></div></form>
		<br>
		<!-- CONTENT PART -->
		<div class="faq-content admin-content">
			<?php
			// Берем инфу с Базы и циклично вставляем на страницу
				$query = mysqli_query($connection,"SELECT * FROM `bucket` INNER JOIN `item` ON item.id=bucket.item_id AND bucket.user_id='".$_COOKIE['userid']."'");
				while($items = mysqli_fetch_assoc($query)){ ?>
					<div class="admin-element" id=<?php echo '"b'.$items['id'].'"'?>><a href="element.php?id=<?php echo $items['id']?>" class="cart"><div class="cart-img"><img src=<?php echo $items['image'] ?> alt=""></div><h2><?php echo $items['title'] ?></h2><h4><?php echo $items['short'] ?></h4></a><button id=<?php echo $items['id']?> class="subs button-delete">DELETE</button></div>
				<?php } ?>
		</div>
		
		<br>

		<!-- FOOTER PART -->
		<footer>
			<div class="part1">
					<div class ="social"><a href="https://vk.com/ers_0890"><img src="img/facebook.png" href="#" alt=""></a></div>
					<div class ="social"><a href="https://www.instagram.com/nadyrcoop/"><img src="img/instagram.png" alt=""></a></div>
			</div>
			<div class="divider"></div>
			<div class="part2">
				<div>Enter name <input type="text" class="subscription" id="name"></div>
				<div>Enter e-mail <input type="text" class="subscription" id="e-mail"></div>
				<button class="subs">Subscribe</button>
			</div>

		</footer>
	</div>
</body>
</html>