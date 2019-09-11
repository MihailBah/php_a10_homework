<?php


class DataObject {

	protected $_data = [];

	public function __call($method, $args) {
		if (strpos($method, 'set') === 0) {
 			$this->_data[substr($method, strlen('set'))] = $args[0];
 		} elseif (strpos($method, 'get') === 0) {
 			if (key_exists(substr($method, strlen('get')), $this->_data)) {
 				return $this->_data[substr($method, strlen('get'))];
 			} else {
 				return null;
 			}
 		}
	}
}

class mySybscriber {
	public function execute (DataObject $eventData){
		echo $eventData->getAddress();
	}
}


class EventManager {

	protected $subscribers;

	public function subscribe(mySybscriber $handler) {
		$this->subscribers[] = $handler;
	}

	public function dispatch(DataObject $eventData){
		foreach ($this->subscribers as $subscriber) {
			$subscriber->execute($eventData);
		}
	}
}


$manager = new EventManager();

$a = new mySybscriber();

$manager->subscribe($a);

$event = new DataObject();

$event->setAddress('SomeAddress2TEST');

$manager->dispatch($event);
