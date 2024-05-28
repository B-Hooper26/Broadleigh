<?php

class DatabaseController extends PDO {

    public function __construct(string $dsn, string $username, string $password, array $options = []) {
        $defaultOptions = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ];

        $options = array_replace($defaultOptions, $options);

        parent::__construct($dsn, $username, $password, $options);
    }

    public function runSQL(string $sql, array $args = null) {
        if (!$args) {
            return $this->query($sql);
        }

        $statement = $this->prepare($sql);
        $statement->execute($args);
        return $statement;
    }

    public function getConnection() {
        return $this; // Return the PDO instance itself
    }
}