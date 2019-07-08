<?php

/**
 * @param array $someRandomArray
 * @param $itNum
 * @return array
 */
function stackSortArray(array $someRandomArray, &$itNum) : array
{
    $max = null;

    foreach ($someRandomArray as $value) {
        $max = $max < $value ? $value : $max;
        $itNum++;
    }

    $sortedArray = [];
    $lastMin = null;

    do {

        $hasMin = false;
        $minStackInside = $max;

        for ($i = 0; $i < count($someRandomArray); $i++) {

            if ($someRandomArray[$i] < $minStackInside && $someRandomArray[$i] > $lastMin) {
                $minStackInside = $someRandomArray[$i];
                $hasMin = true;
            }

            $itNum++;
        }

        $sortedArray[] = $minStackInside;
        $lastMin = $minStackInside;

    } while ($hasMin);

    return $sortedArray;
};