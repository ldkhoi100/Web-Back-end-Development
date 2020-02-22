<?php

namespace Controller;

use function Couchbase\defaultDecoder;
use Model\League;
use Model\LeagueDB;
use Model\DBConnection;

class LeagueController
{

    public $leagueDB;

    public function __construct()
    {
        $connection = new DBConnection("mysql:host=localhost;dbname=football", "root", "");
        $this->leagueDB = new LeagueDB($connection->connect());
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            include 'add_league.php';
        } else {
            $id = $_POST['id_league'];
            $name = $_POST['name_league'];
            $league = new League($id, $name);
            $this->leagueDB->create($league);
            $message = 'New league created';
            include 'add_league.php';
        }
    }

    public function index()
    {
        $leagues = $this->leagueDB->getAll();
        include 'list_league.php';
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $league = $this->leagueDB->get($id);
            include 'delete_league.php';
        } else {
            $id = $_POST['id'];
            $this->leagueDB->delete($id);
            $message = "Delete Success";
            //include 'delete_league.php';
            header('Location: view_league.php');
        }
    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $league = $this->leagueDB->get($id);
            include 'edit_league.php';
        } else {
            $id = $_POST['id_league'];
            $league = new League($_POST['id_league'], $_POST['name_league']);
            $this->leagueDB->update($id, $league);
            header('Location: view_league.php');
        }
    }
}