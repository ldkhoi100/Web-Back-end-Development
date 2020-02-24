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
    <title>Manager Club</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/css/view.css">

</head>

<!-- navbar -->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="/index.php">Logo</a>

    <!-- Links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="/index.php">Home</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/view/club/view_club.php">Club</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/view/league/view_league.php">League</a>
        </li>

        <!-- Dropdown -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                Account
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="/view/login/welcome.php">Detail</a>
                <a href="/view/login/reset-password.php" class="dropdown-item">Reset Password</a>
                <a href="/view/login/logout.php" class="dropdown-item">Sign Out</a>
            </div>
        </li>
    </ul>
</nav>

<body>

    <div class="container">
        <div class="navbar navbar-default">
            <a class="navbar-brand" href="view_league.php">Home League Management</a>
        </div>
        <?php
        $club = new LeagueController();
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
            default:
                $club->index();
                break;
        }
        ?>
    </div>


</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
</script>



</html>