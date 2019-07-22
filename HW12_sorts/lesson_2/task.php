<?php

/**
 * @param array $someRandomArray
 * @param $itNum
 * @return array
 */
function advancedSortArray(array $someRandomArray, &$itNum) : array
{
    // TODO: create sorting

	$flag = 0;

	do {
		$isReplaced = false;
		
		for ($i=$flag; $i < count($someRandomArray)-1; $i++) {
			$current = $someRandomArray[$i];
			$next = $someRandomArray[$i+1];
			
			if ($current > $next) {
				$isReplaced = true;
				$someRandomArray[$i] = $next;
				$someRandomArray[$i+1] = $current;
				$flag = $i;
			}
			$itNum++;
		}
		
		for ($i=$flag; $i > 0 ; $i--) {
			$current = $someRandomArray[$i];
			$next = $someRandomArray[$i-1];
			
			if ($current < $next) {
				$isReplaced = true;
				$someRandomArray[$i] = $next;
				$someRandomArray[$i-1] = $current;
				$flag = $i;
			}
			$itNum++;
		}
		
	} while($isReplaced);

    return $someRandomArray;

};
