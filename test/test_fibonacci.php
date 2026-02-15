<?php
// test/test_fibonacci.php
require_once '../Building/FibonacciDifficulty.php';
require_once '../Building/FibonacciSequence.php';

function test_fibonacci() {
    $fib = new FibonacciSequence();
    $result = $fib->get(5); // Doit retourner 5
    echo "Test Fibonacci 5: ".($result === 5 ? 'OK' : 'FAIL')."\n";
    
    $diff = new FibonacciDifficulty();
    $level = $diff->getDifficulty(6); // Selon l'implémentation
    echo "Test FibonacciDifficulty: ".$level."\n";
}

test_fibonacci();
