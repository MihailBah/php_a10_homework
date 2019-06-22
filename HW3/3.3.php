<?php

// fb.txt - test file

function get_fizz_buzz($source){
	sscanf(trim($source), "%d %d %d", $fizz, $buzz, $end_line);
	$result = "";
	for ($x = 1; $x <= $end_line; $x++) {
		$result .= ($x % $fizz && $x % $buzz ? "$x " : ($x % $fizz ? "B " : ($x % $buzz ? "F ": "FB ")));
	};
	return trim($result);
}

function fb_wrte($source, $name){
	$file_write = fopen ("result_$name", "a");
	fwrite ($file_write, $source);
	fclose($file_write);
}


$in_value = fopen ("php://stdin","r");

echo "Enter file to read: ";

$name_file_read = trim(fgets($in_value));

$file_array = file($name_file_read);

foreach ($file_array as $str){
	$res = get_fizz_buzz($str) ."\n";
	fb_wrte($res, $name_file_read);
}
echo "DONE!\n";