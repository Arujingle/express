<html lang="en">
<?php $id = $_GET['id']; ?>
<head>
	<meta charset="UTF-8">
	<title>Element</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<script type="text/javascript" src="js/script.js" defer></script>
</head>
<body>
	<div class="main">
		<?php include "includes/db.php"; ?>
		<?php 
			$query = mysqli_query($connection,"SELECT * FROM `item` WHERE `id` = '" . $id . "'");
			$items = mysqli_fetch_assoc($query);
			?>
		<!-- HEADER PART -->
		<header>
		  <div class="header-bground">
			  <ul>
				<li><a href="index.php" class = "header-active">Home</a></li>
				<li><a href="faq.php">FAQ</a></li>
				<li>
					<a href="login.php">
						<?php if (!isset($_COOKIE['userid'])) {
							echo "Sign In | Sign Up";
						} else {
							echo "Profile";
						} ?>
					</a>
				</li>
				<li><a href="bucket.php">Bucket</a></li>
			  </ul>
		  </div>

		</header>
		<br>
		<form action="search.php" method="post" class="search-action-form"><div class="block-widg"><h1 class="logo">AkRinat</h1><div class="search"><img src="img/search.png" alt="" class="search-img"><input type="text" name="search" placeholder="Please type some words here" class="search-form"><button class="search-button">SEARCH</button></div></div></form>
		<br>
		<!-- CONTENT PART -->
		<div class="content">
			<div class="left-content">
				<div><img class="element-img" src=<?php echo $items['image'] ?>> </div>
			</div>
			<div class="right-content">
				<div><h1><?php echo $items['title'] ?></h1></div>
				<div><h3><?php echo $items['full'] ?></h3></div>
				<div><h4>Keywords: <?php echo str_replace(' ',', ',$items['keywords']) ?></h4></div>
			</div>
		</div>
		
		<br>

		<!-- FOOTER PART -->
		<footer>
			<div class="part1">
					<div class ="social"><a href="https://vk.com/ers_0890"><img src="img/facebook.png" href="#" alt=""></a></div>
					<div class ="social"><a href="https://www.instagram.com/yers___/"><img src="img/instagram.png" alt=""></a></div>
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