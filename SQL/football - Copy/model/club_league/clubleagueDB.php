<?php

namespace Model;

use PDO;
use PDOException;

class ClubleagueDB
{
    public $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function create($clubleague)
    {
        $sql = "INSERT INTO club_league(id_club, id_league) VALUES (?, ?)";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $clubleague->idclub);
        $statement->bindParam(2, $clubleague->idleague);
        return $statement->execute();
        $clubleague->idclub = $this->connection->lastInsertId();
        $clubleague->idleague = $this->connection->lastInsertId();
    }

    public function update($id1, $id2, $clubleague)
    {
        $sql = "UPDATE club_league SET id_club = ?, id_league = ? WHERE id_club = ? AND id_league = ?";
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
        $sql = "SELECT club.id_club, club.name_club, league.id_league, league.name_league\n"

            . "FROM club_league \n"

            . "INNER JOIN club ON club.id_club = club_league.id_club \n"

            . "INNER JOIN league ON club_league.id_league = league.id_league \n"

            . "ORDER BY club.id_club ASC";

        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        $clubleagues = [];
        foreach ($result as $row) {
            $clubleague = new Clubleague($row['id_club'], $row['id_league'], $row['name_club'], $row['name_league']);
            $clubleagues[] = $clubleague;
        }
        return $clubleagues;
    }

    public function get($id1, $id2)
    {
        $sql = "SELECT * FROM club_league WHERE id_club = ? AND id_league = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id1);
        $statement->bindParam(2, $id2);
        $statement->execute();
        $row = $statement->fetch();
        $clubleague = new Clubleague($row['id_club'], $row['id_league']);
        $clubleague->id1 = $row['id_club'];
        $clubleague->id2 = $row['id_league'];
        return $clubleague;
    }

    public function delete($id1, $id2)
    {
        $sql = "DELETE FROM club_league WHERE id_club = ? AND id_league = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id1);
        $statement->bindParam(2, $id2);
        return $statement->execute();
    }
}