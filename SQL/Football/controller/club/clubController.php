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
        $connection = new DBConnection("mysql:host=localhost;dbname=football", "root", "");
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

    public function showBackupClup()
    {
        $clubs = $this->clubDB->showFileDeleted();
        include 'backup_club_view.php';
    }

    public function backupFileClup()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $club = $this->clubDB->get($id);
            include 'backup_file_clup.php';
        } else {
            $id = $_POST['id'];
            $this->clubDB->backUpFileDeleted($id);
            $message = "Back up Success";
            //include 'delete_club.php';
            header('Location: view_club.php?page=backup_clup');
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
            header('Location: view_club.php');
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
            //include 'delete_club.php';
            header('Location: view_club.php?page=backup_clup');
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