<?php
namespace core\Database;

class MysqlDatabase extends AbstractDatabase {
    public function getConnection() {
        return $this->connection;
    }
}