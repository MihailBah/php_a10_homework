<?php

/**
 * @param array $someRandomArray
 * @param $itNum
 * @return array
 */
function advancedSortArray(array $someRandomArray, &$itNum) : array
{
    $startAvers = 0;
    $startRevers = count($someRandomArray) - 1;

    do {
        $isSorted = false;

        for ($i = $startAvers; $i < count($someRandomArray) - 1; $i++) {

            $prev = $someRandomArray[$i];
            $next = $someRandomArray[$i + 1];

            if ($prev > $next) {

                $someRandomArray[$i] = $next;
                $someRandomArray[$i + 1] = $prev;

                if (!$isSorted) {
                    $isSorted = true;
                }

                $startRevers = $i;
            }

            $itNum++;
        }

        for ($y = $startRevers; $y !== 0; $y--) {

            $prev = $someRandomArray[$y];
            $next = $someRandomArray[$y - 1];

            if ($prev < $next) {

                $someRandomArray[$y] = $next;
                $someRandomArray[$y - 1] = $prev;

                if (!$isSorted) {
                    $isSorted = true;
                }

                $startAvers = $y;
            }

            $itNum++;
        }

    } while ($isSorted);

    return $someRandomArray;
};