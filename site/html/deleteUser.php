<?php

use dataManager\Db;
use controller\User;
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes.php';
if($_SESSION['user']-> admin == 0 ) {
    header("location: loginPage.php");
    exit;
}
$user = User::lookForUser($_GET["email"]);
Db::deleteUser($user->email);
header("Location: confirmation.php");

exit;