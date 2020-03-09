<?php

namespace Model;

use PDO;
use PDOException;

class ListloginDB
{
    public $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function isExistListloginId($id)
    {
        $sql = "SELECT id FROM users WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        $statement->execute();
        $result = $statement->fetch();
        return $result > 0;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM users";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        $listlogins = [];
        foreach ($result as $row) {
            $listlogin = new Listlogin($row['id'], $row['username'], $row['password'], $row['created_at'], $row['flag']);
            $listlogin->id = $row['id'];
            $listlogins[] = $listlogin;
        }
        return $listlogins;
    }

    public function get($id)
    {
        $sql = "SELECT * FROM users WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        $statement->execute();
        $row = $statement->fetch();
        $listlogin = new Listlogin($row['id'], $row['username'], $row['password'], $row['created_at'], $row['flag']);
        $listlogin->id = $row['id'];
        return $listlogin;
    }


    public function delete($id)
    {
        $sql = "DELETE FROM users WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        return $statement->execute();
    }

    public function grantaccess($id)
    {
        $sql = "UPDATE users SET flag = true WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        return $statement->execute();
    }

    public function revokeaccess($id)
    {
        $sql = "UPDATE users SET flag = false WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        return $statement->execute();
    }
}