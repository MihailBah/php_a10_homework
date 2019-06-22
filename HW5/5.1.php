<?php

define("CONST_FIVE", 5);
define("START_RANGE", 1);
define("END_RANGE", 100);
$cnt = 0;

$a = range(START_RANGE, END_RANGE);
foreach($a as $value){
	if(! ($value % CONST_FIVE)){
		$cnt += 1;
	}
}
echo $cnt . PHP_EOL;