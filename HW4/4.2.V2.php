<?php

$my_array = ["qw3", "d2", "fgh456", "1", "rfbh eh9", "rgb4"];

function count_letters($sources){
	$array_letters = [];
	$sources_array = str_split($sources);
	foreach($sources_array as $letter){
		if (! array_key_exists($letter, $array_letters)){
		    $cnt_letter = 0;
		    foreach($sources_array as $search_letter){
		        if ($search_letter === $letter){
		            $cnt_letter += 1;
		        }
		    }
		    $array_letters[$letter] = $cnt_letter;
		}
	}
	return $array_letters;
}

$result = array_map('count_letters', $my_array);
print_r ($result);