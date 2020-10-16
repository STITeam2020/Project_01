<?php

use dataManager\Db;

include_once $_SERVER['DOCUMENT_ROOT'] . '/includes.php';
if (!isset($_SESSION["user"])) {
    header("location: loginPage.php");
}
$dest = Db::seekUser($_POST["target"]);
Db::addMessage($_SESSION["user"]->email, $dest["email"], $_POST["message"], $_POST["topic"]);
header("location: confirmation.php");
