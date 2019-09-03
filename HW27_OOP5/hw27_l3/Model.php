<?php
/*
3. Сделать чтобы модель из 4-го занятия по ООП работала с EAV-структурой.
Создать класс ProductModel (Он уже может наследоваться от другой абстрактной модели), применить дамп из файла eav.sql. 
*/
  
require_once('DbConnection.php');

abstract class AbstractModel
{
	protected $connection;

	protected $_data;

	public function __construct(Connection $connection) {
		$this->connection = $connection;
	}


	public function load($id) {
		$sql = 'SELECT
					entity.id as id,
					entity.name as product_name,
					value.value as value,
					attribute.name as attribute_name
				FROM entity
				LEFT JOIN value on entity.id = value.product_id
				LEFT JOIN attribute on value.attribute_id = attribute.id
				WHERE entity.id = ?';
		$result = $this->connection->query($sql, [$id]);

		if (count($result)) {
			$this->_data['id'] = intval($result[0]['id']);
			$this->_data['name'] = $result[0]['product_name'];
			
			foreach ($result as $item) {
				$this->_data[$item['attribute_name']] = $item['value'];
			}
		}
	} 

	public function __call($method, $args) {
		if (strpos($method, 'get') === 0) {
			$key = mb_strtolower(substr($method, strlen('get')));
			if (key_exists($key, $this->_data)){
 				return $this->_data[$key];
			} else {
				return null;
			}
 		}
	}	
}

class ProductModel extends AbstractModel
{
	//
}

// Модель должна отрабатывать так:

$productModel = new ProductModel(Connection::getInstance());
$productModel->load(1);//подгрузилась информация для T-shirt

echo $productModel->getWeight();//выводит 150
echo $productModel->getColor();//выводит blue
var_dump($productModel->getRam());//выводит null, у этого продукта нет такого атрибута

// Аналогично для ноутбука:

$productModel = new ProductModel(Connection::getInstance());
$productModel->load(2);//подгрузились данные ноута
echo $productModel->getRam();//выводит 4G

