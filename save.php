<?php

	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	header('Access-Control-Allow-Origin: *');
	//header('Access-Control-Allow-Origin: http://localhost:3000');
	//header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
	//header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');

	include('database.php');

	$result = file_get_contents('php://input');
	$data = json_decode($result, 1);

	$db = new database();
	$dao = new daoTodo($db);
	$dao->insert($data);

	echo json_encode($dao->getAll());