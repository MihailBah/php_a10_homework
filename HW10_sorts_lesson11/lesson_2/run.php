<?php

require_once 'task.php';
require_once 'simpleSort.php';

const LEN = 1500;
const REQUIRED_PROFIT = 50;

$randomArray = range(1, LEN);

shuffle($randomArray);
shuffle($randomArray);
shuffle($randomArray);

$itNumSimple = 0;
$itNumAdvanced = 0;

$start = getCurrentTimeInMilliSec();
$simpleSortedArray = simpleSortArray($randomArray, $itNumSimple);
$simpleSortTime = (getCurrentTimeInMilliSec() - $start) / 1000; //sec

$start = getCurrentTimeInMilliSec();
$advancedSortedArray = advancedSortArray($randomArray, $itNumAdvanced);
$advancedSortTime = (getCurrentTimeInMilliSec() - $start) / 1000; //sec

$iterationProfit = $itNumAdvanced > 0 ? (int) (floor($itNumSimple / $itNumAdvanced * 100) - 100) : 0;
$timeProfit = $advancedSortTime > 0 ? (int) (floor($simpleSortTime / $advancedSortTime * 100) - 100) : 0;

sort($randomArray);

$isProfitReached = $timeProfit > REQUIRED_PROFIT && $iterationProfit > REQUIRED_PROFIT;

$sortSuccess = false;
$message = '';
if ($randomArray === $advancedSortedArray && $randomArray === $simpleSortedArray) {
    $message .= 'Sort successful!' . PHP_EOL;
    $sortSuccess = true;
} else {
    $message .= 'Sort failed.' . PHP_EOL;
}

if ($sortSuccess) {
    $message .= $isProfitReached ? 'SORT PROFIT REACHED!' . PHP_EOL : 'SORT PROFIT FAILED! You need reach profit +'. REQUIRED_PROFIT. '%' . PHP_EOL;
    $message .= 'To sort array with length ' . LEN . ' were spent:' . PHP_EOL;
    $message .= ' - simple sort function: ' . $itNumSimple . ' iterations, ' . $simpleSortTime . ' sec;' . PHP_EOL;
    $message .= ' - advanced sort function: ' . $itNumAdvanced . ' iterations, ' . $advancedSortTime . ' sec;' . PHP_EOL;
    $message .= 'Iterations profit = ' . $iterationProfit . '%' . PHP_EOL;
    $message .= 'Time profit = ' . $timeProfit . '%' . PHP_EOL;
}

if ($isProfitReached) {
    $message .= ':-)) YEAR! You are a super programmer, the world needs you!!!' . PHP_EOL;
} else {
    $message .= ':-(( OPPS. You have not yet become a real programmer, keep on trying and you will succeed.' . PHP_EOL;
}

echo $message;

function getCurrentTimeInMilliSec()
{
    return round(microtime(true) * 1000);
}
