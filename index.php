
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>CalcioForums</title>
<script type="text/javascript" src="javascript/jquery.js"></script>
<script type="text/javascript" src="javascript/hover.js"></script>
<script type="text/javascript" src="javascript/functions.js"></script>
<link rel="stylesheet" type="text/css" href="css/Layout.css">
</head>
<body onload="process()">

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
				
				<li><a href="php/logout.php">Log out</a></li>

			</ul>
			<?php }else{?>
			<ul id="loggedOutNav" class="nav_menu">
				<li><a href="#">Home</a></li>
				<li><a href="#">About</a></li>
				<li id="register"><a href="#">Register</a>
					<ul id="registerForm" class="dropDownForm"
						onsubmit="return registerSubmit()">
						<li>
							<form class="dropDownForm" action="php/register.php"
								method="post" autocomplete="off">
								<input id="usernameReg" type="text" placeholder="Enter Username"
									name="username"><br> <label id="usernameStatus"
									class="statusLabel"></label><input id="passwordReg"
									type="password" placeholder="Enter PassPhrase" name="password"><br>
								<label id="passwordStatus" class="statusLabel"></label> <input
									id="emailReg" type="text" placeholder="Enter email"
									name="email"><br> <label id="emailStatus" class="statusLabel"></label>
								<input id="submitReg" type="submit" value="signup"><br> <label
									id="overallStatusLabel" class="statusLabel"></label>
							</form>
						</li>
					</ul></li>
				<li id="login"><a href="#">Log In</a>
					<ul id="loginForm" class="dropDownForm">
						<li>
							<form class="dropDownForm" action="php/login.php" method="post"
								onsubmit="return loginSubmit()">
								<input id="usernameLog" type="text" placeholder="Username"
									name="username"><br> <input id="passwordLog" type="password"
									placeholder="Password" name="password"><br> <label
									id="loginCredentials" class="statusLabel"></label> <input
									type="submit" value="login">
							</form>
						</li>
					</ul></li>
			</ul>
			<?php }?>			
		</div>
	</div>

	<div class="forum_body">
		<ul class="teamList">
			<li class="Team"></li>
			<li class="Team"></li>
			<li class="Team"></li>
			<li class="Team"></li>
			<li class="Team"></li>
			<li class="Team"></li>
			<li class="Team"></li>
			<li class="Team"></li>
			<li class="Team"></li>
			<li class="Team"></li>
			<li class="Team"></li>
			<li class="Team"></li>
			<li class="Team"></li>
			<li class="Team"></li>
			<li class="Team"></li>
			<li class="Team"></li>
			<li class="Team"></li>
			<li class="Team"></li>
			<li class="Team"></li>
			<li class="Team"></li>
		</ul>
	</div>

	<div class="leagueTable">
		<ul class="teams">
		</ul>
	</div>

</body>
</html>
