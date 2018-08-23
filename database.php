<?php
//$db = new PDO("pgsql:dbname=postgres;host=localhost", 'postgres', 'senha'); 
class database extends pdo 
{
	public function __construct () 
	{
		parent::__construct("pgsql:dbname=postgres;host=localhost", 'postgres', 'senha');
	}
}

class todo {
	public $id;
	public $description;
}

class daoTodo 
{
	private $database;
	public function __construct ($database) 
	{
		$this->database = $database;
	}

	public function getAll()
	{
		$stmt = $this->database->prepare('SELECT * FROM todo ORDER BY id');
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_CLASS);
	}

	public function insert($data)
	{
		$stmt = $this->database->prepare('INSERT INTO todo("description") VALUES(:description)');
		$stmt->execute($data);
		return true;
	}
}