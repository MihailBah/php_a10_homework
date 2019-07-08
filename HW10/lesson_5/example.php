<?php

/**
 * @param string $randString
 * @return array
 */
function getNotClosedTagsKeys1(string $randString) : array
{
    $start = microtime(true);
    $notClosedTagsKeys = [];

    parseString($randString, '(', ')', $notClosedTagsKeys);

    $time = microtime(true) - $start;
    echo "\nExempl time: $time\n";

    return $notClosedTagsKeys;
};

/**
 * @param string $string
 * @param string $openTag
 * @param string $closeTag
 * @param $notClosedTagsKeys
 * @return bool
 */
function parseString(string $string, string $openTag, string $closeTag, &$notClosedTagsKeys) : bool
{

    $keyOpen = strpos($string, $openTag);

    if ($keyOpen === false) {
        return true;
    }

    $keyClosed = strpos($string, $closeTag);
    $word = substr($string, $keyOpen + 1, $keyClosed - $keyOpen - 1);

    if ($keyOpen !== false && $keyClosed !== false && $word) {
        $wordArray = str_split($word, 1);
        if (!in_array($openTag, $wordArray)) {
            $string[$keyOpen] = '?';
            $string[$keyClosed] = '?';
        } else {
            $string[$keyOpen] = '?';
            $notClosedTagsKeys[] = $keyOpen;
        }
    } elseif ($keyOpen !== false && !$word) {
        $string[$keyOpen] = '?';
        $notClosedTagsKeys[] = $keyOpen;
    }
    return parseString($string, $openTag, $closeTag, $notClosedTagsKeys);
}
