<?php

// 3. Написать итератор для записей в базе. Выдавать рядки он должен по одному, делать запросы - сразу по 5. Допустим, есть модель с методом 
// query($start, $limit), в базе 12 записей. При переборе foreach записи выдаются по одной, метод query() вызывается 3 раза: Сначала возвращает первые 5 записей, потом с 5-й по 10-ю, и в третий раз - последние 2
// Вместо настоящих запросов в базу можно оставить заглушку


class RecordsModel
{
	public $data = [
		'DB record 1',
		'DB record 2',
		'DB record 3',
		'DB record 4',
		'DB record 5',
		'DB record 6',
		'DB record 7',
		'DB record 8',
		'DB record 9',
		'DB record 10',
		'DB record 11',
		'DB record 12'
	];
	
	public function query($start, $limit) {
		//Вместо запроса "SELECT * FROM `table` LIMIT $start, $limit"
		echo 'Querying from ' . ($start + 1) . ' to ' . ($start + $limit) . '<br>';
		$result = [];
		for ($i = $start; $i < min($start + $limit, count($this->data)); $i++) {
			$result[] = $this->data[$i];
		}
		return $result;
	}
}

class RecordsIterator implements Iterator {

	public $_data;
	public $instance;

	protected $start = 0;
	protected $limit = 5;

	public function __construct(){
		$this->instance = new RecordsModel();
		$this->_data = $this->instance->query($this->start, $this->limit);
	}

	public function rewind() {
		$this->start = 0;
	}

	public function next() {
		$this->start++;
		if ($this->start % 5 == 0) {
			$this->_data = $this->instance->query($this->start, $this->limit);
		}
	}

	public function current() {
		return $this->_data[$this->start % 5];

	}

	public function valid() {
		return isset($this->_data[$this->start % 5]);
	}

	public function key() {
		return $this->start;
	}

}
/*
foreach работает по такой схеме:

$obj->rewind();
while($obj->valid()) {
	var_dump($obj->current());
	$obj->next();
}
*/

$recordsIterator = new RecordsIterator();
foreach ($recordsIterator as $record) {
	echo $record . '<br>';
}