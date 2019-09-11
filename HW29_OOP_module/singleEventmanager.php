<?php

require_once('Controller.php');

// class DataObject {

// 	protected $_data = [];

// 	public function __call($method, $args) {
// 		if (strpos($method, 'set') === 0) {
//  			$this->_data[substr($method, strlen('set'))] = $args[0];
//  		} elseif (strpos($method, 'get') === 0) {
//  			if (key_exists(substr($method, strlen('get')), $this->_data)) {
//  				return $this->_data[substr($method, strlen('get'))];
//  			} else {
//  				return null;
//  			}
//  		}
// 	}
// }

class mySybscriber {
	public function execute ($eventData){
		echo $eventData;
	}
}

class EventManager {

	protected static $instance;

	private function __construct(){}

	public static function getInstance(){
		if (!self::$instance) {
			self::$instance = new EventManager;
		}
		return self::$instance;
	}

	protected $subscribers;

	public function subscribe(mySybscriber $handler) {
		$this->subscribers[] = $handler;
	}

	public function dispatch($eventData){
		foreach ($this->subscribers as $subscriber) {
			$subscriber->execute($eventData);
		}
	}
}

$handler = new mySybscriber();

$eventManager = EventManager::getInstance();
$eventManager->subscribe($handler);
$controller = new Controller();
$controller->execute();
