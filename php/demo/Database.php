<?php

// Connect to MySQL Database and execute a query
// Create Database class
class Database {

    public $connection;

    // PHP will automatically call this function when you create an object from a class
    public function __construct($config, $username='root', $password='password'){

        // Build up dns
        $dsn = 'mysql:' . http_build_query($config,'',';');


        // New instance
        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
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