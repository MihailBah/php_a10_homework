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
    // 2) insert
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
    
    do {

        for ($i=1; $i < count($someRandomArray); $i++) {
    
            $isSorted = true;

            $current = $someRandomArray[$i];
            $previous = $someRandomArray[$i-1];

            while ($current < $previous) {

                $someRandomArray[$i] = $previous;
                $someRandomArray[$i-1] = $current;
                $i--;
                $current = $someRandomArray[$i];
                $previous = $someRandomArray[$i-1];
                $isSorted = false;
                $itNum++;

            }
            $itNum++;
        }
        $itNum++;

    } while (!$isSorted);

    return $someRandomArray;

};
