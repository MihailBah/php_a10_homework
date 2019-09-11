<?php

// 1. Создать класс DataObject, с сеттерами-геттерами через магический метод.
// Унаследовать от него Модель, из метариалов занятия - проверить что работает.


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


abstract class AbstractModel extends DataObject
{	

	protected $id;
	protected $connection;

	public function __construct(Connection $connection) {
		$this->connection = $connection;
	}


	public function load($id) {
		$sql = 'SELECT * FROM `' . $this->tableName . '` WHERE id = ?';
		$result = $this->connection->query($sql, [$id]);

		if (count($result)) {
			foreach ($result[0] as $key => $item) {
				if ($key == 'id') {
					$this->id = $item;
				} else {
					$this->_data[$key] = $item;
				}
			}
		}
	} 
	
	public function save() {

			$keys = array_keys($this->_data);
			$params = array_values($this->_data);

		if ($this->id) {
			foreach ($keys as &$key) {
				$key .= ' = ?';
			}

			$sql = 'UPDATE `' . $this->tableName . '` SET ' . implode(', ', $keys) . ' WHERE id = ?';
			$params[] = $this->id;

			$result = $this->connection->query($sql, $params);

		} else {

			$sql = 'INSERT INTO `' . $this->tableName . '` (' . implode(', ', $keys) . ') VALUES (' . implode(', ', array_fill(0, count($params), '?')) . ')';

			$result = $this->connection->query($sql, $params);
		}
	}
	
}
