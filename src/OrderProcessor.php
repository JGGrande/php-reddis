<?php 

namespace Unialfa;

class OrderProcessor {
    
    private $queue;
    
    public function __construct(RedisQueue $queue)
    {
        $this->queue = $queue;
    }

    public function processOrder(array $order){
        $this->queue->toQueue("email_queue", json_encode($order));
    }
}