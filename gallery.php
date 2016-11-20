<?php

session_start();

echo "Your username is: " .  $_SESSION['username'];
$username = $_SESSION['username'];
echo "\n" . md5($username);

$_SESSION['receipt'] = md5($username);
?>

<html>
<head><title>Gallery Page</title>
</head>
<body>
Gallery PHP
<a href="gallery.php"> Gallery </a> <a href="upload.php"> Upload </a>

  <img style="-webkit-user-select: none; cursor: zoom-in;" src="https://s3-us-west-2.amazonaws.com/raw-mak/img/Knuth-bw.jpg.png" width="200" height="200">
  <br/ >
  <img style="-webkit-user-select: none; cursor: zoom-in;" src="https://s3-us-west-2.amazonaws.com/raw-mak/img/eartrumpet-bw.png" width="200" height="200">
  <br/ >
  <img style="-webkit-user-select: none; cursor: zoom-in;" src="https://s3-us-west-2.amazonaws.com/raw-mak/img/mountain-bw.jpg" width="200" height="200">

</body></html>
