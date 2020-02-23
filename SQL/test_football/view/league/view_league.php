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
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manager league</title>
    <!-- bootstrap link rel css -->
    <?php include '../../public/bootstrap/link_rel_bootstrap.php'; ?>
    <link rel="stylesheet" href="/public/css/view.css">
</head>

<!-- navbar -->
<?php include '../../public/php/navbar_home.php' ?>

<body>

    <div class="container">
        <div class="navbar navbar-default">
            <a class="navbar-brand" href="view_league.php">Home League Management</a>
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

</body>

<!-- bootstrap script -->
<?php include '../../public/bootstrap/script_bootstrap.php' ?>

</html>