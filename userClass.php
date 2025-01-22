<?php
require_once "./connection.php";

class User extends Connection
{
    public $name;
    public $surName;
    private $db;
    public function __construct($name, $surName)
    {
        $this->name = $name;
        $this->surName = $surName;
        $this->db = new Connection("localhost", "test_conessione", "Oksana", "8Ph26qZ5");
    }

    public function addToDb()
    {
        $sql = "INSERT INTO utenti(nome, cognome) VALUES (:nome, :cognome)";
        $query = $this->db->connection->prepare($sql);
        $query->bindParam(':nome', $this->name, PDO::PARAM_STR);
        $query->bindParam(':cognome', $this->surName, PDO::PARAM_STR);

        if ($query->execute()) {
            echo "<div class=\"alert alert-success fs-2 text-center mx-auto mt-5\" role=\"alert\">
                New user has created:<br>
                UserName : $this->name <br>
                UserSurname : $this->surName<br>
                </div>";
        } else {
            echo $query->errorInfo();
        }
    }
}
