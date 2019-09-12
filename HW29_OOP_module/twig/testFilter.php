<?php

require_once 'vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader);

$randomupFilter = new Twig_SimpleFilter('randomup', function($string) {
	$array = str_split($string);
    $i = array_rand($array);
    $array[$i] = mb_strtoupper($array[$i]);
    return implode("", $array);
});

$twig->addFilter($randomupFilter);

$params = [
	'strings' => [
		[
			'name' => 'qwerty'
		]
	]
];

$template = $twig->load('testFilter.html');

echo $template->render($params);
