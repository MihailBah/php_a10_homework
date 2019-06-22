<?php

function diamond($in_number){
    if (! ($in_number % 2) || ($in_number < 0)){
    	echo "Enter positiv ODD number";
    	return False;
    } else {
        $result = "";
        for ($i=1; $i<=$in_number; $i+=2){
            $result .= str_repeat(" ", ($in_number-$i)/2) . str_repeat("*", $i) . str_repeat(" ", ($in_number-$i)/2) . PHP_EOL;
        }
        for ($i=$in_number-2; $i>=1; $i-=2){
            $result .= str_repeat(" ", ($in_number-$i)/2) . str_repeat("*", $i) . str_repeat(" ", ($in_number-$i)/2) . PHP_EOL;
        }
        echo($result . PHP_EOL);
    	return True;
    }
}

diamond(5);