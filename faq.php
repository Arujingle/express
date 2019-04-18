<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>FAQ</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
</head>
<body>
	<div class="main">
		<!-- HEADER PART -->
		<header>
		  <div class="header-bground">
			  <ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="faq.php" class = "header-active">FAQ</a></li>
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
		<div class="faq-content">
			<h1 class="logo faq-font">Buy on AkRinat</h1>
			<div class="faq-imgs"><img src="img/faq0.jpg" alt=""></div>
			<div class="box-faq">
				<h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero obcaecati voluptatibus, nemo harum aut porro aliquid quasi beatae dicta, repellat provident cumque architecto consequuntur officia natus. Est aliquid nihil assumenda.</h2>
			</div>
			<div class="faq-imgs"><img src="img/faq1.jpg" alt=""></div>
			<div class="box-faq">
				<h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero obcaecati voluptatibus, nemo harum aut porro aliquid quasi beatae dicta, repellat provident cumque architecto consequuntur officia natus. Est aliquid nihil assumenda.</h2>
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