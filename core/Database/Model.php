<?php

namespace Core\Database;

use PDO;
// this model is just for mysql
class Model
{
    private static $mysqlDatabase;
    protected static $table;

    public static function initMysqlConnection($host, $dbname, $username, $password): void
    {
        $mysqlConnection = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);
        self::$mysqlDatabase = new MysqlDatabase($mysqlConnection);
    }

    public static function insert($data)
    {
        $table = self::convertModelToTable();
        $columns = implode(', ', array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));
        $query = "INSERT INTO {$table} ({$columns}) VALUES ({$placeholders})";
        $statement = self::$mysqlDatabase->getConnection()->prepare($query);
        return $statement->execute($data);
    }

    public static function findAll($condition = [])
    {
        $table = self::convertModelToTable();
        if (empty($condition)) {
            $query = "SELECT * FROM {$table} order By `id` desc";
            $statement = self::$mysqlDatabase->getConnection()->prepare($query);
            $statement->execute();
            return $statement->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            $columns = implode(', ', array_keys($condition));
            $placeholders = ':' . implode(', :', array_keys($condition));
            $query = "SELECT * FROM {$table} WHERE {$columns} = {$placeholders}";

            $statement = self::$mysqlDatabase->getConnection()->prepare($query);
            $statement->execute($condition);

            return $statement->fetch(\PDO::FETCH_ASSOC);
        }
    }


    public static function findAllWith($with, $relation_param, $condition = [])
    {
        $table = self::convertModelToTable();
        if (empty($condition)) {
            $query = "SELECT * 
          FROM {$table} AS t1
          JOIN {$with} AS t2
          ON t1.{$relation_param} = t2.id
          ORDER BY t1.id DESC";
            $statement = self::$mysqlDatabase->getConnection()->prepare($query);
            $statement->execute();
            return $statement->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            $columns = implode(', ', array_keys($condition));
            $placeholders = ':' . implode(', :', array_keys($condition));
            $query = "SELECT * FROM {$table} AS t1 WHERE {$columns} = {$placeholders} JOIN {$with} AS t2
            ON t1.{$relation_param} = t2.id
            ORDER BY t1.id DESC";

            $statement = self::$mysqlDatabase->getConnection()->prepare($query);
            $statement->execute($condition);

            return $statement->fetch(\PDO::FETCH_ASSOC);
        }
    }

    public static function delete($condition)
    {
        $table = self::convertModelToTable();
    
        // Check if $condition is empty
        if (empty($condition)) {
            $query = "DELETE FROM {$table}";
            $statement = self::$mysqlDatabase->getConnection()->prepare($query);
            return $statement->execute();
        }
        
        $columns = implode(' = :', array_keys($condition));
        $placeholders = ':' . implode(', :', array_keys($condition));
        $query = "DELETE FROM {$table} WHERE {$columns} = {$placeholders}";
        $statement = self::$mysqlDatabase->getConnection()->prepare($query);
        return $statement->execute($condition);
    }

    public static function update($condition, $data)
    {
        $table = self::convertModelToTable();
        $updateColumns = implode(', ', array_map(function ($column) {
            return "{$column} = :{$column}";
        }, array_keys($data)));

        $whereColumns = implode(' = :', array_keys($condition));
        $wherePlaceholders = ':' . implode(', :', array_keys($condition));
        $query = "UPDATE {$table} SET {$updateColumns} WHERE {$whereColumns} = {$wherePlaceholders}";

        $statement = self::$mysqlDatabase->getConnection()->prepare($query);
        $params = array_merge($data, $condition);

        return $statement->execute($params);
    }

    public static function convertModelToTable()
    {
        $model = get_called_class();
        $model_parts = explode("\\", $model);
        $model_name = $model_parts[count($model_parts) - 1];
        $table_name = strtolower($model_name) . 's';
        return $table_name;
    }

    public static function find($id)
    {
        $table = self::convertModelToTable();
        $query = "SELECT * FROM {$table} WHERE id = :id";
        $statement = self::$mysqlDatabase->getConnection()->prepare($query);
        $statement->execute(['id' => $id]);

        return $statement->fetch(\PDO::FETCH_ASSOC);
    }
}
