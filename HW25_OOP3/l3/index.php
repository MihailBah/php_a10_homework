<?php

/*
В ПХП у нас есть возможность подгружать файлы с классами автомагически, с помощью функций-автозагрузчиков. Если в скрипте попытаться сослаться на класс, которого в системе нет - ПХП будет вызывать автозагрузчики в надежде что они подтянут нужный класс.
Для того, чтобы этим воспользоваться, нужно во-первых зарегистрировать свой автозагрузчик функцией 
spl_autoload_register('my_loader');
И потом определить собственно функцию my_loader.
В my_loader параметром будет попадать название запрошенного класса. Функция должна подключить тот файл, где этот класс определен.
*/

// require_once('classes/Ninja.php');
//OR

function my_loader($class_name) {

	$path_to_file = __DIR__ . DIRECTORY_SEPARATOR . str_replace("\\", DIRECTORY_SEPARATOR, $class_name) . ".php";

	if (file_exists($path_to_file)) {
		require_once($path_to_file);
	}
}

spl_autoload_register('my_loader');

$jack = new classes\NS1\Jack();

$ninja = new classes\Ninja();

$obj = new classes\NS1\NS2\MyClass();

var_dump($ninja);

var_dump($obj);

var_dump($jack);
