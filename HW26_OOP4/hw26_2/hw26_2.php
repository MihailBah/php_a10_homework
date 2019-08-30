<?php

// 2. Создать еще одну модель BookModel, по аналогии с AuthorModel. AbstractModel пока что можно оставить как есть. Новая модель должна будет работать с новой таблицей books, у нее должен быть рабочий функционал загрузки и записи:


$model1 = new BookModel(Connection::getInstance());
$model1->name = 'British Encyclopedia vol.1';
$model1->author_id = 25;
$model1->save();
// В этот момент появляется запись в БД

$mode2 = new BookModel(Connection::getInstance());
$mode2->load(1);
$mode2->name .= '(ed.5)';
$mode2->save();
//В БД сохраняется новое значение