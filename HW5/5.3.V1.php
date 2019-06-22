<?php
$n = 100;
 
$a = range(0, $n + 1);
 
$a[1] = 0;
 
$i = 2;
while($i <= $n){
    if ($a[$i] != 0){
        $j = $i + $i;
        while ($j <= $n){
            $a[$j] = 0;
            $j = $j + $i;
        }
    }
    $i += 1;
}
$b = array_unique($a);
print_r($b);
