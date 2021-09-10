<?php

$num_of_random = 10;
$numbers = range(0,10000,10);
$randomElements = array_rand($numbers, 500);

$redis = new Redis();
$redis->connect('192.168.30.106',6378);
$redisKey = 'ips_'.date('Y-m-d');

foreach($randomElements as $num) {

    $key =  $numbers[$num];
    $redis->zIncrBy($redisKey,rand(4,10),$key);

}