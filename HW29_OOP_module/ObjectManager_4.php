<?php

class A {}
class AA extends A {}
class B
{
	public function __construct(A $a) {
		var_dump($a);
	}
}

class ObjectManager
{
	public $config = [
	'A' => 'AA'//Вместо А всегда загружать АА
	];

	public function create($className) {
		
		$dependencies = [];
		if (method_exists($className, '__construct')) {
			$reflectionMethod = new ReflectionMethod($className, '__construct');
			$params = $reflectionMethod->getParameters();

			foreach ($params as $parameter) {
				$parameterType = (string)$parameter->getType();
				if (array_key_exists($parameterType, $this->config)) {
					$parameterType = $this->config[$parameterType];
				}
				$dependencies[] = $this->create($parameterType);
			}
		}

		return new $className(...$dependencies);
	}
}

$objectManager = new ObjectManager();
$objectManager->create('B');//Конструктор В должен выдать "АА", т.к. обджект менеджер всегда подгружает его вместо А
