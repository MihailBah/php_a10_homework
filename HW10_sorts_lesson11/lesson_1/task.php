<?php

/**
 * @param array $someRandomArray
 * @param $itNum
 * @return array
 */
function sortArray(array $someRandomArray, &$itNum) : array
{
    // TODO: create sorting

	do {
		$isReplaced = false;
		
		for ($i=0; $i < count($someRandomArray)-1; $i++) {
			$current = $someRandomArray[$i];
			$next = $someRandomArray[$i+1];
			
			if ($current > $next) {
				$isReplaced = true;
				$someRandomArray[$i] = $next;
				$someRandomArray[$i+1] = $current;
			}
			$itNum++;
		}
		
	} while($isReplaced);

    return $someRandomArray;
};
