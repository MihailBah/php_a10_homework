<?php

class StaticTest
{
	static protected $counter;

	public $data;

	protected function __construct() {
		self::$counter = $this;
	}

	public static function getInstance() {
		if (empty(self::$counter)) {
			return new StaticTest();
		} else {
			return self::$counter;
		}
	}
}


$st1 = StaticTest::getInstance();
$st1->data = 4;

$st2 = StaticTest::getInstance();
var_dump($st2->data);

$st3 = StaticTest::getInstance();
$st3->data = 8;
var_dump($st1->data);
