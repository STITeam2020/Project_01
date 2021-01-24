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

//reCAPTCHA validation
if (isset($_POST['g-recaptcha-response'])) {

    require('component/recaptcha/src/autoload.php');

    $recaptcha = new \ReCaptcha\ReCaptcha('6LezgDkaAAAAABS9_keWLhxtA-RIj6VH_yN4lvfI');

    $resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

    if (!$resp->isSuccess()) {
        $output = json_encode(array('type' => 'error', 'text' => '<b>Captcha</b> Validation Required!'));
        die($output);
    }
}



header('Location: loginPage.php?error=1');
exit();
