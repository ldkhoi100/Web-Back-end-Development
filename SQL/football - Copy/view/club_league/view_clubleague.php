<?php session_start();
include '../login/access.php';
error_reporting(0);
?>
<?php
include '../../model/db/connect.php';
require "../../model/core/DBConnection.php";
require "../../model/club_league/clubleague.php";
require "../../model/club_league/clubleagueDB.php";
require "../../controller/club_league/clubleagueController.php";

use Controller\ClubleagueController;
?>

<!-- header -->
<?php include '../partials/header.php' ?>

<!-- bootstrap -->
<?php include '../../public/bootstrap/bootstrap.php'; ?>
<!-- css view -->
<link rel="stylesheet" href="/public/css/view.css">

<div class="container">
    <div class="navbar navbar-default">
        <a class="navbar-brand" href="view_clubleague.php">
            <h2>Home Club-League Management</h2>
        </a>
    </div>
    <?php
    $clubleague = new ClubleagueController();
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