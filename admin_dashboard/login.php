<!DOCTYPE html>
<html>
<head>
    <title>LOGIN PAGE</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<div id="frm">
		<form action="process.php" method="POST">
			<p>
				<label>Username:</label>
				<input type="text" id="user" name="user">
			</p>
			<p>
				<label>Password:</label>
				<input type="password" id="pass" name="pass">
			</p>
			<p>
				<button type="submit" id="btn">Login</button>
			</p>
		</form>
	</div>
</body>
</html>
