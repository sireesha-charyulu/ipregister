<?php

class IPAddressDayCounter {

    CONST redisIp   = '192.168.30.106';
    CONST redisPort = '6378';

    private $_redis = NULL;
    private $_date = NULL;
    private $_error = NULL;


    public function __construct($showExecutionData = false) {

        $this->_initRedisConn();
        $this->_date = date('Y-m-d');
        $this->_showExecutionData = filter_var($showExecutionData, FILTER_VALIDATE_BOOLEAN);

    }

    private function _initRedisConn() {

        try{
            $this->_redis = new Redis();
            $this->_redis->pconnect(self::redisIp, self::redisPort);

        } catch (Exception $e){

            $this->_error .= "Redis connection has error :- ".$e->getMessage()." \n\n";
        }
    }

    public function request_handled($ip_address) {

        $iptolong = ip2long($ip_address);
        //$iptolong = $ip_address;
        try {

            $this->_redis->ZINCRBY( 'ips_'.$this->_date,1,$iptolong);

        } catch (RedisException $e) {

            $this->_error .= "Redis could not store or increment the IP has error :- ".$e->getMessage()." \n\n";
        }

    }

    public function top100() {

        try {

            $top100Ips = $this->_redis->zRevRange( 'ips_'.$this->_date, 0, 100);
            return $top100Ips;

        } catch (RedisException $e) {

            $this->_error .= "Redis could not store or increment the IP has error :- ".$e->getMessage()." \n\n";
        }

    }

    public function clear() {

        //Delete this redis key, flushes all data for that redis key.
        $previousDate = date('Y-m-d', strtotime(' -1 day'));
        echo 'deleting key '.'ips_'.$previousDate.PHP_EOL ;
        $this->_redis->del('ips_'.$previousDate);

    }

}
