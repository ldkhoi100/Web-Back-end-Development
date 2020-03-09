<?php session_start();
include '../login/access.php';
error_reporting(0);
?>
<?php
require "../../model/core/DBConnection.php";
require "../../model/list_login/list.php";
require "../../model/list_login/listDB.php";
require "../../controller/list_login/listController.php";
?>

<?php

use Controller\ListloginController;
?>

<!-- header -->
<?php include '../partials/header.php' ?>

<!-- bootstrap -->
<?php include '../../public/bootstrap/bootstrap.php'; ?>
<!-- css view -->
<link rel="stylesheet" href="/public/css/view.css">

<?php if (boss()) : ?>

<div class="container">
    <div class="navbar navbar-default">
        <a class="navbar-brand" href="view_list.php">
            <h2>List Login Manager</h2>
        </a>
    </div>
    <?php
        $cup = new ListloginController();
        $page = isset($_REQUEST['page']) ? $_REQUEST['page'] : NULL;
        switch ($page) {
            case 'grant':
                $cup->grantaccess();
                break;
            case 'revoke':
                $cup->revokeaccess();
                break;
            case 'delete':
                $cup->delete();
                break;
            default:
                $cup->index();
                break;
        }
        ?>
</div>
<!-- footer -->
<?php include '../partials/footer.php' ?>

<!-- else, display notfound page -->
<?php else : ?>
<h1 style="color:red; text-align:center;">Not found</h1>
<?php endif; ?>