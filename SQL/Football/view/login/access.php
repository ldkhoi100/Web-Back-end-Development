<?php
function accessIndex()
{
    // Initialize the session
    session_start();

    // Check if the user is logged in, if not then redirect him to login page
    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
        header("location: view/login/login.php");
        exit;
    }
}

function accessView()
{
    // Initialize the session
    session_start();

    // Check if the user is logged in, if not then redirect him to login page
    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
        header("location: ../login/login.php");
        exit;
    }
}

function accessAdmin()
{
    // Initialize the session
    session_start();

    // Check if the user is logged in, if not then redirect him to login page
    if (!($_SESSION['username'] == 'admin' && $_SESSION['password'] = 123456)) {
        // Go home page
        header("location: ../../index.php");
        exit;
    }
}