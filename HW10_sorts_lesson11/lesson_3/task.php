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
    // 2) insert done
/*
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
*/
    // insert sort   
    for ($i=1; $i < count($someRandomArray); $i++) {
        
        $current = $someRandomArray[$i];
        $previous = $someRandomArray[$i-1];
        $continue_for = $i;
           
        while ($current < $previous) {

            $itNum++;
            $someRandomArray[$i] = $previous;
            $someRandomArray[$i-1] = $current;
            if ($i > 1) {
                $i--;
            }
            $current = $someRandomArray[$i];
            $previous = $someRandomArray[$i-1];

        }
        $i = $continue_for;
        $itNum++;
    }

    return $someRandomArray;

};
