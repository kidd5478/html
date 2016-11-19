<?php

require 'vendor/autoload.php';
//http://docs.aws.amazon.com/aws-sdk-php/guide/latest/service-sqs.html

$sqsclient = new Aws\Sqs\SqsClient([
    'region'  => 'us-west-2',
    'version' => 'latest'
]);

// Code to retrieve the Queue URLs
$sqsresult = $sqsclient->getQueueUrl([
    'QueueName' => 'inclass2', // REQUIRED
]);

echo $sqsresult['QueueURL'];
$queueUrl = $sqsresult['QueueURL'];

$sqsresult = $sqsclient->sendMessage([
    'MessageBody' => $receipt, // REQUIRED
    'QueueUrl' => $queueUrl // REQUIRED
]);

echo $sqsreult['MessageId'];
?>
