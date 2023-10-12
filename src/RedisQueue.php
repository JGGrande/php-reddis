<?php 

namespace Unialfa;

use Predis\Client;

class RedisQueue {
    private $redis;

    public function __construct() {
        $this->redis= new Client(
            [
                'schema' => 'tcp',
                'host' => 'redis',
                'port' => 6379
            ]
        );
    }

    public function toQueue($queueName, $item){
        $this->redis->rpush($queueName, $item);
    }
    public function consumerQueue($queueName){
        return $this->redis->lpop($queueName);
    }
    public function getQueueLenght($queueName){
        return $this->redis->llen($queueName);
    }
    public function getRedisInstance(){
        return $this->redis;
    }
}