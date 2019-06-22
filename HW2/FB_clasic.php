<?php

$in_value = fopen ("php://stdin","r");

echo "Enter fizz number: ";

$fizz = (int)fgets ($in_value);

echo "Enter buzz number: ";

$buzz = (int)fgets ($in_value);

echo "Enter End number: ";

$end_line = (int)fgets ($in_value);


for ($x = 1; $x <= $end_line; $x++) {
	if ($x % $fizz == 0 && $x % $buzz == 0) {
		echo "FB ";
	} elseif ($x % $fizz == 0) {
		echo "F ";
	} elseif ($x % $buzz == 0) {
		echo "B ";
	} else {
		echo "$x ";
	}
} echo "\n";
?>