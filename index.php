<html>
	<head>
		<title>Login page</title>
		<link rel="stylesheet" href="css/style.css" type="text/css">
		<link rel="stylesheet" href="css/w3.css" type="text/css">
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script> 
		<script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.js"></script> 
	</head>
	<body>
		<div class="w3-container w3-card-4 w3-display-middle" style="width: 60%">
			<form action="editor.php" method="post" id="form_login" >
				<h1>Form di Login<h1>
				<div class="w3-cell-row">
					<h3 class="w3-quarter">Username</h3>
					<input type="text" name="login_user" id="login_user" class="w3-border-blue w3-threequarter">
				</div>
				<hr>
				<div class="w3-cell-row">
					<h3 class="w3-quarter">Password</h3>
					<input type="password" name="login_pass" id="login_pass" class="w3-border-blue w3-threequarter">
				</div>
				<input type="submit" name="login" value="Login" id="login_submit" class="w3-border w3-margin-top w3-xlarge">
			</form>
		</div>
		
	</body>
</html>