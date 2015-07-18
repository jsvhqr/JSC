
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>CalcioForums</title>
<script type="text/javascript" src="javascript/pageLoad.js"></script>
<script type="text/javascript" src="javascript/functions.js"></script>
<link rel="stylesheet" type="text/css" href="css/Layout.css">
</head>
<body>

	<div class="top_container">
		<div class="header">
			<h1>Calcio Forums</h1>
		</div>

		<div class="nav_menu">
			<?php
			session_start ();
			if (isset ( $_SESSION ['loggedin'] ) && $_SESSION ['loggedin'] == TRUE && $_SESSION ['ip'] == $_SERVER ['REMOTE_ADDR']) {
				?>
			<ul id="loggedInNav" class="nav_menu">
				<li><a href="#">Home</a></li>
				<li><a href="#">About</a></li>
				<li><a href="#"><?php echo $_SESSION['username']; ?> </a>
			
			</ul>
			<?php }else{?>
			<ul id="loggedOutNav" class="nav_menu">
				<li><a href="#">Home</a></li>
				<li><a href="#">About</a></li>
				<li><div class="hoverDropDown" onmouseover="onHoverRegister()">
						<a href="#">Register</a>
					</div>
					<div id="registerForm" class="dropDownForm">
						<form class="dropDownForm" action="php/register.php" method="post">
							<input type="text" placeholder="Enter Username" name="username"><br>
							<input type="password" placeholder="Enter PassPhrase"
								name="password"><br> <input type="text"
								placeholder="Enter email" name="email"><br> <input type="submit"
								value="signup">
						</form>
					</div></li>
				<li><div class="hoverDropDown" onmouseover="onHoverLogin()"">
						<a href="#">Log In</a>
					</div>
					<div id="loginForm" class="dropDownForm">
						<form class="dropDownForm" action="php/login.php" method="post">
							<input type="text" placeholder="Username" name="username"><br> <input
								type="password" placeholder="Password" name="password"><br> <input
								type="submit" value="login">
						</form>
					</div></li>
			</ul>
			<?php }?>			
		</div>
	</div>

	<div class="forum_body"></div>

</body>
</html>
