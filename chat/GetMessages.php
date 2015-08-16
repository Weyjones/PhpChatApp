<?php
$db = new PDO('mysql:host=localhost;dbname=Chat','root','root');

$query = $db->prepare("SELECT * FROM messages");
$query->execute();

while($fetch = $query->fetch(PDO::FETCH_ASSOC)){
	$name = $fetch['name'];
	$message = $fetch['message'];
	echo "<li class='cm'><b>".ucwords($name)."</b> - ".$message."</li>";
}
?>