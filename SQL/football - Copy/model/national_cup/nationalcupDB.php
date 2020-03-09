<?php

namespace Model;

use PDO;
use PDOException;

class NationalcupDB
{
    public $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function create($clubleague)
    {
        $sql = "INSERT INTO national_cup(id_nation, id_cup) VALUES (?, ?)";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $clubleague->idclub);
        $statement->bindParam(2, $clubleague->idleague);
        return $statement->execute();
        $clubleague->idclub = $this->connection->lastInsertId();
        $clubleague->idleague = $this->connection->lastInsertId();
    }

    public function update($id1, $id2, $clubleague)
    {
        $sql = "UPDATE national_cup SET id_nation = ?, id_cup = ? WHERE id_nation = ? AND id_cup = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $clubleague->idclub);
        $statement->bindParam(2, $clubleague->idleague);
        $statement->bindParam(3, $id1);
        $statement->bindParam(4, $id2);
        return $statement->execute();
        $clubleague->idclub = $this->connection->lastInsertId();
        $clubleague->idleague = $this->connection->lastInsertId();
    }

    public function getAll()
    {
        $sql = "SELECT national_team.id_nation, national_team.name_nation, cup.id_cup, cup.name_cup\n"

            . "FROM national_cup \n"

            . "INNER JOIN national_team ON national_team.id_nation = national_cup.id_nation \n"

            . "INNER JOIN cup ON cup.id_cup = national_cup.id_cup \n"

            . "ORDER BY national_team.id_nation ASC";

        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        $clubleagues = [];
        foreach ($result as $row) {
            $clubleague = new Nationalcup($row['id_nation'], $row['id_cup'], $row['name_nation'], $row['name_cup']);
            $clubleagues[] = $clubleague;
        }
        return $clubleagues;
    }

    public function get($id1, $id2)
    {
        $sql = "SELECT * FROM national_cup WHERE id_nation = ? AND id_cup = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id1);
        $statement->bindParam(2, $id2);
        $statement->execute();
        $row = $statement->fetch();
        $clubleague = new Nationalcup($row['id_nation'], $row['id_cup']);
        $clubleague->id1 = $row['id_nation'];
        $clubleague->id2 = $row['id_cup'];
        return $clubleague;
    }

    public function delete($id1, $id2)
    {
        $sql = "DELETE FROM national_cup WHERE id_nation = ? AND id_cup = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id1);
        $statement->bindParam(2, $id2);
        return $statement->execute();
    }
}