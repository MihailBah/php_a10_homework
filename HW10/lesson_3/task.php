<?php

/**
 * @param array $someRandomArray
 * @param $itNum
 * @return array
 */
function stackSortArray(array $someRandomArray, &$itNum) : array
{
    $sortedArray = [];

    // TODO: create sorting

    do {
    	$sortedArray[] = min($someRandomArray);
    	$someRandomArray = array_flip($someRandomArray);
    	unset ($someRandomArray[end($sortedArray)]);
    	$someRandomArray = array_flip($someRandomArray);
    	$itNum++;
    } while (count($someRandomArray) > 0);

    return $sortedArray;
};
