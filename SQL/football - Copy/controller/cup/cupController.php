<?php

namespace Controller;

use function Couchbase\defaultDecoder;
use Model\Cup;
use Model\CupDB;
use Model\DBConnection;

class CupController
{

    public $cupDB;

    public function __construct()
    {
        $connection = new DBConnection("mysql:host=localhost;dbname=football;charset=utf8", "root", "");
        $this->cupDB = new CupDB($connection->connect());
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            include 'add_cup.php';
        } else {
            $id = $_POST['id_cup'];
            $name = $_POST['name_cup'];
            /** image */
            $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
            $array = $this->cupDB->isExistCupId($id);
            if ($array == true) {
                $cup = new Cup($id, $name, $image);
                $this->cupDB->create($cup);
                $error = 'fail';
            } else {
                $cup = new Cup($id, $name, $image);
                $this->cupDB->create($cup);
                $message = 'New cup created';
            }
            include 'add_cup.php';
        }
    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $cup = $this->cupDB->get($id);
            include 'edit_cup.php';
        } else {
            $id = $_POST['id_cup'];
            $cup = new Cup($_POST['id_cup'], $_POST['name_cup'], addslashes(file_get_contents($_FILES['image']['tmp_name'])));
            $this->cupDB->update($id, $cup);
            echo '<meta http-equiv="refresh" content="0;url=view_cup.php">';
        }
    }

    public function index()
    {
        $cups = $this->cupDB->getAll();
        include 'list_cup.php';
    }

    public function showBackup()
    {
        $cups = $this->cupDB->showFileDeleted();
        include 'backup_view_cup.php';
    }

    public function backupFile()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $cup = $this->cupDB->get($id);
            include 'backup_file_cup.php';
        } else {
            $id = $_POST['id'];
            $this->cupDB->backUpFileDeleted($id);
            echo '<meta http-equiv="refresh" content="2;url=view_cup.php?page=backup_cup">';
            echo "  <div class='alert alert-success'>
                        <strong>Success</strong>, this cup is backuped
                    </div>";
            echo "<p> Go home will start in <span id='ountdowntimer'>2 </span> Seconds <br><br>";
            echo "<a href='view_cup.php' class='btn btn-info'>Go to list cup</a>";
        }
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $cup = $this->cupDB->get($id);
            include 'delete_cup.php';
        } else {
            $id = $_POST['id'];
            $this->cupDB->delete($id);
            $message = "Delete Success";
            echo '<meta http-equiv="refresh" content="2;url=view_cup.php">';
            echo "  <div class='alert alert-success'>
                        <strong>Success</strong>, this cup is deleted
                    </div>";
            echo "<p> Go home will start in <span id='ountdowntimer'>2 </span> Seconds <br><br>";
            echo "<a href='view_cup.php' class='btn btn-info'>Go to list cup</a>";
        }
    }

    public function deleteForever()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $cup = $this->cupDB->get($id);
            include 'delete_forever.php';
        } else {
            $id = $_POST['id'];
            $this->cupDB->deleteForever($id);
            $message = "Delete Success";
            //echo '<meta http-equiv="refresh" content="2;url=view_cup.php?page=backup_cup">';
            echo "  <div class='alert alert-success'>
                        <strong>Success</strong>, this cup is deleted forever
                    </div>";
            echo "<p> Go home will start in <span id='ountdowntimer'>2 </span> Seconds <br><br>";
            echo "<a href='view_cup.php' class='btn btn-info'>Go to list cup</a>";
        }
    }
}
?>
<script src="/public/js/countdown.js"></script>