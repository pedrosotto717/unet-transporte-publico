<?php

namespace app\utils;

class DataBase
{
    private $connection;
    private $host;
    private $user;
    private $password;
    private $database;

    public function __construct()
    {
        $this->user = config('database.user');
        $this->host = config('database.host');
        $this->password = config('database.password');
        $this->database = config('database.dbName');
        $this->connectPDO();
    }

    //connect to database via PDO
    public function connectPDO()
    {
        try {
            $this->connection =  new \PDO(
                "mysql:host=" . $this->host .
                    ";dbname=" . $this->database,
                $this->user,
                $this->password
            );

            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $th) {
            return null;
        }
    }

    //close connection
    public function closeConnection()
    {
        $this->connection->close();
        $this->connection = null;
    }

    //execute query
    public function query($query, $params = [])
    {
        $stmt = $this->connection->prepare($query);
        $stmt->execute($params);
        return $stmt;
    }

    //get last inserted id
    public function lastInsertId()
    {
        return $this->connection->lastInsertId();
    }
}
