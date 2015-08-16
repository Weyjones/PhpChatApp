<?php

$length = 5;

$randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyz"), 0, $length);

echo "<a href='".$randomString."'> creat new chatroom </a>";

?>

<html>
<head>
	<title>Chatter</title>
	<meta http-equiv="refresh" content="0; URL=<?php echo"chat.php?room=".$randomString."";?>">
</head>
<body>
</body>	
</html>