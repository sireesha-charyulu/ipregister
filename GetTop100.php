<?php
$start = microtime(true);

include_once('IPRegister.php');

$object = new IPAddressDayCounter();
var_dump($object->top100());

echo "total Time taken by Script Execution: ".(microtime(true) - $start) ."\n";
