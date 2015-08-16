<?php
	define("TITLE", "Register");
	define("theH1", "Register");
	
?>
<?php
	require('config.php');

	if(isset($_POST['submit'])){
		$email1 = $_POST['email1'];
		$email2 = $_POST['email2'];
		$pass1 = $_POST['pass1'];
		$pass2 = $_POST['pass2'];

		if ($email1==$email2) {
			if ($pass1==$pass2){
				$user = mysql_escape_string($_POST['user']);
				$pass1 = mysql_escape_string($pass1);
				$pass2 = mysql_escape_string($pass2);
				$email1 = mysql_escape_string($email1);
				$email2 = mysql_escape_string($email2);

				$sql = mysql_query("SELECT * FROM `users` WHERE `Username` = '$user'");
				if(mysql_num_rows($sql) > 0) {
					echo "Sorry, Username already exists.";
					exit();
				}

				mysql_query("INSERT INTO `users` (`ID`, `Username`, `Password`, `Email`) VALUES 
 (NULL, '$user','$pass1','$email1')");
				$form = <<< EOT
		Registered successfully! <a href="login.php" class="center">Login with your account now.</a><br><br>
EOT;
		echo $form;

			}else{
				echo "Sorry, your passwords do not match.<br />";
				exit();
			}
		}else{
			echo "Sorry, your email do not match.<br />";
			exit();
		}


	}else{
$form = <<< EOT
		<form action="register.php" method="POST">
			<table class="midTable">
			<tr><td>Username:</td> <td> <input type="text" name="user" /></td></tr>
			<tr><td>Password:</td> <td> <input type="password" name="pass1" /></td></tr>
			<tr><td>Confirm Password: </td> <td><input type="password" name="pass2" /></td></tr>
			<tr><td>E-mali: </td> <td><input type="text" name="email1" /></td></tr>
			<tr><td>Confirm E-mali: </td> <td><input type="text" name="email2" /></td></tr>
			<tr><td colspan="2"><input type="submit" value="Register" name="submit" class="btn green" /></td></tr>
			</table><br>
		</form>
EOT;
		echo $form;
	}
?>