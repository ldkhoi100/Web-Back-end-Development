<?php session_start();
include '../login/access.php';
error_reporting(0);
?>
<?php
include '../../model/db/connect.php';
require "../../model/core/DBConnection.php";
require "../../model/national_cup/nationalcup.php";
require "../../model/national_cup/nationalcupDB.php";
require "../../controller/national_cup/nationalcupController.php";

use Controller\NationalcupController;
?>

<!-- header -->
<?php include '../partials/header.php' ?>

<!-- bootstrap -->
<?php include '../../public/bootstrap/bootstrap.php'; ?>
<!-- css view -->
<link rel="stylesheet" href="/public/css/view.css">

<div class="container">
    <div class="navbar navbar-default">
        <a class="navbar-brand" href="view_nationalcup.php">
            <h2>Home National-Cup Management</h2>
        </a>
    </div>
    <?php
    $clubleague = new NationalcupController();
    $page = isset($_REQUEST['page']) ? $_REQUEST['page'] : NULL;
    switch ($page) {
        case 'add':
            $clubleague->add();
            break;
        case 'delete':
            $clubleague->delete();
            break;
        case 'edit':
            $clubleague->edit();
            break;
        default:
            $clubleague->index();
            break;
    }
    ?>
</div>
<!-- footer -->
<?php include '../partials/footer.php' ?>