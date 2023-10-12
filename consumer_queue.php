<?php

use Unialfa\RedisQueue;

require "vendor/autoload.php";

$redisQueue = new RedisQueue();

$queueName = "email_queue";

while(true){
    if($redisQueue->getQueueLenght($queueName) > 0){
        $orderData = $redisQueue->consumerQueue($queueName);
        
        $order = json_decode($orderData, true);
        $email = $order['email'];

        file_put_contents('emails.log', print_r($order, true), FILE_APPEND);

        echo "email enviado: $email <br>";
    }else {
        echo "A fila de emails está vazia esperando dados...";
        sleep(5);
    }
}