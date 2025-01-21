<?php
class Connection
{
    private $hostName;
    private $dbName;
    private $dbUser;
    private $dbPassword;
    public $connection;
    public function __construct(string $host = "localhost", string $nameDb = "test_conessione", string $user = "Oksana", string $password = "8Ph26qZ5")
    {
        $this->hostName = $host;
        $this->dbName = $nameDb;
        $this->dbUser = $user;
        $this->dbPassword = $password;
        $dsn = "mysql:host=$this->hostName;dbname=$this->dbName";
        try {
            $this->connection = new PDO($dsn, $this->dbUser, $this->dbPassword);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
