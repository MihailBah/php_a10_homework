<?php

function test_str($source){
    $source = trim($source);
	$split_results_indata = explode(";", $source);//отделяем суммируемые данные от результатов
	$split_indata = explode(" ", $split_results_indata[0]);//разделяем уже суммируемые данные
	$split_results = explode(" ", $split_results_indata[1]);//разделяем результаты
	$my_int = intdiv(array_sum($split_indata), count($split_indata));//получаем целочисленное деление
	$remainder = array_sum($split_indata)%count($split_indata);// получаем остаток от деления
	if ($my_int == $split_results[0] && $remainder == $split_results[1]){
	    return $source . " - True";
	} else{
	    return $source . " - False";
	}
}

function my_wrte($source){
	$file_write = fopen ("result_file_test", "a");
	fwrite($file_write, $source .= "\n");
	fclose($file_write);
}

$in_value = fopen ("php://stdin","r");

echo "Enter file to read: ";

$name_file_read = trim(fgets($in_value));

$file_array = file($name_file_read);

$read_results = array_map('test_str', $file_array);

array_map('my_wrte', $read_results);

print_r($read_results);