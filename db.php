<?php

class database extends pdo 
{
	public function __construct () 
	{
		parent::__construct("pgsql:dbname=postgres;host=localhost", 'postgres', 'senha');
		$this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
	}

	public function prepareSql($sql, $items = null)
	{
		$stmt = $this->prepare($sql);
		if ($items)
		{
			foreach ($items as $key => $value) 
			{				
				$stmt->bindValue($key, $value);
			}
		}			
		return $stmt;
	}
}