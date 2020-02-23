<!-- login required -->
<?php include '../login/access.php';
echo accessView();
?>

<?php
require "../../model/core/DBConnection.php";
require "../../model/club/club.php";
require "../../model/club/clubDB.php";
require "../../controller/club/clubController.php";

use Controller\ClubController;

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manager Club</title>
    <!-- bootstrap link rel css -->
    <?php include '../../public/bootstrap/link_rel_bootstrap.php'; ?>
    <link rel="stylesheet" href="/public/css/view.css">

</head>

<!-- navbar -->
<?php include '../../public/php/navbar_home.php' ?>

<body>
    <div class="container">
        <div class="navbar navbar-default">
            <a class="navbar-brand" href="view_club.php">Home Club Management</a>
        </div>
        <?php
        $club = new ClubController();
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
            case 'backup_club':
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

</body>

<!-- bootstrap script -->
<?php include '../../public/bootstrap/script_bootstrap.php' ?>

</html>