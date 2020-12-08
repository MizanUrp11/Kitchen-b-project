<?php
class Connection {
    public $conn;
    public function __construct() {
        $this->conn = new PDO("mysql:host=localhost;dbname=kitchenb", 'root', '');
    }

    public function getAll($query,$array){
        $statement = $this->conn->prepare($query);
        $statement->execute($array);
        return $statement->fetchAll();
    }

    public function update($query,$array){
        $statement = $this->conn->prepare($query);
        $statement->execute($array);
    }

}
