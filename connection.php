<?php
class Connection
{
    private $hostName;
    private $dbName;
    private $dbUser;
    private $dbPassword;
    public function __construct(string $host, string $nameDb, string $user, string $password)
    {
        $this->hostName = $host;
        $this->dbName = $nameDb;
        $this->dbUser = $user;
        $this->dbPassword = $password;
    }

    public function createConnection(): PDO|string
    {
        $dsn = "mysql:host=$this->hostName;dbname=$this->dbName";
        try {
            return new PDO($dsn, $this->dbUser, $this->dbPassword);
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }
}
