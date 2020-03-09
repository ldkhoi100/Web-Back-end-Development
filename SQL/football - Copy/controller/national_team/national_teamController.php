<?php

namespace Controller;

use function Couchbase\defaultDecoder;
use Model\Nationalteam;
use Model\NationalteamDB;
use Model\DBConnection;

class NationalteamController
{

    public $national_teamDB;

    public function __construct()
    {
        $connection = new DBConnection("mysql:host=localhost;dbname=football;charset=utf8", "root", "");
        $this->national_teamDB = new NationalteamDB($connection->connect());
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            include 'add_national_team.php';
        } else {
            $id = $_POST['id_nation'];
            $name = $_POST['name_nation'];
            $continent = $_POST['continent'];
            $ranking = $_POST['ranking'];
            $coach_name = $_POST['coach_name'];
            $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));

            $array = $this->national_teamDB->isExistNationalTeamId($id);
            if ($array == true) {
                $national_team = new Nationalteam($id, $name, $continent, $ranking, $coach_name, $image);
                $this->national_teamDB->create($national_team);
                $error = 'fail';
            } else {
                $national_team = new Nationalteam($id, $name, $continent, $ranking, $coach_name, $image);
                $this->national_teamDB->create($national_team);
                $message = 'New national team created';
            }
            include 'add_national_team.php';
        }
    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $national_team = $this->national_teamDB->get($id);
            include 'edit_national_team.php';
        } else {
            $id = $_POST['id_nation'];
            $national_team = new Nationalteam($_POST['id_nation'], $_POST['name_nation'], $_POST['continent'], $_POST['ranking'], $_POST['coach_name'], addslashes(file_get_contents($_FILES['image']['tmp_name'])));
            $this->national_teamDB->update($id, $national_team);
            echo '<meta http-equiv="refresh" content="0;url=view_national_team.php">';
        }
    }

    public function index()
    {
        $national_teams = $this->national_teamDB->getAll();
        include 'list_national_team.php';
    }

    public function showBackup()
    {
        $national_teams = $this->national_teamDB->showFileDeleted();
        include 'backup_view_national_team.php';
    }

    public function backupFile()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $national_team = $this->national_teamDB->get($id);
            include 'backup_file_national_team.php';
        } else {
            $id = $_POST['id'];
            $this->national_teamDB->backUpFileDeleted($id);
            echo '<meta http-equiv="refresh" content="2;url=view_national_team.php?page=backup_national_team">';
            echo "  <div class='alert alert-success'>
                        <strong>Success</strong>, this national team is backuped
                    </div>";
            echo "<p> Go home will start in <span id='ountdowntimer'>2 </span> Seconds <br><br>";
            echo "<a href='view_national_team.php' class='btn btn-info'>Go to list national team</a>";
        }
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $national_team = $this->national_teamDB->get($id);
            include 'delete_national_team.php';
        } else {
            $id = $_POST['id'];
            $this->national_teamDB->delete($id);
            $message = "Delete Success";
            echo '<meta http-equiv="refresh" content="2;url=view_national_team.php">';
            echo "  <div class='alert alert-success'>
                        <strong>Success</strong>, this national team is deleted
                    </div>";
            echo "<p> Go home will start in <span id='ountdowntimer'>2 </span> Seconds <br><br>";
            echo "<a href='view_national_team.php' class='btn btn-info'>Go to list national_team</a>";
        }
    }

    public function deleteForever()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $national_team = $this->national_teamDB->get($id);
            include 'delete_forever.php';
        } else {
            $id = $_POST['id'];
            $this->national_teamDB->deleteForever($id);
            $message = "Delete Success";
            echo '<meta http-equiv="refresh" content="2;url=view_national_team.php?page=backup_national_team">';
            echo "  <div class='alert alert-success'>
                        <strong>Success</strong>, this national team is deleted forever!
                    </div>";
            echo "<p> Go home will start in <span id='ountdowntimer'>2 </span> Seconds <br><br>";
            echo "<a href='view_national_team.php' class='btn btn-info'>Go to list national team</a>";
        }
    }
}
?>
<script src="/public/js/countdown.js"></script>