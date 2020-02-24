<?php

namespace Controller;

use function Couchbase\defaultDecoder;
use Model\Club;
use Model\ClubDB;
use Model\DBConnection;

class ClubController
{

    public $clubDB;

    public function __construct()
    {
        $connection = new DBConnection("mysql:host=localhost;dbname=football;charset=utf8", "root", "");
        $this->clubDB = new ClubDB($connection->connect());
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            include 'add_club.php';
        } else {
            $id = $_POST['id_club'];
            $name = $_POST['name_club'];
            $stadium = $_POST['stadium'];
            $coach = $_POST['coach_name'];
            $club = new Club($id, $name, $stadium, $coach);
            $this->clubDB->create($club);
            $message = 'New club created';
            include 'add_club.php';
        }
    }

    public function index()
    {
        $clubs = $this->clubDB->getAll();
        include 'list_club.php';
    }

    public function showBackup()
    {
        $clubs = $this->clubDB->showFileDeleted();
        include 'backup_view_club.php';
    }

    public function backupFile()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $club = $this->clubDB->get($id);
            include 'backup_file_club.php';
        } else {
            $id = $_POST['id'];
            $this->clubDB->backUpFileDeleted($id);
            header('refresh:2;view_club.php?page=backup_club');
            echo "  <div class='alert alert-success'>
                        <strong>Success</strong>, this club is backuped
                    </div>";
            echo "<p> Go home will start in <span id='ountdowntimer'>2 </span> Seconds <br><br>";
            echo "<a href='view_club.php' class='btn btn-info'>Go to list club</a>";
            //header('Location: view_club.php?page=backup_club');
        }
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $club = $this->clubDB->get($id);
            include 'delete_club.php';
        } else {
            $id = $_POST['id'];
            $this->clubDB->delete($id);
            $message = "Delete Success";
            //include 'delete_club.php';
            //header('Location: view_club.php');
            header("refresh:2;view_club.php");
            echo "  <div class='alert alert-success'>
                        <strong>Success</strong>, this club is deleted
                    </div>";
            echo "<p> Go home will start in <span id='ountdowntimer'>2 </span> Seconds <br><br>";
            echo "<a href='view_club.php' class='btn btn-info'>Go to list club</a>";
        }
    }

    public function deleteForever()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $club = $this->clubDB->get($id);
            include 'delete_forever.php';
        } else {
            $id = $_POST['id'];
            $this->clubDB->deleteForever($id);
            $message = "Delete Success";
            header('refresh:2;view_club.php?page=backup_club');
            echo "  <div class='alert alert-success'>
                        <strong>Success</strong>, this club is deleted forever
                    </div>";
            echo "<p> Go home will start in <span id='ountdowntimer'>2 </span> Seconds <br><br>";
            echo "<a href='view_club.php' class='btn btn-info'>Go to list club</a>";
        }
    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $club = $this->clubDB->get($id);
            include 'edit_club.php';
        } else {
            $id = $_POST['id_club'];
            $club = new Club($_POST['id_club'], $_POST['name_club'], $_POST['stadium'], $_POST['coach_name']);
            $this->clubDB->update($id, $club);
            header('Location: view_club.php');
        }
    }
}
?>
<script src="/public/js/countdown.js"></script>