<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
</head>
<body  align="center" background="2.jpg">
<?php 
	$username = $password = "";
	if($_SERVER['REQUEST_METHOD'] === "POST") {
		$username = "ofnahid";
		$password = "12345";

		if($username === $_POST['username'] && $password === $_POST['password']) {

			if(isset($_POST['rememberme'])) {
				setcookie("username", $username, time() + 60*60*24);
				setcookie("password", $password, time() + 60*60*24);
				setcookie("rememberme", "1", time() + 60*60*24);
			}

			session_start();
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;

			header("Location: home.php");
		}
	}

	if(isset($_COOKIE['rememberme'])) {
		$username = $_COOKIE['username'];
		$password = $_COOKIE['password'];
	}
?>



	<h1>Login Form</h1>
	<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
		<br><br>
		<label for="username">Username: </label>
		<input type="text" name="username" id="username" value="<?php echo $username; ?>">

		<br><br>

		<label for="password">Password: </label>
		<input type="password" name="password" id="password" value="<?php echo $password; ?>">

		<br><br>

		<input type="checkbox" name="rememberme" id="rememberme" value="1">
		<label for="rememberme">Remember Me</label>

		<input type="submit" name="submit" value="Login">
	</form>

	<br>


	Not yet a Member? <a href="Registration.php">Sign Up</a>
</body>
</html>