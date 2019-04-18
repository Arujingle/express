<?php 
// Проверяем есть ли доступ к админке у пользователя, если нет выкидываем на главную
	include "includes/db.php";
	if (!isset($_COOKIE['userid'])){
		header("Location: /");
		exit;
	}
	$q = mysqli_query($connection,"SELECT * FROM `users` WHERE `id` = '".$_COOKIE['userid']."'");
	$user = mysqli_fetch_assoc($q);
	if ($user['access_level']==1){
		header("Location: /");
		exit;
	}
 ?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Page</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<script type="text/javascript" src="js/delete.js" defer></script>
	<script type="text/javascript" src="js/add.js" defer></script>
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
				<li><a href="bucket.php">Bucket</a></li>
			  </ul>
		  </div>

		</header>
		<br>
		<form action="search.php" method="post" class="search-action-form">
			<div class="block-widg">
				<h1 class="logo">AkRinat</h1>
				<div class="search">
					<img src="img/search.png" alt="" class="search-img">
					<input type="text" name="search" placeholder="Please type some words here" class="search-form">
					<button class="search-button">SEARCH</button>
				</div>
			</div>
		</form>
		<br>
		<!-- CONTENT PART -->
		<div class="faq-content admin-content">
			<?php
				$query = mysqli_query($connection,"SELECT * FROM `item`");
				while($items = mysqli_fetch_assoc($query)){ ?>
					<div class="admin-element" id=<?php echo '"b'.$items['id'].'"'?>><a href="element.php?id=<?php echo $items['id']?>" class="cart"><div class="cart-img"><img src=<?php echo $items['image'] ?> alt=""></div><h2><?php echo $items['title'] ?></h2><h4><?php echo $items['short'] ?></h4></a><button id=<?php echo $items['id']?> class="subs button-delete">DELETE</button></div>
				<?php } ?>
			<div class="opening-window" id="down">
				<form enctype="multipart/form-data" action="functions/create.php" method="post" class ="opening-window-content">
					<input class="create" type="text" placeholder="Topic text" name="topic" id="add-topic" class ="opening-window-content">
					<input class="create" type="text" placeholder="Short text" name="short" id="add-short" class ="opening-window-content">
					<TEXTAREA class="create create-area" placeholder="Full text" name="full" id="add-full" class ="opening-window-content"></TEXTAREA>
					<input class="create" type="text" placeholder="keywords" name="keywords" id="add-key" class ="opening-window-content">
					<div class="browse-add">
						<div class="subs addone"><input type ="file" value="Browse image" name="userfile" class= "btnadd"><span class="text-inn">Browse image</span></div>
						<input type ="submit" value="ADD" class="subs addone indexup">
					</div>
				</form>
			</div>
			<button class="subs button-add"> <span class="in-text-down" id="button-add"> > </span> </button>

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