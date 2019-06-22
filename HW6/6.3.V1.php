<?php

/*
// часть кода для тестирования
$array_one = ["efrferfergre", "wdefef0", "rferfeferferfreferf", "rfrfreferfrfrfef"];
$array_two = ["eded", "wwdwdwdwdwdwdqwd0", "wdwdawddwdwdwdwdwdwdwdwd"];
*/

function compare_str_lengs($array1,$array2){
	// инициализируем массив для хранения разниц длинн строк.
    $results_array = [];
	// в цикле перебираем элементы массивов, пределом ставим последний элемент самого корроткого массива.
    for ($i=0; $i<=min(count($array1), count($array2))-1; $i++){
		//вычисляем разницу длин строк по модулю и записываем значение в массив для хранения разниц длинн строк.
        $results_array[] = abs(iconv_strlen($array1[$i])-iconv_strlen($array2[$i]));
    }
	// возвращаем максимальное значение из массива хранящего разници длинн строк.
    return max($results_array);
}
/*
// часть кода для тестирования
// выполнение нашейфункции с передачей в нее двух масивов.
$tmp = compare_str_lengs($array_one, $array_two);
// вывод результата
echo $tmp . PHP_EOL;
*/


// для теста закоментировать код ниже (и раскомментировать код обозначенный какдля тестирования выше.)
// инициализация переменной чтения из консоли.
$in_value = fopen ("php://stdin","r");

// приглашение ввода имени первого файла со строками.
echo "Enter file name one: ";

// запись имени первого файла в переменную с обрезанием сторонних символов по краям.
$file_name_one = trim(fgets($in_value));

// приглашение ввода имени второго файла со строками.
echo "Enter file name two: ";

// запись имени второго файла в переменную с обрезанием сторонних символов по краям.
$file_name_two = trim(fgets($in_value));

// если один из файлов не существует, срабатывает else.
if (file_exists($file_name_one && $file_name_two)){
	
	// читаем в массив первый файл построчно.
	$file_array_one = file("$file_name_one");
	
	// читаем в массив второй файл построчно.
	$file_array_two = file("$file_name_two");

	// во временную переменную записываем результат функции сравнения длинн строк.
	$tmp = compare_str_lengs($file_array_one, $file_array_two);
	
	// вывод в консоль результата.
	echo $tmp . PHP_EOL;

} else
	echo "One of file does not exist!\n";
// до этой строки.