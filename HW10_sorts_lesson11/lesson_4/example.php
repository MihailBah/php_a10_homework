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

    $searchIndex = (int) round($endIndex / 2, 0);
    $catch = false;

    do {

        if ($bag[$searchIndex] === null) {
            $startIndex = $searchIndex;
            $searchIndex += (int) round(($endIndex - $searchIndex) * 0.5);
        } else {
            $endIndex = $searchIndex;
            $searchIndex -= (int) round(($searchIndex - $startIndex) * 0.5);
        }

        if ($endIndex - $startIndex <= 2) {
            $catch = true;
            $tailKey = $bag[$searchIndex] === null ? $searchIndex + 1 : $searchIndex;
        }

        $itNum++;

    } while(!$catch);

    return $tailKey;
};