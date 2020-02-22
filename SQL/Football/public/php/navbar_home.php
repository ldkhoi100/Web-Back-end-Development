<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
        <img src="https://www.geeksforgeeks.org/wp-content/uploads/gfg_transparent_white_small.png" alt="logo"
            style="width:40px;">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/view/club/view_club.php">Club</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/view/league/view_league.php">League</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Dropdown
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
        </ul>

    </div>
    <div class="nav-item">
        <ul class="navbar-nav mr-auto" style="margin-right: 150px">
            <li class="nav-item dropdown" style="margin-right: 10px">
                <a class=" nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    <?php echo htmlspecialchars($_SESSION["username"]); ?>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/view/login/welcome.php">Detail</a>
                    <a href="/view/login/reset-password.php" class="dropdown-item">Reset Password</a>
                    <div class="dropdown-divider"></div>
                    <a href="/view/login/logout.php" class="dropdown-item">Sign Out</a>
                </div>
            </li>
            <li>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </li>
        </ul>
    </div>
</nav>