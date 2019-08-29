<?php

// 1. Есть класс Page с полями text и padding. padding у страницы может быть либо left, либо right. У обычной страницы в книге он будет меняться: на четных отступ будет справа, на нечетных - слева.
// Нужно написать фабрику, которая будет создавать страницы с отступом то справа, то слева, по очереди:

class Page
{
	public $text;
	public $padding;

	public function __construct($padding){
		$this->padding = $padding;
	}
}

class PageFactory
{
	protected $padding_flag;

	public function create(){
		if (!$this->padding_flag){
			$this->padding_flag = true;
			return new Page('right');
		} else {
			$this->padding_flag = false;
			return new Page('left');
		}
	}
}

$pageFactory = new PageFactory();

$page1 = $pageFactory->create();
echo $page1->padding;//Выводит right

echo "<br>";

$page2 = $pageFactory->create();
echo $page2->padding;//Выводит left

echo "<br>";

$page3 = $pageFactory->create();
echo $page3->padding;//Выводит right

echo "<br>";

$page4 = $pageFactory->create();
echo $page4->padding;//Выводит left