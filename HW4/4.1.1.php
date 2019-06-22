<?php

$my_array = [-7, -17, 22, -1, -10, 1000, -50, -345, 0];

function find_max_number($sources){ // reinventing the wheel
	$temp_number = null;
	foreach($sources as $number){
		if ($number > $temp_number){
			$temp_number = $number;
		}
	}
	return $temp_number;
}

echo find_max_number($my_array) . PHP_EOL;
//echo max($my_array) . PHP_EOL;