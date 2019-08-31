<?php
/*
Модель. Класс, объект которого представляет запись в БД.
Модель хранит в своих полях информацию из колонок таблицы, имеет методы  load($id) и save(). Для работы модели нужен класс, который умеет общаться с базой, в нашем случае это Connection из DbConnection.php
Здесь модель разделена на абстрактную и конкретную. Абстрактная хранит общую логику загрузки/сохраниения данных, конкретная - название таблицы и другую специфическую информацию (если есть)
*/
require_once('DbConnection.php');

abstract class AbstractModel
{
	protected $id;
	protected $connection;

	protected $_data;

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

	/*
	Две функции ниже - заготовка для ДЗ. Внутри __call будет код из ДЗ25, который заполнит массив $this->_data. В save() этот массив будет использоваться для построения запросов.
	*/
	public function __call($method, $args) {

		if (strpos($method, 'set') === 0) {
 			$this->_data[mb_strtolower(substr($method, strlen('set')))] = $args[0];
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

class AuthorModel extends AbstractModel
{
	protected $tableName = 'authors';
}

class BookModel extends AbstractModel
{
	protected $tableName = 'books';
}

// $model3 = new BookModel(Connection::getInstance());
// $model3->load(3);
// $model3->setName('TestUpdate');
// $model3->setAuthor_id(27);

// // $model3->author_id = 26;
// $model3->save();

// var_dump($model3);

// $model4 = new AuthorModel(Connection::getInstance());
// // $model4->load(1);
// $model4->setName('TestInsertAuthor');
// $model4->save();

// var_dump($model4);
