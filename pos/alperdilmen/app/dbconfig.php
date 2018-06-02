<?php
class Database
{
     
    private $host = "amazon-direct-agents-database.cwmohzhqenjy.us-east-1.rds.amazonaws.com:3306";
    private $db_name = "p";
    private $username = "root";
    private $password = "Q|2[J0pk1^W}";
    public $conn;
     
    public function dbConnection()
	{
     
	    $this->conn = null;    
        try
		{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
        }
		catch(PDOException $exception)
		{
            echo "Connection error: " . $exception->getMessage();
        }
         
        return $this->conn;
    }
}
?>