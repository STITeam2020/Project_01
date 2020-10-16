<?php

use controller\User;
use controller\Message;

include_once $_SERVER['DOCUMENT_ROOT'] . '/includes.php';
if (!isset($_SESSION["user"])) {
    header("location: loginPage.php");
}

$message = null;
if (isset($_GET['id'])) {
    $message = Message::lookForMessage($_GET['id']);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="assets/css/specialStyle.css">
    <title>Twink</title>
</head>
<body>
<?php include("header.php") ?>
<div class="container-fluid main">
    <div class="row h-100">
        <div class="col-md-9 content">
            <div class="panel panel-primary">
                <div class="panel-heading" align="center">Send a message</div>
                <div class="panel-body">
                    <form action="write.php" method="POST">
                        <div class="form-group row">
                            <div class="col-md-5">
                                <label for="target" class="col-form-label">To :</label>
                            </div>
                            <div class="col-md-6">
                                <select name="target" <?php if ($message) echo "disabled" ?> class="form-control"
                                        id="target">
                                    <?php
                                    $users = User::directory();
                                    foreach ($users as $user) {
                                        if ($user->email != $_SESSION['user']->email) {
                                            if ($message) {
                                                if ($message->sender()->email == $user->email) {
                                                    echo "<option selected value=" . $user->email . ">" . $user->email . "</option>";
                                                    echo '<input name="target" type="hidden" value=' . $user->email . '>';
                                                }
                                            } else
                                                echo "<option value=" . $user->email . ">" . $user->email . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-5">
                                <label for="topic" class="col-form-label">Topic</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" <?php if (isset($_GET['id'])) echo " disabled value='" . $message->object . "'"; ?>
                                       name="topic" id="topic"
                                       class="form-control" placeholder="Topic">
                                <?php if ($message) echo '<input name="topic" type="hidden" value="' . $message->object . '">'; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-5">
                                <label for="message" class="col-form-label">Content of message</label>
                            </div>
                            <div class="col-md-6">
                                <textarea name="message" class="form-control" id="message" cols="30"
                                          rows="10"></textarea>
                            </div>
                        </div>
                        <div class="form-group row text-center">
                            <div class="col-md-12">
                                <input type="submit" class="btn mb-2 submit" value="Send">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>