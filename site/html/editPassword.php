<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes.php';
$user = $_SESSION['user'];


$user->update($_POST['password'], $user->admin, $user->active);
header("Location: confirmation.php");