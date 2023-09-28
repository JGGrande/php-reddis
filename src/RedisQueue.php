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
}