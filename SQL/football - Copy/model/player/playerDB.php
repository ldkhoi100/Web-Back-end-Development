<?php

namespace Model;

use PDO;
use PDOException;

class PlayerDB
{
    public $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function isExistPlayerId($id)
    {
        $sql = "SELECT id_player FROM player WHERE id_player = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        $statement->execute();
        $result = $statement->fetch();
        return $result > 0;
    }

    public function create($player)
    {
        $sql = "INSERT INTO player (id_player, first_name, last_name, age, height, weight, clothers_number, id_club, id_nation, image, flag) VALUES ('$player->id', '$player->firstname', '$player->lastname', '$player->age', '$player->height', '$player->weight', '$player->clothersnumber', '$player->idclub', $player->idnation, '$player->image', '0')";
        $statement = $this->connection->prepare($sql);
        return $statement->execute();
        $player->idclub = $this->connection->lastInsertId();
        $player->idleague = $this->connection->lastInsertId();
    }

    public function getAll()
    {
        $sql = "SELECT player.id_player, player.first_name, player.last_name, player.age, player.height, player.weight, player.clothers_number, club.name_club, national_team.name_nation, player.image \n"

            . "FROM player INNER JOIN club ON club.id_club = player.id_club \n"

            . "INNER JOIN national_team ON national_team.id_nation = player.id_nation\n"

            . "WHERE player.flag = false ORDER BY player.id_player";

        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        $players = [];
        foreach ($result as $row) {
            $player = new Player($row['id_player'], $row['first_name'], $row['last_name'], $row['age'], $row['height'], $row['weight'], $row['clothers_number'], null, null, $row['name_club'], $row['name_nation'], $row['image']);
            $players[] = $player;
        }
        return $players;
    }

    public function get($id)
    {
        $sql = "SELECT * FROM player WHERE id_player = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        $statement->execute();
        $row = $statement->fetch();
        $player = new Player($row['id_player'], $row['first_name'], $row['last_name'], $row['age'], $row['height'], $row['weight'], $row['clothers_number'], $row['id_club'], $row['id_nation'], null, null, $row['image']);
        $player->id = $row['id_player'];
        return $player;
    }

    public function delete($id)
    {
        $sql = "UPDATE player SET flag = true WHERE id_player = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        return $statement->execute();
    }

    public function update($id, $player)
    {
        if ($player->image != '') {
            $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
            $sql = "UPDATE player SET id_player = '$player->id', first_name = '$player->firstname', last_name = '$player->lastname', age = '$player->age', height = '$player->height', weight = '$player->weight', clothers_number = '$player->clothersnumber', id_club = '$player->idclub', id_nation = '$player->idnation' , image = '$image' WHERE id_player = $id";
            $statement = $this->connection->prepare($sql);
            return $statement->execute();
        } else {
            $sql = "UPDATE player SET id_player = '$player->id', first_name = '$player->firstname', last_name = '$player->lastname', age = '$player->age', height = '$player->height', weight = '$player->weight', clothers_number = '$player->clothersnumber', id_club = '$player->idclub', id_nation = '$player->idnation' WHERE id_player = $id";
            $statement = $this->connection->prepare($sql);
            return $statement->execute();
        }
    }

    public function showFileDeleted()
    {
        $sql = "SELECT player.id_player, player.first_name, player.last_name, player.age, player.height, player.weight, player.clothers_number, club.name_club, national_team.name_nation, player.image \n"

            . "FROM player INNER JOIN club ON club.id_club = player.id_club \n"

            . "INNER JOIN national_team ON national_team.id_nation = player.id_nation\n"

            . "WHERE player.flag = true ORDER BY player.id_player";

        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        $players = [];
        foreach ($result as $row) {
            $player = new Player($row['id_player'], $row['first_name'], $row['last_name'], $row['age'], $row['height'], $row['weight'], $row['clothers_number'], null, null, $row['name_club'], $row['name_nation'], $row['image']);
            $player->id = $row['id_player'];
            $players[] = $player;
        }
        return $players;
    }

    public function backUpFileDeleted($id)
    {
        $sql = "UPDATE player SET flag = false WHERE id_player = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        return $statement->execute();
    }

    public function deleteForever($id)
    {
        $sql = "DELETE FROM player WHERE id_player = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        return $statement->execute();
    }
}