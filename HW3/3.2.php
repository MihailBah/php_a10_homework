<?php
// aver.txt test file

function get_aver_str($source){
	$sum_symb = 0;
	$result = 0;
	foreach ($source as $str){
		$str_len = iconv_strlen(trim($str));
		$sum_symb += $str_len;
	} 
	$result = $sum_symb / count($source);
	return $result;
} 

function my_write_aver($source, $source_name, $aver){
	$write_file = fopen("aver_$source_name", "a");
	foreach ($source as $str){
		$str_len = iconv_strlen(trim($str));
		if ($str_len > $aver){
			$chk_file = fwrite($write_file, $str);
		}
	}
	fclose ($write_file);
	if ($chk_file){
		echo "File aver_$source_name write sucefull\n";
		return True;
	} else {
		echo "ERROR write file!\n";
		return False;
	}
}

$in_value = fopen ("php://stdin","r");

echo "Enter file name: ";

$file_name = trim(fgets($in_value));

if (file_exists($file_name)){
	
	$file_array = file("$file_name");

	$aver_str = get_aver_str($file_array);

	my_write_aver($file_array, $file_name, $aver_str);
} else
	echo "File does not exist!\n";