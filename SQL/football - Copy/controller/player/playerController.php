<?php

namespace Controller;

use function Couchbase\defaultDecoder;
use Model\Player;
use Model\PlayerDB;
use Model\DBConnection;

class PlayerController
{

    public $playerDB;

    public function __construct()
    {
        $connection = new DBConnection("mysql:host=localhost;dbname=football;charset=utf8", "root", "");
        $this->playerDB = new PlayerDB($connection->connect());
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            include 'add_player.php';
        } else {
            $id = $_POST['id_player'];
            $firstname = $_POST['first_name'];
            $lastname = $_POST['last_name'];
            $age = $_POST['age'];
            $height = $_POST['height'];
            $weight = $_POST['weight'];
            $clothersnumber = $_POST['clothers_number'];
            $idclub = $_POST['id_club'];
            $idnation = $_POST['id_nation'];
            $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));

            $array = $this->playerDB->isExistPlayerId($id);
            if ($array == true) {
                $player = new Player($id, $firstname, $lastname, $age, $height, $weight, $clothersnumber, $idclub, $idnation, null, null, $image);
                $this->playerDB->create($player);
                $error = 'fail';
            } else {
                $player = new Player($id, $firstname, $lastname, $age, $height, $weight, $clothersnumber, $idclub, $idnation, null, null, $image);
                $this->playerDB->create($player);
                $message = 'New player created';
            }
            include 'add_player.php';
        }
    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $player = $this->playerDB->get($id);
            include 'edit_player.php';
        } else {
            $id = $_POST['id_player'];
            $player = new Player($_POST['id_player'], $_POST['first_name'], $_POST['last_name'], $_POST['age'], $_POST['height'], $_POST['weight'], $_POST['clothers_number'], $_POST['id_club'], $_POST['id_nation'], null, null, addslashes(file_get_contents($_FILES['image']['tmp_name'])));
            $this->playerDB->update($id, $player);
            echo '<meta http-equiv="refresh" content="0;url=view_player.php">';
        }
    }

    public function index()
    {
        $players = $this->playerDB->getAll();
        include 'list_player.php';
    }

    public function showBackup()
    {
        $players = $this->playerDB->showFileDeleted();
        include 'backup_view_player.php';
    }

    public function backupFile()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $player = $this->playerDB->get($id);
            include 'backup_file_player.php';
        } else {
            $id = $_POST['id'];
            $this->playerDB->backUpFileDeleted($id);
            echo '<meta http-equiv="refresh" content="2;url=view_player.php?page=backup_player">';
            echo "  <div class='alert alert-success'>
                        <strong>Success</strong>, this player is backuped
                    </div>";
            echo "<p> Go home will start in <span id='ountdowntimer'>2 </span> Seconds <br><br>";
            echo "<a href='view_player.php' class='btn btn-info'>Go to list player</a>";
        }
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $player = $this->playerDB->get($id);
            include 'delete_player.php';
        } else {
            $id = $_POST['id_player'];
            $this->playerDB->delete($id);
            $message = "Delete Success";
            echo '<meta http-equiv="refresh" content="2;url=view_player.php">';
            echo "  <div class='alert alert-success'>
                        <strong>Success</strong>, this player is deleted
                    </div>";
            echo "<p> Go home will start in <span id='ountdowntimer'>2 </span> Seconds <br><br>";
            echo "<a href='view_player.php' class='btn btn-info'>Go to list player</a>";
        }
    }

    public function deleteForever()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $player = $this->playerDB->get($id);
            include 'delete_forever.php';
        } else {
            $id = $_POST['id'];
            $this->playerDB->deleteForever($id);
            $message = "Delete Success";
            echo '<meta http-equiv="refresh" content="2;url=view_player.php?page=backup_player">';
            echo "  <div class='alert alert-success'>
                        <strong>Success</strong>, this player is deleted forever
                    </div>";
            echo "<p> Go home will start in <span id='ountdowntimer'>2 </span> Seconds <br><br>";
            echo "<a href='view_player.php' class='btn btn-info'>Go to list player</a>";
        }
    }
}
?>
<script src="/public/js/countdown.js"></script>