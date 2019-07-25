<?php

    require_once("utils.php");

    /**
     * Function receives an array with integer numbers,
     * should return its sum. It is not alowed to use built-in php functions.
     *
     * Функция получает на вход массив чисел, должна вернуть сумму этих чисел.
     * Не использовать встроенные функции суммирования php.
     *
     * @param array $arr
     * @return integer
     */
    function my_sum($arr) {
		$sum = 0;
        foreach ($arr as $number){
			$sum += $number;
		}
		return $sum;
    }


    /**
     * Function receives a long string with many words.
     * It should return the same string, but words,
     * larger then 6 symbols, should be changed, symbols
     * after the sixth one should be replaced by symbol *
     *
     * Функция получает на вход длинную строку с множеством слов.
     * Она должна вернуть ту же строку, но в словах, которые длиннее 6 символов,
     * функция должна вместо всех символов после шестого поставить одну звездочку.
     * Пример: Из слова 'verwijdering' должно получиться 'verwij*'
     *
     * @param string $shortMe
     * @return string
     */
    function shortener($shortMe) {
        $str_array = explode(" ", $shortMe);
		$result_array = [];
		foreach ($str_array as $word){
			if (strlen($word)>6) {
				$result_array[] = substr($word, 0, 6) . "*";
			} else {
				$result_array[] = $word;
			}
		}
		$str = implode(" ", $result_array);
		return $str;
    }

    /**
     * Function receives an array of strings.
     * Please return number of strings, which
     * length is at least 2 symbols and first character
     * is equal to the last character
     *
     * Функция получает на вход массив строк. Вернуть надо количество строк,
     * которые не короче двух символов и у которых первый и последний
     * символ совпадают.
     *
     * @param array $arr
     * @return number
     */
    function compare_ends($arr) {
		$cnt = 0;
        foreach ($arr as $str){
			if (strlen($str)>1 && $str[0]==$str[-1]){
				$cnt += 1;
			}
		}
		return $cnt;
    }



    /**
     * Function receives a string, should return this string reversed.
     *
     * Функция получает на вход строку, должна вернуть ее перевернутой.
     *
     * @param string $str
     * @return string
     */
    function reverse_string($str) {
		$result = "";
		for ($i=strlen($str)-1; $i>=0; $i--){
			$result .= $str[$i];
		}
		return $result;
    }

test_shortener();

test_compare_ends();

test_my_sum();

test_reverse_string();

//test fetch








