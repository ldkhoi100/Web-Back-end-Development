<?php

namespace Model;

use PDO;
use PDOException;

class PlayerpositionDB
{
    public $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function create($clubleague)
    {
        $sql = "INSERT INTO player_position(id_player, id_position) VALUES (?, ?)";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $clubleague->idclub);
        $statement->bindParam(2, $clubleague->idleague);
        return $statement->execute();
        $clubleague->idclub = $this->connection->lastInsertId();
        $clubleague->idleague = $this->connection->lastInsertId();
    }

    public function update($id1, $id2, $clubleague)
    {
        $sql = "UPDATE player_position SET id_player = ?, id_position = ? WHERE id_player = ? AND id_position = ?";
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
        $sql = "SELECT player.id_player, player.last_name, position.id_position, position.name_position\n"

            . "FROM player_position \n"

            . "INNER JOIN player ON player.id_player = player_position.id_player \n"

            . "INNER JOIN position ON position.id_position = player_position.id_position \n"

            . "ORDER BY player.id_player ASC";

        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        $clubleagues = [];
        foreach ($result as $row) {
            $clubleague = new Playerposition($row['id_player'], $row['id_position'], $row['last_name'], $row['name_position']);
            $clubleagues[] = $clubleague;
        }
        return $clubleagues;
    }

    public function get($id1, $id2)
    {
        $sql = "SELECT * FROM player_position WHERE id_player = ? AND id_position = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id1);
        $statement->bindParam(2, $id2);
        $statement->execute();
        $row = $statement->fetch();
        $clubleague = new Playerposition($row['id_player'], $row['id_position']);
        $clubleague->id1 = $row['id_player'];
        $clubleague->id2 = $row['id_position'];
        return $clubleague;
    }

    public function delete($id1, $id2)
    {
        $sql = "DELETE FROM player_position WHERE id_player = ? AND id_position = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id1);
        $statement->bindParam(2, $id2);
        return $statement->execute();
    }
}