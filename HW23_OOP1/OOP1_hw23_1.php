<?php 

abstract class Enimal
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

	protected function getInfo() {
		return 'This ' . get_class($this) . ' has name ' . $this->getName() . ', weight: ' . $this->getWeight();
	}

}

abstract class Mammal extends Enimal
{
	protected $feeds_offspring = 'milk';

	protected function getInfo() {
		return parent::getInfo() . ', ' . 'feeds offspring with ' . $this->feeds_offspring;
	}
}

class Cat extends Mammal
{
	protected $eats = 'meat';

	public function __construct($name, $weight) {
		parent::__construct($name, $weight);
	}

	public function getInfo() {
		return parent::getInfo() . ', as an adult eats ' . $this->eats . '.<br>';
	}

}

class Cow extends Mammal
{
	protected $eats = 'grass';

	public function __construct($name, $weight) {
		parent::__construct($name, $weight);
	}

	public function getInfo() {
		return parent::getInfo() . ', as an adult eats ' . $this->eats . '.<br>';
	}

}


$enimals = [
	new Cat('Murk', 3),
	new Cow('TOM', 600)
];

foreach ($enimals as $enimal) {
	echo $enimal->getInfo();
}
