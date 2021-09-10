<?php

include_once('IPRegister.php');

$start = microtime(true);
$sampleObject = new IPAddressDayCounter();
//Adding original data
$i=1;
$ips = 20000000;
while( $i < $ips ) {
    //$randIP = $i . "." . mt_rand(0, 255) . "." . mt_rand(0, 255) . "." . mt_rand(0, 255);
    //$sampleObject->request_handled($randIP);
    $sampleObject->request_handled($i);
    $i++;
}
echo "total Time taken by Script Execution: ".(microtime(true) - $start) ."\n";


