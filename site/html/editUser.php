<?php

use controller\User;

include_once $_SERVER['DOCUMENT_ROOT'] . '/includes.php';
if($_SESSION['user']-> admin == 0 ) {
    header("location: loginPage.php");
    exit;
}
$user = User::lookForUser($_POST["email"]);
$admin = 0;
$active = 0;
if (isset($_POST["admin"]))
    $admin = 1;
if (isset($_POST["active"]))
    $active = 1;

$user->modifyUser($_POST['password'], $admin, $active);

header("Location: confirmation.php");
exit;
