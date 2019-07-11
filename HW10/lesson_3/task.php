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
    // 1) for;

    do {

        $min = null;
        $key1 = '';
        foreach ($someRandomArray as $key => $value) {
            if ($value < $min || is_null($min)){
                $min = $value;
                $key1 = $key;
            }
            $itNum++;
        }
    	$sortedArray[] = $min;
    	unset ($someRandomArray[$key1]);
    } while (count($someRandomArray) > 0);

    return $sortedArray;
};
