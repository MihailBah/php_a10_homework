<?php

// odd.txt test file

function my_read($source){
	if (file_exists($source)){
		$file_read = fopen("$source", "r");
		$num_str = 0;
		$result = "";
		while (! feof($file_read)){
			$str = fgets($file_read);
			$num_str += 1;
			if ($num_str % 2){
				$result .= $str ;
			}
		}
		fclose($file_read);
		return $result;
	} else {
		echo "Nothing to read!\n";
		return False;
	}
}


function my_write($source, $in_text){
	if ($in_text){
		$file_write = fopen("$source", "a");
		$chk_wite = fwrite($file_write, $in_text);
		fclose($file_write);
		if ($chk_wite){
			echo "File $source write sucefull\n";
			return True;
		} else {
			echo "ERROR write file!\n";
			return False;
		}
	} else {
		echo "Nothing to write!\n";
		return False;
	}
}

$in_value = fopen ("php://stdin","r");

echo "Enter file to read: ";

$name_file_read = trim(fgets($in_value));

$name_file_write = "result_$name_file_read";

$str = my_read($name_file_read);

my_write($name_file_write, $str);