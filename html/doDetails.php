<?php

use dataManager\Db;
use controller\Message;
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes.php';

$message = Message::lookForMessage($_POST['id']);
if (isset($_POST['delete'])) {
    Db::deleteMessage($message->id);
    header("Location: confirmation.php");
}
if (isset($_POST["respond"])) {
    header("Location: writeMessagePage.php?id=" . $message->id);
}
