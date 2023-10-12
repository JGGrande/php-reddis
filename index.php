<?php

use Unialfa\OrderProcessor;
use Unialfa\RedisQueue;

require 'vendor/autoload.php';

$queue = new RedisQueue();

$orderProcessor = new OrderProcessor($queue);

$order = [
    "order_id" => 123,
    "cutomer" => "João Gabriel",
    "email" => "joaogabriel7303@gmail.com",
    "total_amount" => 100.00
];

$orderProcessor->processOrder($order);