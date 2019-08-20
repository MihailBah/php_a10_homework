<?php 

interface Info
{
	function getInfo();
}


abstract class Enimal implements Info
{
	protected $weight;

	protected $name;

	protected function __construct($name, $weight) {
		$this->setWeight($weight);
		$this->setName($name);
	}

	public function setWeight($weight) {
		$this->weight = $weight;
	}

	public function setName($name) {
		$this->name = $name;
	}

	public function getWeight() {
		return $this->weight;
	}

	public function getName() {
		return $this->name;
	}

	public function getInfo() {
		return 'This ' . get_class($this) . ' has name ' . $this->getName() . ', weight: ' . $this->getWeight() . ', ' . 'feeds offspring with ' . $this->feeds_offspring . ', as an adult eats ' . $this->eats . '.<br>';
	}

}

abstract class Mammal extends Enimal
{
	protected $feeds_offspring = 'milk';
}

class Cat extends Mammal
{
	protected $eats = 'meat';

	public function __construct($name, $weight) {
		parent::__construct($name, $weight);
	}
}

class Cow extends Mammal
{
	protected $eats = 'grass';

	public function __construct($name, $weight) {
		parent::__construct($name, $weight);
	}
}


$enimals = [
	new Cat('Murk', 3),
	new Cow('TOM', 600)
];

foreach ($enimals as $enimal) {
	echo $enimal->getInfo();
}
