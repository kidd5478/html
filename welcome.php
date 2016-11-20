<?php
session_start();

$username = $_POST['username'];

echo "Your username is: " . $username . "\n";

$_SESSION['username'] = $_POST['username'];




?>

<html>
<head><title>Welcome Page</title>
</head>
<body>
<hr />
<a href="gallery.php"> Gallery </a> | <a href="upload.php"> Upload </a>

</body></html>
~
