<?php

// Connect to MySQL Database and execute a query
// Create Database class
class Database {

    public $connection;
    public $statement;

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
    public function query($query, $params = []){


        // Prepare a new query called $statement and execute
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);

        return $this;
    }

    // get Method to fetch

    public function get (){
        return $this->statement->fetchAll();
    }

    // Find method
    public function find(){
        return $this->statement->fetch();
    }

    // FindorFail method

    public function findOrFail(){
        $result = $this->find();

        if(!$result){
            abort();
        }

        return $result;
    }
}
