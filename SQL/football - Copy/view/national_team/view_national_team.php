<?php session_start();
include '../login/access.php';
error_reporting(0);
?>

<?php
require "../../model/core/DBConnection.php";
require "../../model/national_team/national_team.php";
require "../../model/national_team/national_teamDB.php";
require "../../controller/national_team/national_teamController.php";

use Controller\NationalteamController;
?>

<!-- header -->
<?php include '../partials/header.php' ?>

<!-- bootstrap -->
<?php include '../../public/bootstrap/bootstrap.php'; ?>
<!-- css view -->
<link rel="stylesheet" href="/public/css/view.css">

<div class="container">
    <div class="navbar navbar-default">
        <a class="navbar-brand" href="view_national_team.php">
            <h2>Home National Team Management</h2>
        </a>
    </div>
    <?php
    $club = new NationalteamController();
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
        case 'backup_national_team':
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