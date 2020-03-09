<?php session_start();
include '../login/access.php';
error_reporting(0);
?>

<?php
require "../../model/core/DBConnection.php";
require "../../model/player/player.php";
require "../../model/player/playerDB.php";
require "../../controller/player/playerController.php";

use Controller\PlayerController;
?>

<!-- header -->
<?php include '../partials/header.php' ?>

<!-- bootstrap -->
<?php include '../../public/bootstrap/bootstrap.php'; ?>
<!-- css view -->
<link rel="stylesheet" href="/public/css/view.css">

<div class="container">
    <div class="navbar navbar-default">
        <a class="navbar-brand" href="view_player.php">
            <h2>Home Player Management</h2>
        </a>
    </div>
    <?php
    $club = new PlayerController();
    $page = isset($_REQUEST['page']) ? $_REQUEST['page'] : NULL;
    switch ($page) {
        case 'add':
            $club->add();
            break;
        case 'delete':
            $club->delete();
            break;
        case 'edit':
            $club->edit();
            break;
        case 'deleteForever':
            $club->deleteForever();
            break;
        case 'backup_player':
            $club->showBackup();
            break;
        case 'backupfile':
            $club->backupFile();
            break;
        default:
            $club->index();
            break;
    }
    ?>
</div>
<!-- footer -->
<?php include '../partials/footer.php' ?>