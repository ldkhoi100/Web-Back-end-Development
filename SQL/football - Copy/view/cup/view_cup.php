<?php session_start();
include '../login/access.php';
error_reporting(0);
?>
<?php
require "../../model/core/DBConnection.php";
require "../../model/cup/cup.php";
require "../../model/cup/cupDB.php";
require "../../controller/cup/cupController.php";

use Controller\CupController;
?>

<!-- header -->
<?php include '../partials/header.php' ?>

<!-- bootstrap -->
<?php include '../../public/bootstrap/bootstrap.php'; ?>
<!-- css view -->
<link rel="stylesheet" href="/public/css/view.css">

<div class="container">
    <div class="navbar navbar-default">
        <a class="navbar-brand" href="view_cup.php">
            <h2>Home Cup Management</h2>
        </a>
    </div>
    <?php
    $cup = new CupController();
    $page = isset($_REQUEST['page']) ? $_REQUEST['page'] : NULL;
    switch ($page) {
        case 'add':
            $cup->add();
            break;
        case 'delete':
            $cup->delete();
            break;
        case 'edit':
            $cup->edit();
            break;
        case 'deleteForever':
            $cup->deleteForever();
            break;
        case 'backup_cup':
            $cup->showBackup();
            break;
        case 'backupfile':
            $cup->backupFile();
            break;
        default:
            $cup->index();
            break;
    }
    ?>
</div>
<!-- footer -->
<?php include '../partials/footer.php' ?>