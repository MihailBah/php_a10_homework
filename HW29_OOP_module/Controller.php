<?php

require_once('singleEventmanager.php');

class Controller {

	public $eventManager;

	public function __construct(){
		$this->eventManager = EventManager::getInstance();
	}

	public function execute() {
	//оповестить о событии "before execute", например так:
	$this->eventManager->dispatch('before_execute</br>');
	echo 'Executing controller!</br>';
	$this->eventManager->dispatch('after_execute</br>');
	}
}