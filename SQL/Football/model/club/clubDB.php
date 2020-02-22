<?php

namespace Model;

use PDO;
use PDOException;

class ClubDB
{
    public $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function create($club)
    {
        $sql = "INSERT INTO club(id_club, name_club, stadium, coach_name) VALUES (?, ?, ?, ?)";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $club->id);
        $statement->bindParam(2, $club->name);
        $statement->bindParam(3, $club->stadium);
        $statement->bindParam(4, $club->coach);
        return $statement->execute();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM club WHERE flag = false";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        $clubs = [];
        foreach ($result as $row) {
            $club = new Club($row['id_club'], $row['name_club'], $row['stadium'], $row['coach_name']);
            $club->id = $row['id_club'];
            $clubs[] = $club;
        }
        return $clubs;
    }

    public function get($id)
    {
        $sql = "SELECT * FROM club WHERE id_club = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        $statement->execute();
        $row = $statement->fetch();
        $club = new Club($row['id_club'], $row['name_club'], $row['stadium'], $row['coach_name']);
        $club->id = $row['id_club'];
        return $club;
    }

    public function delete($id)
    {
        $sql = "UPDATE club 
        SET flag = true WHERE id_club = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        return $statement->execute();
    }

    public function update($id, $club)
    {
        $sql = "UPDATE club SET name_club = ?, stadium = ?, coach_name = ? WHERE id_club = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $club->name);
        $statement->bindParam(2, $club->stadium);
        $statement->bindParam(3, $club->coach);
        $statement->bindParam(4, $id);
        return $statement->execute();
    }

    public function showFileDeleted()
    {
        $sql = "SELECT * FROM club WHERE flag = true";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        $clubs = [];
        foreach ($result as $row) {
            $club = new Club($row['id_club'], $row['name_club'], $row['stadium'], $row['coach_name']);
            $club->id = $row['id_club'];
            $clubs[] = $club;
        }
        return $clubs;
    }

    public function backUpFileDeleted($id)
    {
        $sql = "UPDATE club 
        SET flag = false WHERE id_club = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        return $statement->execute();
    }

    public function deleteForever($id)
    {
        $sql = "DELETE FROM club WHERE id_club = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        return $statement->execute();
    }
}