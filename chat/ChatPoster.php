<?php
	$db = new PDO('mysql:host=localhost;dbname=Chat','root','root');

	if(isset($_POST['text'])){
		$text = $_POST['text'];
		$name = $_POST['name'];

			$sql = "INSERT INTO messages (id,name,message) VALUES (null,:name,:message)";
			$q = $db->prepare($sql);
			$q->execute(array(':name'=>$name,
              ':message'=>$text));

			echo "<li class='cm'><b>".ucwords($name)."</b> - ".$text."</li>";
		
	}

?>