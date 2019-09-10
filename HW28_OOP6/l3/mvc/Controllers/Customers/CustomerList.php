<?php

/*
Еще один контроллер. Так же как ProductList, он будет вытаскивать информацию из базы, только теперь для отображения данных нужно будет использовать Твиг.
Для того чтобы контроллер не показывал ошибку, нужно подключить пакет twig через composer, и подключть его автолоадер (require_once('vendor/autoload.php'))
*/

require_once('vendor/autoload.php');
require_once('Models/CustomerModel.php');

class CustomerList 
{

	public function __construct() {
		$this->customerModel = new CustomerModel(Connection::getInstance());
		$this->loader = new \Twig\Loader\FilesystemLoader('Views');
		$this->twig = new \Twig\Environment($this->loader);
		$this->template = $this->twig->load('customers.html');
	}


	public function execute() {

		$customers['customers'] = $this->customerModel->listAll();
		
		echo $this->template->render($customers);
	}
}