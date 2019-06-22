<?php
/*
В функцию по порядку пере=даем три параметра:
Номер квартиры,
Этажность дома
и колличество квартир на этаже.
*/
function courier($room_number, $floats, $rooms_on_float){
	if (! ($room_number%($floats*$rooms_on_float))){ //если номер квартиры делется без остатка на колличество квартир в подъезде.
		$entrance = $room_number/($floats*$rooms_on_float); // определяем подъезд целочисленным делением номера кавартиры на колличество квартир в подъезде.
		$float = $floats; // то квартира находится на последнем этаже.
	} else {
		$entrance = ceil($room_number/($floats*$rooms_on_float)); //определяем подьезд целочисленным делением с округлением в большую сторону.
		$float = ceil(($room_number%($floats*$rooms_on_float))/$rooms_on_float); //определяем этаж целочисленным делением остатка с округлением в большую сторону.

	}

	echo("Entrance: " . $entrance . PHP_EOL . "Float: " . $float . PHP_EOL); //выводим резултат в консоль.
	return TRUE; // возвращаем TRUE потому как функция всегда должна что то возвращать.
}

courier(214, 12, 4);