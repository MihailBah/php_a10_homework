<?php

define("PRIME_NUMBER_TARGET", 100);
$prime_number_sum = 0;
$cnt = 0;

for ($n=2; $cnt < PRIME_NUMBER_TARGET; $n++){
	$my_array = range(2, $n);
	$tmp = 0;
	foreach ($my_array as $number){
		if(! ($n % $number)){
			$tmp += 1;
		}
	}
	if ($tmp < 2){
		$prime_number_sum += $n;
		$cnt += 1;
	}
}

echo "$prime_number_sum";