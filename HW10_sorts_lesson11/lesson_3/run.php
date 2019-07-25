<?php

require_once 'task.php';
require_once 'advancedSort.php';

const LEN = 1500;
const REQUIRED_PROFIT = 50;

$randomArray = range(1, LEN);

shuffle($randomArray);
shuffle($randomArray);
shuffle($randomArray);

$itNumAdvanced = 0;
$itNumStack = 0;

$start = getCurrentTimeInMilliSec();
$advancedSortedArray = advancedSortArray($randomArray, $itNumAdvanced);
$advancedSortTime = (getCurrentTimeInMilliSec() - $start) / 1000; //sec

$start = getCurrentTimeInMilliSec();
$stackSortedArray = stackSortArray($randomArray, $itNumStack);
$stackSortTime = (getCurrentTimeInMilliSec() - $start) / 1000; //sec

$iterationProfit = $itNumStack > 0 ? (int) (floor($itNumAdvanced / $itNumStack * 100) - 100) : 0;
$timeProfit = $stackSortTime > 0 ? (int) (floor($advancedSortTime / $stackSortTime * 100) - 100) : 0;

sort($randomArray);

$isProfitReached = $timeProfit > REQUIRED_PROFIT && $iterationProfit > REQUIRED_PROFIT;

$sortSuccess = false;
$message = '';
if ($randomArray === $advancedSortedArray && $randomArray === $stackSortedArray) {
    $message .= ':-)) SORT SUCCESSFUL!' . PHP_EOL;
    $sortSuccess = true;
} else {
    $message .= ':-(( SORT FAILED' . PHP_EOL;
}

if ($sortSuccess) {
    $message .= 'To sort array with length ' . LEN . ' were spent:' . PHP_EOL;
    $message .= ' - stack sort function: ' . $itNumStack . ' iterations, ' . $stackSortTime . ' sec;' . PHP_EOL;
    $message .= ' - advanced sort function: ' . $itNumAdvanced . ' iterations, ' . $advancedSortTime . ' sec;' . PHP_EOL;
    $message .= 'Iterations profit = ' . $iterationProfit . '%' . PHP_EOL;
    $message .= 'Time profit = ' . $timeProfit . '%' . PHP_EOL;
}

echo $message;

function getCurrentTimeInMilliSec()
{
    return round(microtime(true) * 1000);
}
