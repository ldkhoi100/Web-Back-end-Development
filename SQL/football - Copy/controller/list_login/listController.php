<?php

namespace Controller;

use function Couchbase\defaultDecoder;
use Model\Listlogin;
use Model\ListloginDB;
use Model\DBConnection;

class ListloginController
{

    public $listloginDB;

    public function __construct()
    {
        $connection = new DBConnection("mysql:host=localhost;dbname=football;charset=utf8", "root", "");
        $this->listDB = new ListloginDB($connection->connect());
    }

    public function index()
    {
        $listlogins = $this->listDB->getAll();
        include 'list_login.php';
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $listlogin = $this->listDB->get($id);
            include 'delete_list.php';
        } else {
            $id = $_POST['id'];
            $this->listDB->delete($id);
            $message = "Delete Success";
            echo '<meta http-equiv="refresh" content="2;url=view_list.php">';
            echo "  <div class='alert alert-success'>
                        <strong>Success</strong>, this username is deleted forever
                    </div>";
            echo "<p> Go home will start in <span id='ountdowntimer'>2 </span> Seconds <br><br>";
            echo "<a href='view_list.php' class='btn btn-info'>Go to list Listlogin</a>";
        }
    }

    public function grantaccess()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $listlogin = $this->listDB->get($id);
            include 'grant_user.php';
        } else {
            $id = $_POST['id'];
            $this->listDB->grantaccess($id);
            $message = "Grant access Success";
            echo '<meta http-equiv="refresh" content="2;url=view_list.php">';
            echo "  <div class='alert alert-success'>
                        <strong>Success</strong>, this username is granted
                    </div>";
            echo "<p> Go home will start in <span id='ountdowntimer'>2 </span> Seconds <br><br>";
            echo "<a href='view_list.php' class='btn btn-info'>Go to list Listlogin</a>";
        }
    }

    public function revokeaccess()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $listlogin = $this->listDB->get($id);
            include 'revoke_user.php';
        } else {
            $id = $_POST['id'];
            $this->listDB->revokeaccess($id);
            $message = "Revoke access Success";
            echo '<meta http-equiv="refresh" content="2;url=view_list.php">';
            echo "  <div class='alert alert-success'>
                        <strong>Success</strong>, this username is revoked
                    </div>";
            echo "<p> Go home will start in <span id='ountdowntimer'>2 </span> Seconds <br><br>";
            echo "<a href='view_list.php' class='btn btn-info'>Go to list Listlogin</a>";
        }
    }
}
?>
<script src="/public/js/countdown.js"></script>