<?php

interface canDrive
{
	function drive();
}

abstract class DriveMachine implements canDrive
{
	function drive()
	{
		echo "I am ride on ". get_class($this). " /n" . $this->sound;
	}
}


class Motorcycle extends DriveMachine
{
    protected $sound = "BumBumBum";
}

class Scooter extends DriveMachine
{
	protected $sound = "ZzZzZz";
}

class ATV extends DriveMachine
{
	protected $sound = "Arrrrr";
}

class Person {

    public $name;
    private $machine;

    function drive_machine($machine) {
        if(!is_object($machine)) return false;
        $this->machine = $machine;
        return $this;
    }

    function get_name(){
        return $this->name;
    }

    function drive(){
        if(method_exists($this->machine, 'drive')
            && is_subclass_of($this->machine, "DriveMachine"))
        {
            $this->machine->drive();
        } else echo "Nothing to drive".PHP_EOL;
    }

}



$Den = new Person();

$machines = [
	$Harley = new Motorcycle(),
	$Honda = new Scooter(),
	$pen = new ATV()
];


foreach ($machines as $machine)
{
    $Den->take_somemachine($machine)->drive();

}

?>