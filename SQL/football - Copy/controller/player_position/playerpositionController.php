<?php

namespace Controller;

use function Couchbase\defaultDecoder;
use Model\Playerposition;
use Model\PlayerpositionDB;
use Model\DBConnection;

class PlayerpositionController
{
    public $clubleagueDB;

    public function __construct()
    {
        $connection = new DBConnection("mysql:host=localhost;dbname=football; charset=utf8", "root", "");
        $this->clubleagueDB = new PlayerpositionDB($connection->connect());
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            include 'add_playerposition.php';
        } else {
            $idclub = $_POST['id_club'];
            $idleague = $_POST['id_league'];
            $clubleague = new Playerposition($idclub, $idleague);
            $this->clubleagueDB->create($clubleague);
            $message = 'New player-position created';
            include 'add_playerposition.php';
        }
    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id1 = $_GET['id1'];
            $id2 = $_GET['id2'];
            $clubleague = $this->clubleagueDB->get($id1, $id2);
            include 'edit_playerposition.php';
        } else {
            $id1 = $_POST['id_club'];
            $id2 = $_POST['id_league'];
            $idclub = $_POST['idclub'];
            $idleague = $_POST['idleague'];
            $clubleague = new Playerposition($idclub, $idleague);
            $this->clubleagueDB->update($id1, $id2, $clubleague);
            echo '<meta http-equiv="refresh" content="0;url=view_playerposition.php">';
        }
    }

    public function index()
    {
        $clubleagues = $this->clubleagueDB->getAll();
        include 'list_playerposition.php';
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id1 = $_GET['id1'];
            $id2 = $_GET['id2'];
            $clubleague = $this->clubleagueDB->get($id1, $id2);
            include 'delete_playerposition.php';
        } else {
            $id1 = $_POST['id1'];
            $id2 = $_POST['id2'];
            $this->clubleagueDB->delete($id1, $id2);
            $message = "Delete Success";
            echo '<meta http-equiv="refresh" content="2;url=view_playerposition.php">';
            echo "  <div class='alert alert-success'>
                        <strong>Success</strong>, this player-position is deleted
                    </div>";
            echo "<p> Go home will start in <span id='ountdowntimer'>2 </span> Seconds <br><br>";
            echo "<a href='view_playerposition.php' class='btn btn-info'>Go to list club-league</a>";
        }
    }
}
?>
<script src="/public/js/countdown.js"></script>