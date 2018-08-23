<?php

	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
	header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');

	include('database.php');

	$db = new database();
	$dao = new daoTodo($db);

	echo json_encode($dao->getAll());