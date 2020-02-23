<!-- login required -->
<?php include 'view/login/access.php';
error_reporting(0);

echo accessIndex();
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
    <link rel="stylesheet" href="/public/css/view.css">
    <?php include './public/bootstrap/link_rel_bootstrap.php' ?>

</head>
<!-- navbar -->
<?php include './public/php/navbar_home.php'; ?>

<body>

</body>

<!-- bootstrap script -->
<?php include './public/bootstrap/script_bootstrap.php' ?>

</html>