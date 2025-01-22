<?php
require_once "./connection.php";

class Product extends Connection
{
    protected $name;
    protected $price;

    protected $category;

    protected $disponibility;
    private $db;
    public function __construct($name = "", $price = 0, $category = "", $disponibility = "")
    {
        $this->name = $name;
        $this->price = $price;
        $this->category = $category;
        $this->disponibility = $disponibility;
        $this->db = new Connection("localhost", "esercizisql", "Oksana", "8Ph26qZ5");
    }

    public function showProducts($query): bool|array
    {
        $sql = ($query == "") ? "SELECT * FROM prodotti" : "SELECT * FROM prodotti WHERE nome LIKE '%$query%'";
        $query = $this->db->connection->query($sql);
        if ($query) {
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } else {
            die();
        }
    }
    public function createColumns($rows): array
    {
        $count = count($rows);
        return $count > 0 ? array_keys($rows[0]) : [];
    }
}
