<?php

session_start();
echo "Your username is: "$_SESSION['user-id'];
$username = $_SESSION['user-id'];


$_SESSION['receipt'] = md5($username);

require 'vendor/autoload.php';

use Aws\Rds\RdsClient;
$client = RdsClient::factory(array(
'region'  => 'us-west-2'
));


$result = $client->describeDBInstances(array(
    'DBInstanceIdentifier' => 'mydbinstancefixed',
));


$endpoint = ""; 


foreach ($result->getPath('DBInstances/*/Endpoint/Address') as $ep) {
    // Do something with the message
    echo "============". $ep . "================";
    $endpoint = $ep;
}



echo "begin database";
$link = mysqli_connect($endpoint,"masterawsuser","masteruserpassword","mydbinstancefixed") or die("Error " . mysqli_error($link));

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
/*
$delete_table = 'DELETE TABLE student';
$del_tbl = $link->query($delete_table);
if ($delete_table) {
        echo "Table student has been deleted";
}
else {
        echo "error!!";

}
*/
$create_table = 'CREATE TABLE IF NOT EXISTS items  
(
    id INT NOT NULL AUTO_INCREMENT,
    email VARCHAR(200) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    filename VARCHAR(255) NOT NULL,
    s3rawurl VARCHAR(255) NOT NULL,
    s3finishedurl VARCHAR(255) NOT NULL,
    status INT NOT NULL,
    issubscribed INT NOT NULL,
    PRIMARY KEY(id)
)';



$create_tbl = $link->query($create_table);
if ($create_table) {
	echo "Table is created or No error returned.";
}
else {
        echo "error!!";  
}
$link->close();



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
