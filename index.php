<?php
	require_once __DIR__ . '/autoload.php';

	$request = $_SERVER['REQUEST_URI'];
	$splits = explode('/', trim($request,'/'));
	$_controller = !empty($splits[1]) ? '\App\Controllers\\' . ucfirst($splits[1]) : '\App\Controllers\Publication';
	$action = !empty($splits[2]) ? ucfirst($splits[2]) : 'Index';
	
	$controller = new $_controller();

	if (method_exists($controller, 'action' . $action)) {
		$controller->action($action);
	} else {
		echo "Запрашиваемой страницы не существует";
		exit;
	}

?>