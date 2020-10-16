<?php

use dataManager\Db;
use controller\User;

include_once $_SERVER['DOCUMENT_ROOT'] . '/includes.php';
$user = Db::seekUser($_POST["email"]);

if ($user) {
    if ($user["password"] == $_POST["password"] && $user["active"] == 1) {
        $currentUser = new User($user["email"], $user["password"], $user["admin"], $user["active"]);
        $_SESSION["user"] = $currentUser;
        header('Location: index.php');
        exit();
    }
}
header('Location: loginPage.php?error=1');
exit();
