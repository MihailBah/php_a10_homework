<?php

/**
 * @param array $someRandomArray
 * @param $itNum
 * @return array
 */
function simpleSortArray(array $someRandomArray, &$itNum) : array
{
    do {
        $isSorted = false;

        for ($i = 0; $i < count($someRandomArray) - 1; $i++) {

            $prev = $someRandomArray[$i];
            $next = $someRandomArray[$i + 1];

            if ($prev > $next) {

                $someRandomArray[$i] = $next;
                $someRandomArray[$i + 1] = $prev;

                if (!$isSorted) {
                    $isSorted = true;
                }
            }

            $itNum++;
        }

    } while ($isSorted);

    return $someRandomArray;
};