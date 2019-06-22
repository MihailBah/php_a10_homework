<?php

$array_one = ["efrferfergre", "wdefef0", "rferfeferferfreferf", "rfrfreferfrfrfef"];
$array_two = ["eded", "wwdwdwdwdwdwdqwd0", "wdwdawddwdwdwdwdwdwdwdwd"];

function compare_str_lengs($array1,$array2){
    $results_array = [];
    for ($i=0; $i<=min(count($array1), count($array2))-1; $i++){
        $results_array[] = abs(iconv_strlen($array1[$i])-iconv_strlen($array2[$i]));
    }
    return max($results_array);
}

$tmp = compare_str_lengs($array_one, $array_two);
print_r($tmp);