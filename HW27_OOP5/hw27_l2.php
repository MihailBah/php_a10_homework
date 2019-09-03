<?php
/*
2. В обозревателе, сделать чтобы каждый из подписчиков реагировал 1 раз, и становился недоступным.
Т.е. код должен работать так:
Поступает сигнал 'fire'. Сигнал поступает сначала в fireDepartment1, fireDepartment1 обрабатывает событие (отправляет пожарную машину), и в fireDepartment2 событие уже не приходит.
И наоборот, если fireDepartment1 не смог обработать событие (нет свободных машин) - сигнал отправляется дальше в fireDepartment2
*/

interface Executable
{
	public function execute($eventData);
}

class FireDepartment implements Executable
{
	public $busy;

	public function execute($eventData) {
		$this->busy = $eventData;
		echo 'FireDept goes to ' . $eventData['address'] . '<br>';
	}
}

class Hospital implements Executable
{
	public $busy;

	public function execute($eventData) {
		$this->busy = $eventData;
		echo 'Hospital goes to ' . $eventData['address'] . '<br>';
	}
}

class EventManager
{
	protected $subscribers;
	
//Метод теперь кроме самого подписчика будет принимать тип события для этого подписчика.
	public function subscribe(Executable $handler, $type) {
		if (empty($this->subscribers[$type])) {
			$this->subscribers[$type] = [];
		}
		$this->subscribers[$type][] = $handler;
	}

	//$this->subscribers[$type] хранит всех подписчиков на событие $type
	public function dispatchEvent($eventData, $type) {
		$getEvent = false;
		foreach ($this->subscribers[$type] as $subscriber) {
			if (empty($subscriber->busy) && count($this->subscribers[$type]) > 0) {
				$subscriber->execute($eventData);
				$getEvent = true;
				break;
			}
		}
		if (!$getEvent) {
			echo "All busy: ". $eventData['address'];
		}
	}
}

$manager = new EventManager();

$fireDepartment1 = new FireDepartment();

$manager->subscribe($fireDepartment1, 'fire');

$fireDepartment2 = new FireDepartment();
//Подписываем fireDepartment2 на то же событие

$manager->subscribe($fireDepartment2, 'fire');

$manager->dispatchEvent([
	'address' => 'SomeAddress'
], 'fire');

$manager->dispatchEvent([
	'address' => 'SomeAddress2'
], 'fire');

$manager->dispatchEvent([
	'address' => 'SomeAddress3'
], 'fire');

$fireDepartment1->busy = null;

$manager->dispatchEvent([
	'address' => 'SomeAddress4'
], 'fire');

$hospital1 = new Hospital();
//Подписываем hospital1 на другой тип события, injury

$manager->subscribe($hospital1, 'injury');
$manager->dispatchEvent([
	'address' => 'SomeAddressH'
], 'injury');

$manager->dispatchEvent([
	'address' => 'SomeAddressH2'
], 'injury');

// var_dump($fireDepartment1, $fireDepartment2, $hospital1);
