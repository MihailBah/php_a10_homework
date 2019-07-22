<?php

require_once 'task.php';
require_once 'example.php';

$randString = 'Crescere interdum ducuntersut ad alter accola. Amicitias sunt galataes de raptus fiscina. Unda recte ducunt ad ferox xiphias. 
Nunquam quaestio equiso. Brevis bursa tandem quaestios byssus est. A falsis torquis secundus tus. Galataes sunt urbss de velox solitudo. 
Triticum de primus bromium promissio frondator!
Sunt omniaes convertam noster, varius nixuses. Consiliums accelerare tanquam lotus pes. Alter repressor solite consumeres boreas.';

$randStringArray = explode(' ', $randString);

$stringNotClosedTagKeys = [];

$stringTransformationFunctions = [];

$stringTransformationFunctions[] = function (&$randString) use ($randStringArray){

    $keysToInsertTagCorrectly = array_rand($randStringArray, 5);

    foreach ($keysToInsertTagCorrectly as $key) {
        if (strlen($randStringArray[$key]) > 3) {
            $randString = str_replace($randStringArray[$key], '(' . $randStringArray[$key] . ')', $randString);
        }
    }
};

$stringTransformationFunctions[] = function(&$randString) use (&$stringNotClosedTagKeys) {

    $notClosedTagNum = rand(3, 5);

    do {
        $randStrKey = rand(0, strlen($randString) - 1);
        if ($randString[$randStrKey] === ' ') {
            $stringNotClosedTagKeys[] = $randStrKey;
            $randString[$randStrKey] = '(';
        }

    } while(count($stringNotClosedTagKeys) < $notClosedTagNum);
};


foreach ($stringTransformationFunctions as $function) {
    $function($randString);
}

$ans = getNotClosedTagsKeys($randString);
$ans2 = getNotClosedTagsKeys1($randString);

sort($stringNotClosedTagKeys);
sort($ans);

if ($ans === $stringNotClosedTagKeys && $ans2 === $stringNotClosedTagKeys) {
    echo ':-)) SUCCESSFUL! Good work with strings';
} else {
    echo $randString . PHP_EOL . PHP_EOL;
    echo ':-(() FAILED! Сorrect answer:' . PHP_EOL;
    print_r($stringNotClosedTagKeys);
}