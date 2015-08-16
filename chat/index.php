<?php
$user = $_COOKIE['username'];
?>
<html>
<head>
	<title>Chatter</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800">
	<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="javascript/chat.js"></script>
</head>
<body>
<div class="chatContainer">
	<div class="chatHeader">
		<h3>Welcome <?php echo ucwords($user); ?></h3>
	</div>
	<div class="chatMessages"></div>
	<div class="chatBottom">
		<form action="#" id="chatForm" method="POST">
			<input type="hidden" id="name" value="<?php echo $user;?>" />
			<input type="text" name="text" id="text" value="" placeholder="type your chat message">
			<input type="submit" name="submit" value="Post">
		</form>
	</div>
	
</div>
</body>	
</html>