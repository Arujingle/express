<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Search</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
</head>
<body>
	<div class="main">
		<?php include "includes/db.php"; ?>
		<!-- HEADER PART -->

		<header>
		  <div class="header-bground">
			  <ul>
				<li><a href="index.php">Home</a></li>
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
		<form action="search.php" method="post" class="search-action-form"><div class="block-widg"><h1 class="logo">AkRinat</h1><div class="search"><img src="img/search.png" alt="" class="search-img"><input type="text" value=<?php echo  '"'.$_POST['search'].'"' ?> name="search" placeholder="Please type some words here" class="search-form"><button class="search-button">SEARCH</button></div></div></form>
		<br>
		<!-- CONTENT PART -->
		<div class="content">
			<?php
				$array1=[];
				$array2 = explode(' ', $_POST['search']);
				for($i=0;$i<count($array2);$i++){

					$query = mysqli_query($connection,"SELECT * FROM `item` INNER JOIN `categories` ON item.id=categories.item_id AND categories.keyword='".$array2[$i]."'");
					while($items = mysqli_fetch_assoc($query)){
						if (!in_array($items['item_id'], $array1)){
							array_push($array1, $items['item_id']);?>
							<a href="element.php?id= <?php echo $items['item_id']?>" class="cart"><div class="cart-img"><img src=<?php echo $items['image'] ?> alt=""></div><h2><?php echo $items['title'] ?></h2><h4><?php echo $items['short'] ?></h4></a>
					
						<?php }
					} ?>
				<?php } ?>

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