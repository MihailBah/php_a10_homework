<?php

function get_fizz_buzz($source){
	sscanf(trim($source), "%d %d %d", $fizz, $buzz, $end_line);
	$result = "";
	for ($x = 1; $x <= $end_line; $x++) {
		$result .= ($x % $fizz && $x % $buzz ? "$x " : ($x % $fizz ? "B " : ($x % $buzz ? "F ": "FB ")));
	};
	return trim($result);
}

function fb_wrte($source){
	$file_write = fopen ("result_FB", "a");
	fwrite($file_write, $source .= "\n");
	fclose($file_write);
}

$in_value = fopen ("php://stdin","r");

echo "Enter file to read: ";

$name_file_read = trim(fgets($in_value));

$file_array = file($name_file_read);

$read_results = array_map('get_fizz_buzz', $file_array);

array_map('fb_wrte', $read_results);

print_r($read_results);

echo "DONE!\n";