<?php

// 3. Доработать AbstractModel, используя заготовку в Model.php. Нужно чтобы AbstractModel могла делать и save() и load() без участия конкретной модели. В AuthorModel и BookModel должны будут остаться только названя таблиц:

// protected $tableName = 'authors';

// Вместо

// protected function fillData($record) {
// 	$this->id = $record[0]['id'];
// 	$this->name = $record[0]['name'];
// }

// load() в абстрактной модели будет записывать данные сразу в $this->data
