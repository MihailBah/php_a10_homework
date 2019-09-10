<?php

$request = $_GET['url'];
$requestParts = explode('/', $request);

$path_controllers = 'Controllers';
$default_action = 'Index';
$default_controller = 'Index';
$default_path = $path_controllers . DIRECTORY_SEPARATOR . $default_action . DIRECTORY_SEPARATOR . $default_controller . '.php';

$path = $path_controllers . DIRECTORY_SEPARATOR . $request . '.php';

if (!is_file($path)) {
	$controllerName = $default_controller;
	if (!empty($requestParts[0]) &&  is_dir($path_controllers . DIRECTORY_SEPARATOR . $requestParts[0])) {
		$path = $path_controllers . DIRECTORY_SEPARATOR . $requestParts[0] . DIRECTORY_SEPARATOR . $default_controller . '.php';
	} else {
		$path = $default_path;
	}
} else {
	$controllerName = $requestParts[1];
}

require_once($path);
$controller = new $controllerName();
$controller->execute();
