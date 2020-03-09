<?php

namespace Model;

use PDO;
use PDOException;

class NationalteamDB
{
    public $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function isExistNationalTeamId($id)
    {
        $sql = "SELECT id_nation FROM national_team WHERE id_nation = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        $statement->execute();
        $result = $statement->fetch();
        return $result > 0;
    }

    public function create($national_team)
    {
        $sql = "INSERT INTO national_team(id_nation, name_nation, continent, ranking, coach_name, image) VALUES ('$national_team->id', '$national_team->name', '$national_team->continent', '$national_team->ranking', '$national_team->coach', '$national_team->image')";
        $statement = $this->connection->prepare($sql);
        return $statement->execute();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM national_team WHERE flag = false";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        $national_teams = [];
        foreach ($result as $row) {
            $national_team = new Nationalteam($row['id_nation'], $row['name_nation'], $row['continent'], $row['ranking'], $row['coach_name'], $row['image']);
            $national_teams[] = $national_team;
        }
        return $national_teams;
    }

    public function get($id)
    {
        $sql = "SELECT * FROM national_team WHERE id_nation = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        $statement->execute();
        $row = $statement->fetch();
        $national_team = new Nationalteam($row['id_nation'], $row['name_nation'], $row['continent'], $row['ranking'], $row['coach_name'], $row['image']);
        $national_team->id = $row['id_nation'];
        return $national_team;
    }

    public function delete($id)
    {
        $sql = "UPDATE national_team 
        SET flag = true WHERE id_nation = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        return $statement->execute();
    }

    public function update($id, $national_team)
    {
        if ($national_team->image != '') {
            $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
            $sql = "UPDATE national_team SET name_nation = '$national_team->name', continent = '$national_team->continent', ranking = '$national_team->ranking', coach_name = '$national_team->coach', image = '$image' WHERE id_nation = $id";
            $statement = $this->connection->prepare($sql);
            return $statement->execute();
        } else {
            $sql = "UPDATE national_team SET name_nation = '$national_team->name', continent = '$national_team->continent', ranking = '$national_team->ranking', coach_name = '$national_team->coach' WHERE id_nation = $id";
            $statement = $this->connection->prepare($sql);
            return $statement->execute();
        }
    }

    public function showFileDeleted()
    {
        $sql = "SELECT * FROM national_team WHERE flag = true";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        $national_teams = [];
        foreach ($result as $row) {
            $national_team = new Nationalteam($row['id_nation'], $row['name_nation'], $row['continent'], $row['ranking'], $row['coach_name'], $row['image']);
            $national_team->id = $row['id_nation'];
            $national_teams[] = $national_team;
        }
        return $national_teams;
    }

    public function backUpFileDeleted($id)
    {
        $sql = "UPDATE national_team SET flag = false WHERE id_nation = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        return $statement->execute();
    }

    public function deleteForever($id)
    {
        $sql = "DELETE FROM national_team WHERE id_nation = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        return $statement->execute();
    }
}