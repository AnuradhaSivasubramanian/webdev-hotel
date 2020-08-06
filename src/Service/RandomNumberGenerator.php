<?php

namespace App\Service;

use Psr\Log\LoggerInterface;

class RandomNumberGenerator
{
    private $logger;
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
    public function getRandomNumber()
    {
        $numbers = [10, 20, 30];
        shuffle($numbers);
        $number = array_pop($numbers);
        return $number;
    }
}