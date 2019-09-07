<?php

require_once('Models/DbConnection.php');

class CustomerModel
{
	public function __construct(Connection $connection) {
		$this->connection = $connection;
	}

	public function listAll() {
		$parametrs = [];
		$sql = 'SELECT * FROM `customers`';
		$result = $this->connection->query($sql, $parametrs);

		return $result;
	}
}
