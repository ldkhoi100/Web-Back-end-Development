<?php

namespace Model;

use PDO;
use PDOException;

class LeagueDB
{
    public $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function isExistLeagueId($id)
    {
        $sql = "SELECT id_league FROM league WHERE id_league = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        $statement->execute();
        $result = $statement->fetch();
        return $result > 0;
    }

    public function create($league)
    {
        $sql = "INSERT INTO league(id_league, name_league, image) VALUES ('$league->id', '$league->name', '$league->image')";
        $statement = $this->connection->prepare($sql);
        return $statement->execute();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM league WHERE flag = false";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        $leagues = [];
        foreach ($result as $row) {
            $league = new League($row['id_league'], $row['name_league'], $row['image']);
            $league->id = $row['id_league'];
            $leagues[] = $league;
        }
        return $leagues;
    }

    public function get($id)
    {
        $sql = "SELECT * FROM league WHERE id_league = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        $statement->execute();
        $row = $statement->fetch();
        $league = new League($row['id_league'], $row['name_league'], $row['image']);
        $league->id = $row['id_league'];
        return $league;
    }

    public function delete($id)
    {
        $sql = "UPDATE league 
        SET flag = true WHERE id_league = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        return $statement->execute();
    }

    public function update($id, $league)
    {
        if ($league->image != '') {
            $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
            $sql = "UPDATE league SET name_league = '$league->name', image = '$image' WHERE id_league = $id";
            $statement = $this->connection->prepare($sql);
            return $statement->execute();
        } else {
            $sql = "UPDATE league SET name_league = '$league->name' WHERE id_league = $id";
            $statement = $this->connection->prepare($sql);
            return $statement->execute();
        }
    }

    public function showFileDeleted()
    {
        $sql = "SELECT * FROM league WHERE flag = true";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        $leagues = [];
        foreach ($result as $row) {
            $league = new League($row['id_league'], $row['name_league'], $row['image']);
            $league->id = $row['id_league'];
            $leagues[] = $league;
        }
        return $leagues;
    }

    public function backUpFileDeleted($id)
    {
        $sql = "UPDATE league 
        SET flag = false WHERE id_league = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        return $statement->execute();
    }

    public function deleteForever($id)
    {
        $sql = "DELETE FROM league WHERE id_league = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        return $statement->execute();
    }
}