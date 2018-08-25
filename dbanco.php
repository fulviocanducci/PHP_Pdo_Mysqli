<?php

class database extends pdo 
{
	public function __construct () 
	{
		parent::__construct("pgsql:dbname=postgres;host=localhost", 'postgres', 'senha');
		$this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
	}

	private function prepareSql($sql, $items = null)
	{      	
		$stmt = $this->prepare($sql);
		if ($items)
		{
			foreach ($items as $key => $value) 
			{	
				$stmt->bindValue(':'.$key, $value);
			}
		}			
		return $stmt;
   }
   
   public function add($table, $values) 
   {
      $field = array_keys($values);
      $sql = "INSERT INTO {$table}(";
      $sql .= implode(",", $field);
      $sql .= ") VALUES(:";
      $sql .= implode(",:", $field);
      $sql .= ")";
      $stmt = $this->prepareSql($sql, $values);
      $stmt->execute();
      return true;
   }

   public function edit($table, $values, $id)
   {
      $field = array_keys($values);
      $sql = "UPDATE {$table} SET $field[0]=:$field[0]";
      for ($i = 1; $i < count($field); $i++) 
      {
         $sql .= ",$field[$i]=:$field[$i]";  
      }      
      $where= " WHERE ";
      foreach($id as $key => $v)
      {
         $sql .= $where;
         $sql .= "$key=:$key";
         $where = ',';
      }            
      $stmt = $this->prepareSql($sql, array_merge($values));
      $stmt->execute();
      return true;
   }

   public function get($table, $id)
   {
      $sql = "SELECT * FROM logs";
      $where = " WHERE ";
      foreach($id as $key => $values)
      {
         $sql .= $where;
         $sql .= "$key=:$key";
         $where = ',';
      } 
      $stmt = $this->prepareSql($sql, $id);
      $stmt->execute();
      return $stmt->fetch(PDO::FETCH_OBJ);
   }

   public function getAll($table, array $where = null, array $orderBy = null) 
   {
      $sql = "SELECT * FROM logs";
      $params = array();
      if ($where)
      {
         $w = " WHERE";
         $sql .= $w;   
         foreach($where as $key => $value)
         {            
            if ($w === " AND ")
            {
               $sql .= $w;
            }
            $sql .= " $key $value[0] :$key ";
            $w = " AND ";
            $params[$key] = $value[1];
         }
      }
      if ($orderBy) 
      {
         $sql .= " ORDER BY";
         foreach($orderBy as $key => $value)
         {
            $sql .= " $key $value";
         }
      }      
      $stmt = $this->prepareSql($sql, $params);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_OBJ);
   }

}