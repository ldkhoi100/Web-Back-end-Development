<?php

namespace Model;

use PDO;
use PDOException;

class PositionDB
{
    public $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function isExistPositionId($id_position)
    {
        $sql = "SELECT id_position FROM position WHERE id_position = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id_position);
        $statement->execute();
        $result = $statement->fetch();
        return $result > 0;
    }

    public function create($cup)
    {
        $sql = "INSERT INTO position (id_position, name_position, flag) VALUES ('$cup->id', '$cup->name', 0)";
        $statement = $this->connection->prepare($sql);
        return $statement->execute();
    }

    // update
    public function update($id, $cup)
    {
        $sql = "UPDATE position SET name_position = '$cup->name' WHERE id_position = $id";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM position WHERE flag = false";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        $cups = [];
        foreach ($result as $row) {
            $cup = new Position($row['id_position'], $row['name_position']);
            $cup->id = $row['id_position'];
            $cups[] = $cup;
        }
        return $cups;
    }

    public function get($id)
    {
        $sql = "SELECT * FROM position WHERE id_position = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        $statement->execute();
        $row = $statement->fetch();
        $cup = new Position($row['id_position'], $row['name_position']);
        $cup->id = $row['id_position'];
        return $cup;
    }


    public function delete($id)
    {
        $sql = "UPDATE position SET flag = true WHERE id_position = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        return $statement->execute();
    }

    public function showFileDeleted()
    {
        $sql = "SELECT * FROM position WHERE flag = true";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        $cups = [];
        foreach ($result as $row) {
            $cup = new Position($row['id_position'], $row['name_position']);
            $cup->id = $row['id_position'];
            $cups[] = $cup;
        }
        return $cups;
    }

    public function backUpFileDeleted($id)
    {
        $sql = "UPDATE position 
        SET flag = false WHERE id_position = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        return $statement->execute();
    }

    public function deleteForever($id)
    {
        $sql = "DELETE FROM position WHERE id_position = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        return $statement->execute();
    }
}