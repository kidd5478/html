<?php
session_start();

$email = $_POST['email'];
echo "Your username is: " . $email . "\n";
$_SESSION['user-id'] = $_POST['email'];

?>

<html>
<head><title>Welcome Page</title>
</head>
<body>
<hr />
<a href="gallery.php"> Gallery </a> | <a href="upload.php"> Upload </a>

</body></html>

