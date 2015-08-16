<?php
$db = new PDO('mysql:host=localhost;dbname=Chat','root','root');
$room = $_GET["room"];

$query = $db->prepare("SELECT * FROM room where room = '".$room."'");
$query->execute();

while($fetch = $query->fetch(PDO::FETCH_ASSOC)){
	$name = $fetch['name'];
	$message = $fetch['message'];
	echo "<li class='cm'><b>".ucwords($name)."</b> - ".$message."</li>";
}
?>