<?php session_start();
include '../login/access.php';
error_reporting(0);
?>
<?php
include '../../model/db/connect.php';
require "../../model/core/DBConnection.php";
require "../../model/player_position/playerposition.php";
require "../../model/player_position/playerpositionDB.php";
require "../../controller/player_position/playerpositionController.php";

use Controller\PlayerpositionController;
?>

<!-- header -->
<?php include '../partials/header.php' ?>

<!-- bootstrap -->
<?php include '../../public/bootstrap/bootstrap.php'; ?>
<!-- css view -->
<link rel="stylesheet" href="/public/css/view.css">

<div class="container">
    <div class="navbar navbar-default">
        <a class="navbar-brand" href="view_playerposition.php">
            <h2>Home Player-Position Management</h2>
        </a>
    </div>
    <?php
    $clubleague = new PlayerpositionController();
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