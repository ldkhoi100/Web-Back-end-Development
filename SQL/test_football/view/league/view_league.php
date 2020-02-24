<!-- login required -->
<?php include '../login/access.php';
echo accessView();
?>
<?php
require "../../model/core/DBConnection.php";
require "../../model/league/league.php";
require "../../model/league/leagueDB.php";
require "../../controller/league/leagueController.php";

use Controller\LeagueController;

?>

<!-- header -->
<?php include '../partials/header.php' ?>

<!-- css view -->
<link rel="stylesheet" href="/public/css/view.css">

<div class="container">
    <div class="navbar navbar-default">
        <a class="navbar-brand" href="view_league.php">
            <h2>Home League Management</h2>
        </a>
    </div>
    <?php
    $league = new LeagueController();
    $page = isset($_REQUEST['page']) ? $_REQUEST['page'] : NULL;
    switch ($page) {
        case 'add':
            $league->add();
            break;
        case 'delete':
            $league->delete();
            break;
        case 'edit':
            $league->edit();
            break;
        case 'deleteForever':
            $league->deleteForever();
            break;
        case 'backup_league':
            $league->showBackup();
            break;
        case 'backupfile':
            $league->backupFile();
            break;
        default:
            $league->index();
            break;
    }
    ?>
</div>

<!-- footer -->
<?php include '../partials/footer.php' ?>