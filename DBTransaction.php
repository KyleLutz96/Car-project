<?php
class DBTransaction

{
protected $pdo;    public $last_insert_id;

public function __construct()

 {       
  echo "dbtransation";
 define('DB_NAME', 'car_driver_db');        
define('DB_USER', 'kyle2');        
define('DB_PASSWORD', 'test');        
define('DB_HOST', 'localhost');
$this->pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
}

    public function startTransaction()    {        $this->pdo->beginTransaction();    }

    public function insertTransaction($sql, $data)    {
	$stmt = $this->pdo->prepare($sql);
	$stmt->execute($data);
	$this->last_insert_id = $this->pdo->lastInsertId();
    }

    public function submitTransaction()    {        try {            $this->pdo->commit();        } catch(PDOException $e) {            $this->pdo->rollBack();            return false;        }          return true;    }
     
         public function deleteTransaction($sql, $data)    {        $stmt = $this->pdo->prepare($sql);        $stmt->execute($data);    }




public function queryTransaction($sql, $data = null)
{
 $stmt = $this->pdo->prepare($sql);
 $stmt->execute($data);
 $result = $stmt->fetchAll();
 return $result;

}
}
