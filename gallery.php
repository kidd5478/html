<?php

session_start();

echo "Your username is: " .  $_SESSION['username'];
$username = $_SESSION['username'];


$_SESSION['receipt'] = md5($username);
?>

<html>
<head><title>Gallery Page</title>
</head>
<body><br/>
Gallery PHP<br/>
<a href="gallery.php"> Gallery </a> <a href="upload.php"> Upload </a>
<br />
  <img style="-webkit-user-select: none; cursor: zoom-in;" src="https://s3-us-west-2.amazonaws.com/raw-mak/Knuth-bw.jpg" width="200" height="200">
  &nbsp;
  <img style="-webkit-user-select: none; cursor: zoom-in;" src="https://s3-us-west-2.amazonaws.com/raw-mak/eartrumpet-bw.png" width="200" height="200">
  &nbsp;
  <img style="-webkit-user-select: none; cursor: zoom-in;" src="https://s3-us-west-2.amazonaws.com/raw-mak/mountain-bw.jpg" width="200" height="200">
<br/>
  
  <img style="-webkit-user-select: none; cursor: zoom-in;" src="https://s3-us-west-2.amazonaws.com/finished-mak/Knuth.jpg" width="200" height="200">
  &nbsp;
  <img style="-webkit-user-select: none; cursor: zoom-in;" src="https://s3-us-west-2.amazonaws.com/finished-mak/eartrumpet.png" width="200" height="200">
  &nbsp;
  <img style="-webkit-user-select: none; cursor: zoom-in;" src="https://s3-us-west-2.amazonaws.com/finished-mak/mountain.jpg" width="200" height="200">
  
  
</body></html>
