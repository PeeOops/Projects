<?php

// Connect to MySQL Database and execute a query
// Create Database class
class Database {

    public $connection;

    // PHP will automatically call this function when you create an object from a class
    public function __construct(){
        $dsn = "mysql:host=localhost;port=3306;user=root;password=password;dbname=myapp;charset=utf8mb4;";

        // New instance
        $this->connection = new PDO($dsn);
    }

    // Method query
    public function query($query){


        // Prepare a new query called $statement and execute
        $statement = $this->connection->prepare($query);
        $statement->execute();

        // Fetch all the results
        return $statement;
    }
}