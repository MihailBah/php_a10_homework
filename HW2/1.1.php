<?php

$in_value = fopen ("php://stdin","r");

echo "Enter your age: ";

$age = fgets ($in_value);

if ($age > 1 && $age < 13) {
	echo "You are child\n";
} elseif ($age >= 13 && $age < 19) {
	echo "You are teenager\n";
} elseif ($age >= 19 && $age < 45) {
	echo "You are adult\n";
} elseif ($age >= 45 && $age < 65) {
	echo "You are middle\n";
} elseif ($age >= 65 && $age < 90) {
	echo "You are elderly\n";
} elseif ($age >= 90) {
	echo "WOW you have awesome health\n";
} else {
	echo "Something went wrong";
}
?>