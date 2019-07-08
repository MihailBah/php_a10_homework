<?php

/**
 * @param string $randString
 * @return array
 */
function getNotClosedTagsKeys(string $randString) : array
{
    $start = microtime(true);
    echo $randString;
    $notClosedTagsKeys = [];
    $randString_lenght = mb_strlen($randString);

    // TODO: create sorting

    for ($i=0; $i<$randString_lenght; $i++) {
    	$value = $randString[$i];
    	if ($value == "(") {
    		$notClosedTagsKeys[] = $i;
    	} elseif ($value == ")") {
    		array_pop($notClosedTagsKeys);
    	}
    }
    $time = microtime(true) - $start;
    echo "\nMy time: $time\n";
    return $notClosedTagsKeys;
};
