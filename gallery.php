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


</body>
</html>


<?php
session_start();
require 'vendor/autoload.php';

$rdsclient = new Aws\Rds\RdsClient([
  'region'            => 'us-west-2',
    'version'           => 'latest'
]);

// have to hard code this here because index.php doesn't exist
$_SESSION['email'] = "mkidd@iit.edu";


// Retrieve the POSTED file information (location, name, etc, etc)

$uploaddir = '/tmp/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);


$rdsresult = $rdsclient->describeDBInstances([
    'DBInstanceIdentifier' => 'mydbinstancefixed'
]);

$endpoint = $rdsresult['DBInstances'][0]['Endpoint']['Address'];
echo $endpoint . "\n";


$link = mysqli_connect($endpoint,"masterawsuser","masteruserpassword","controller") or die("Error " . mysqli_error($link));

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

// code to insert new record
/* Prepared statement, stage 1: prepare */
if (!($stmt = $link->prepare("INSERT INTO items(id, email, phone, filename, s3rawurl, s3finishedurl, status, issubscribed) VALUES (NULL,?,?,?,?,?,?,?)"))) {
    echo "Prepare failed: (" . $stmt->errno . ") " . $stmt->error;
}
$email=$_SESSION['email'];
$phone='1234567';
$finishedurl=' ';
$status=0;
$issubscribed=0;
$receipt=md5($url);
// prepared statements will not accept literals (pass by reference) in bind_params, you need to declare variables
$stmt->bind_param("sssssii",$email,$phone,$receipt,$url,$finishedurl,$status,$issubscribed);

if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}

printf("%d Row inserted.\n", $stmt->affected_rows);


/* explicit close recommended */
$stmt->close();



// SELECT *

$link->real_query("SELECT * FROM items");
$res = $link->use_result();

echo "Result set order...\n";
while ($row = $res->fetch_assoc()) {
    echo " id = " . $row['id'] . "\n";
}


$link->close();



?>

