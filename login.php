<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Auth</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<script type="text/javascript" src="js/auth.js" defer></script>
</head>
<body>
	<div class="main">
		<?php include "includes/db.php" ?>
		<!-- HEADER PART -->
		<header>
		  <div class="header-bground">
			  <ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="faq.php">FAQ</a></li>
				<li>
					<a href="login.php" class = "header-active">
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
		
		<div class="faq-content login-page">
			<h3 class="result" id="resultant"></h3>
			<div class = <?php if (isset($_COOKIE['userid'])){echo "hide";}else{echo "inner-content";}?> id="before-logging">
				<h3>Username</h3><input id="login" type="text" placeholder="Type your username">
				<h3>Password</h3><input id="pass" type="password" placeholder="Type your password">
				<div class="login-register">
					<button class="button-login">SIGN IN</button>
					<div class="divider"></div>
					<button class="button-register">SIGN UP</button>
				</div>
			</div>
			<div class= <?php if (!isset($_COOKIE['userid'])){echo "hide";}else{echo "inner-content";}?> id="after-logging">
				<?php
					$user['id']=0;
					$result="";
					if (isset($_COOKIE['userid'])){
						$q = mysqli_query($connection,"SELECT * FROM `users` WHERE `id` = '".$_COOKIE['userid']."'"); 
						$user = mysqli_fetch_assoc($q);
						$result = "Username: ".$user['username'];
					}else{
						$result = "Welcome to AkRinat!";
					}
				?>
				<h3><?php echo $result;?></h3>
				<?php
					if (isset($_COOKIE['userid'])){
						if ($user['access_level']==2){?>
							<a href="adminpage.php" class="adminb">Admin Page</a>
						<?php
						}
					} ?>
			</div>
		</div>
		<div class="empty"></div>
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