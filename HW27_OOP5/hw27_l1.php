<?php
/*
1. Сделать MyList из 2-го занятия по ООП итератором. Нужно чтобы по нему можно было пройти циклом foreach
- current() Указывает на текущий элемент в структуре
- key() Ключ для текущего элемента
- next() Функция, которыя должна переместить указатель на следующий элемент
- rewind() Должна сбросить указатель в исходное положение
- valid() Проверит, можно ли выводить данные, на которые указывает указатель
*/

class MyListNode 
{
	public $data;
	public $next;

	public function __toString() {
		return (string)$this->data;
	}
}

class MyList implements Iterator
{
	protected $start;
	protected $currentNode;

	public function append($data) {
		if (!$this->start) {
			$this->start = new MyListNode();
			$this->start->data = $data;
			return;
		}
		$newNode = new MyListNode();
		$newNode->data = $data;
		$lastNode = $this->getLastNode();
		$lastNode->next = $newNode;
	}

	public function getLastNode() {
		$result = $this->start;
		while($result->next) {
			$result = $result->next;
		}
		return $result;
	}

	public function valid() {
		return !empty($this->currentNode);
	}

	public function current() {
		$result = $this->currentNode->data;

		return $result;
	}

	public function next() {
		$this->currentNode = $this->currentNode->next;		
	}

	public function rewind() {
		$this->currentNode = $this->start;
	}

	public function key() {
		return $this->currentNode;
	}
}

$myList = new MyList();

$myList->append(1);
$myList->append(2);
$myList->append(3);

foreach ($myList as $item) {
	var_dump($item);//выводит 1 2 3
}