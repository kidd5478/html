<?php
session_start();

$username = $_POST['user-id'];

echo "Your username is: " . $username . "\n";

$_SESSION['user-id'] = $_POST['user-id'];




?>

<html>
<head><title>Welcome Page</title>
</head>
<body>
<hr />
<a href="gallery.php"> Gallery </a> | <a href="upload.php"> Upload </a>

</body></html>
~
