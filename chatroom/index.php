<?php
if(isset($_COOKIE["username"])) {
  echo "<a href='new.php'> creat new chatroom </a>";
} else {
  echo "please login ";
} 
?>