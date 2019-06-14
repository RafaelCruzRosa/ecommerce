<?php 

namespace App\DB;

class Sql
{
	const HOST = "localhost";
	const DBNAME = "db_ecommerce";
	const USER = "root";
	const PASSWORD = "";

	private $conn;

	public function __construct()
	{
		$this->conn = new PDO(
			"mysql: host=". Sql::HOST . "dbname=" . Sql::DBNAME,
			 Sql::USER,
			 Sql::PASSWORD
		); 
	}

	private function setParams($statement, $parameters = array())
	{
		foreach ($parameters as $key => $value) {
			
			$this->bindParam($statement, $key, $value);
		}
	}

	private function bindParam($statement, $key, $value)
	{

		$statement->bindParam($key, $value);

	}

	public function query($rawQuery, $params = array())
	{

		$stmt = $this->conn->prepare($rawQuery);
		$this->setParams($stmt, $params);
		$stmt->execute();

	}

	public function select($rawQuery, $params = array()):array
	{

		$stmt = $this->conn->prepare($rawQuery);
		$this->setParams($stmt, $params);
		$stmt->execute();
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
		
	}
}
 ?>