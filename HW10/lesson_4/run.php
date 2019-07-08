<?php

require_once 'task.php';
//require_once 'example.php';

const EMPTY_LEN = 100000;
$snakeLen = rand((int) EMPTY_LEN / 2, EMPTY_LEN);

$itNum = 0;

$bag = array_fill(0, EMPTY_LEN, null);
$bag += [EMPTY_LEN => 'tail'];
$bag += array_fill(EMPTY_LEN + 1, $snakeLen , 'body');
$bag += [EMPTY_LEN + $snakeLen + 1 => 'head'];

$tailKey = getSnakeTail($bag, $itNum);

$iterationProfit = EMPTY_LEN - $itNum;

if ($bag[$tailKey] === 'tail' && $itNum <= 20){
    $message = ':-)) SUCCESSFUL! You caught snake tail. Used = ' . $itNum . ' iterations.';
} elseif ($bag[$tailKey] === 'tail' && $itNum > 20) {
    $message = ':-(() FAILED! Snake bit you. Used = ' . $itNum . ' iterations. Snake is faster than you.';
} else {
    $message = ':-(() FAILED! Snake bit you.';
}

echo $message;