<?php

/**
 * @param array $bag
 * @param $itNum
 * @return int|null key of snake tail
 */
function getSnakeTail(array $bag, &$itNum) : ?int
{
    $startIndex = 0;
    $endIndex = count($bag) - 1;

    $tailKey = null;

    // TODO: create sorting

    do {

	    $flag = true;

    	$half = round($endIndex / 2);
    
	    if ($bag[$half] === NULL) {
	    	$startIndex = $half;
	    } elseif ($bag[$half] === "body") {
	    	$endIndex = $half;
	    } elseif ($bag[$half] === "tail") {
	    	$tailKey = $half;
	    	$flag = false;
	    }
	    $itNum++;

	} while ($flag);

    return $tailKey;
};
