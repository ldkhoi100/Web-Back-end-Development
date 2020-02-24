<?php

namespace Model;

use PDO;
use PDOException;

class CupDB
{
    public $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function create($cup)
    {
        $sql = "INSERT INTO cup(id_cup, name_cup, image) VALUES (?, ?, ?)";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $cup->id);
        $statement->bindParam(2, $cup->name);
        $statement->bindParam(3, $cup->image);
        return $statement->execute();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM cup WHERE flag = false";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        $cups = [];
        foreach ($result as $row) {
            $cup = new cup($row['id_cup'], $row['name_cup'], $row['image']);
            $cup->id = $row['id_cup'];
            $cups[] = $cup;
        }
        return $cups;
    }

    public function get($id)
    {
        $sql = "SELECT * FROM cup WHERE id_cup = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        $statement->execute();
        $row = $statement->fetch();
        $cup = new cup($row['id_cup'], $row['name_cup'], $row['image']);
        $cup->id = $row['id_cup'];
        return $cup;
    }


    public function delete($id)
    {
        $sql = "UPDATE cup 
        SET flag = true WHERE id_cup = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        return $statement->execute();
    }

    public function update($id, $cup)
    {
        $sql = "UPDATE cup SET name_cup = ?, image = ? WHERE cup.id_cup = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $cup->name);
        $statement->bindParam(2, $cup->image);
        $statement->bindParam(3, $id);
        return $statement->execute();
    }

    public function showFileDeleted()
    {
        $sql = "SELECT * FROM cup WHERE flag = true";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        $cups = [];
        foreach ($result as $row) {
            $cup = new cup($row['id_cup'], $row['name_cup'], $row['image']);
            $cup->id = $row['id_cup'];
            $cups[] = $cup;
        }
        return $cups;
    }

    public function backUpFileDeleted($id)
    {
        $sql = "UPDATE cup 
        SET flag = false WHERE id_cup = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        return $statement->execute();
    }

    public function deleteForever($id)
    {
        $sql = "DELETE FROM cup WHERE id_cup = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        return $statement->execute();
    }
}