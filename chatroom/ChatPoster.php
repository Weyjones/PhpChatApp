<?php
	$db = new PDO('mysql:host=localhost;dbname=Chat','root','root');

	if(isset($_POST['message'])){
		$room = $_POST['room'];
		$message = $_POST['message'];
		$name = $_POST['name'];


		
			$sql = "INSERT INTO room (room,name,message) VALUES (:room,:name,:message)";
			$q = $db->prepare($sql);
			$q->execute(array(':room'=>$room,
				':name'=>$name,
              ':message'=>$message));


			echo "<li class='cm'><b>".ucwords($name)."</b> - ".$message."</li>";
		
	}

?>