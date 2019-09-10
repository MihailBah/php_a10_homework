<?php

require_once('Models/DbConnection.php');

class ProductModel
{
	public function __construct(Connection $connection) {
		$this->connection = $connection;
	}

	/*
	Заглушка для метода, который должен вытаскивать товары из базы
	*/
	public function listAll() {
		$parametrs = [];
		$sql = 'SELECT * FROM `products`';
		$result = $this->connection->query($sql, $parametrs);

		// var_dump($result); die;
		return $result;
		// return [
		// 	[
		// 		'name' => 'T-shirt',
		// 		'price' => 23
		// 	],
		// 	[
		// 		'name' => 'Notebook',
		// 		'price' => 760
		// 	]
		// ];
	}
}
