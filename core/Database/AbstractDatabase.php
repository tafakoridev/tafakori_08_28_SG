<?php
namespace core\Database;

abstract class AbstractDatabase {
    protected $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    abstract public function getConnection();
}