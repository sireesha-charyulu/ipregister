<?php

include_once('IPRegister.php');

$start = microtime(true);
$sampleObject = new IPAddressDayCounter();
$sampleObject->clear();

echo "total Time taken by Script Execution: ".(microtime(true) - $start) ."\n";