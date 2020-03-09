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

    public function isExistClubId($id)
    {
        $sql = "SELECT id_club FROM club WHERE id_club = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        $statement->execute();
        $result = $statement->fetch();
        return $result > 0;
    }

    public function create($club)
    {
        $sql = "INSERT INTO club(id_club, name_club, stadium, coach_name, image) VALUES ('$club->id', '$club->name', '$club->stadium', '$club->coach', '$club->image')";
        $statement = $this->connection->prepare($sql);
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
            $club = new Club($row['id_club'], $row['name_club'], $row['stadium'], $row['coach_name'], $row['image']);
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
        $club = new Club($row['id_club'], $row['name_club'], $row['stadium'], $row['coach_name'], $row['image']);
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
        if ($club->image != '') {
            $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
            $sql = "UPDATE club SET name_club = '$club->name', stadium = '$club->stadium', coach_name = '$club->coach', image = '$image' WHERE id_club = $id";
            $statement = $this->connection->prepare($sql);
            return $statement->execute();
        } else {
            $sql = "UPDATE club SET name_club = '$club->name', stadium = '$club->stadium', coach_name = '$club->coach' WHERE id_club = $id";
            $statement = $this->connection->prepare($sql);
            return $statement->execute();
        }
    }

    public function showFileDeleted()
    {
        $sql = "SELECT * FROM club WHERE flag = true";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        $clubs = [];
        foreach ($result as $row) {
            $club = new Club($row['id_club'], $row['name_club'], $row['stadium'], $row['coach_name'], $row['image']);
            $club->id = $row['id_club'];
            $clubs[] = $club;
        }
        return $clubs;
    }

    public function backUpFileDeleted($id)
    {
        $sql = "UPDATE club SET flag = false WHERE id_club = ?";
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