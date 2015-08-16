<?php
	define("TITLE", "Login Page");
	define("theH1", "LOGIN");
	
?>

			
<div class="reg">
<script type="text/javascript">

   function setCookie(id,user)
   {
   	var date = new Date();
  	date.setTime(date.getTime() + (30 * 60 * 1000));
  	var expires = date.toUTCString();
   	document.cookie="id="+id+";"+'expires=' + expires + ';';
    document.cookie="username="+user+";"+'expires=' + expires + ';';
   }
   function delete_cookie(name) {
  document.cookie = name + "=; expires=Thu, 01 Jan 1970 00:00:00 GMT;";
}
</script>
<?php
require('config.php');
if(isset($_GET['logout'])){
	echo '<script> delete_cookie("id");</script>';
	echo '<script> delete_cookie("username");</script>';
	echo '<script> window.location.reload();</script>'; 
}
if($_COOKIE['username']!=NULL){
	echo "Logged in as <b>".$_COOKIE['username']."</b><br><br>";
	echo "You can go to <a href='chat/index.php'> chatroom </a> or <a href='?logout'> Logout </a><br>";

}else if(isset($_POST['submit'])){
	$user = mysql_escape_string($_POST['user']);
	$pass = mysql_escape_string($_POST['pass']);

	$sql = mysql_query("SELECT * FROM `users` WHERE `Username` = '$user' AND `Password` = '$pass'");
				if(mysql_num_rows($sql) > 0) {
					while($row = mysql_fetch_array($sql)){
						$expire = time() +60*60*24*30;
						setcookie('ID', $row['ID'], $expire);
						echo '<script> setCookie("'.$row['ID'].'","'.$row['Username'].'");</script>';
						
						echo "Logged in as <b>".$row['Username']."</b><br><br>";
						$ID=$row['ID'];
						echo "You can go to <a href='chat/index.php?u=".$row['Username']."'> chatroom </a> or <a href='?logout'> Logout </a><br>";
					}
				}else{
					echo "<b>Wrong Username or Password</b><br>";
					
				}
				mysql_close(mysql_connect("localhost","root","root"));
}else{
$form = <<< EOT
		<form action="login.php" method="POST">
			<table class="midTable">
			<tr><td>Username:</td> <td><input type="text" name="user" /></td></tr>
			<tr><td>Password:</td> <td> <input type="password" name="pass" /></td></tr>
			<tr><td><input type="submit" value="Login" name="submit" /></td>
			<td style="font-size: 60%;">Dont have account? <a href="register.php">Sign UP</a></td></tr>
			</table><br>
		</form>
EOT;
		echo $form;
}
?>
<script type="text/javascript">

   function setCookie(name,value)
   {
    document.cookie= "name="+value; 
   }
</script>
</div>