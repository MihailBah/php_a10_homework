<?php

$my_array = ["qw3", "d2", "fgh456", "1", "rfbh Ыeh9\n", "rgb4"];

function find_maxlen_str($sources){
	$temp_str = "";
	foreach($sources as $str){
		if (iconv_strlen(trim($str)) > iconv_strlen($temp_str)){
			$temp_str = trim($str);
		}
	}
	return $temp_str;
}

echo find_maxlen_str($my_array) . PHP_EOL;