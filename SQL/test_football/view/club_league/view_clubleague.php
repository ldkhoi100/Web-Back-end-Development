<!-- login required -->
<?php include '../login/access.php';
echo accessView();
?>
<?php
require "../../model/core/DBConnection.php";
require "../../model/club_league/clubleague.php";
require "../../model/club_league/clubleagueDB.php";
require "../../controller/club_league/clubleagueController.php";

use Controller\ClubleagueController;

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manager Club-League</title>

    <!-- bootstrap link rel css -->
    <?php include '../../public/bootstrap/link_rel_bootstrap.php'; ?>
    <link rel="stylesheet" href="/public/css/view.css">
</head>

<!-- navbar -->
<?php include '../../public/php/navbar_home.php' ?>

<body>

    <div class="container">
        <div class="navbar navbar-default">
            <a class="navbar-brand" href="view_clubleague.php">Home Club-League Management</a>
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

</body>

<!-- bootstrap script -->
<?php include '../../public/bootstrap/script_bootstrap.php' ?>

</html>