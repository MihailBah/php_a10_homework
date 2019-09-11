<?php

$request = $_GET['url'];
$requestParts = explode('/', $request);

$path_controllers = 'Controllers';

$default_action = 'Index';
$default_controller = 'Index';

$path = $path_controllers . DIRECTORY_SEPARATOR . $request . '.php';
$controllerName = $requestParts[1] ?? '';


if (empty($requestParts[1])) {
	$controllerName = $default_controller;
	if (!empty($requestParts[0])) {
		$actionName = $requestParts[0];
	} else {
		$actionName = $default_action;
	}
	$path = $path_controllers . DIRECTORY_SEPARATOR . $actionName . DIRECTORY_SEPARATOR . $controllerName . '.php';
}

if (is_file($path)) {
	require_once($path);
	$controller = new $controllerName();
	$controller->execute();
} else {
	//redirect to 404
	echo '404';
}
