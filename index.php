<?php

session_start();
echo "Hello World";
// Include the SDK using the Composer autoloader
require 'vendor/autoload.php';
$s3 = new Aws\S3\S3Client([
    'version' => 'latest',
    'region'  => 'us-west-1'
]);
// Use an Aws\Sdk class to create the S3Client object.
$result = $s3->listBuckets();
foreach ($result['Buckets'] as $bucket) {
    echo $bucket['Name'] . "\n";
}
// Convert the result object to a PHP array
$array = $result->toArray();
?>

<head><title>Hello app</title>
</head>
<body>

<!-- The data encoding type, enctype, MUST be specified as below -->
<form enctype="multipart/form-data" action="welcome.php" method="POST">
    <!-- MAX_FILE_SIZE must precede the file input field -->
    <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
    <!-- Name of input element determines name in $_FILES array -->
    Send this file: <input name="userfile" type="file" /><br />
Enter Email of user: <input type="email" name="email"><br />
Enter Phone of user (1-XXX-XXX-XXXX): <input type="phone" name="phone">

<input type="submit" value="Send File" />
</form>
<hr />


</body>
</html>
