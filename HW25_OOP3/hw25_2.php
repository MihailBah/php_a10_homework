<?php

//2. Сделать класс с магическими сеттерами и геттерами

class MagicArray
{
	protected $_data = [];

	public function __call($method, $args) {
		if (strpos($method, 'set') === 0) {
 			$this->_data[substr($method, strlen('set'))] = $args[0];
 		} elseif (strpos($method, 'get') === 0) {
 			if (substr($method, strlen('get')) == 'Data') {
 				return $this->_data;
 			} elseif (key_exists(substr($method, strlen('get')), $this->_data)) {
 				return $this->_data[substr($method, strlen('get'))];
 			} else {
 				return null;
 			}
 		}elseif (strpos($method, 'has') === 0) {
 			return key_exists(substr($method, strlen('has')), $this->_data);
		}
	}
}

$ma = new MagicArray();

$ma->setColor('green');
$ma->setWeight(10);

echo $ma->getColor();//Выведет green
echo $ma->getTaste();//Выведет null

var_dump($ma->getTaste());//Выведет null

//echo $ma->hasColor();//Выведет true
//echo $ma->hasTaste();//Выведет false

var_dump($ma->hasColor());//Выведет true
var_dump($ma->hasTaste());//Выведет false


//Особый метод, выводит информацию о всех данных
print_r($ma->getData());
//Выведет:
/*
[
	'color' => 'green',
	'weight' => 10
]
*/
