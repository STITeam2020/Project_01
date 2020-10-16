<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes.php';

use controller\User;

if (!isset($_SESSION["user"])) {
    header("location: loginPage.php");
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
                <div class="panel-heading" align="center">Sent Box</div>
                <div class="panel-body">
                    <table class="table">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">Topic</th>
                            <th scope="col">Receiver</th>
                            <th scope="col">Date</th>
                            <th scope="col">Status</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <?php
                        $allMessages = $_SESSION["user"]->sentMessages();
                        ?>
                        <tbody>
                        <tr>
                            <?php foreach ($allMessages
                            as $msg){ ?>
                        <tr>
                            <td><?= $msg->object; ?></td>
                            <td><?= User::lookForUser($msg->receiver_email)->email; ?></td>
                            <td><?= $msg->date ?></td>
                            <?php if ($msg->status == 1) { ?>
                                <td>Seen</td>
                            <?php } else { ?>
                                <td>Not Seen</td>
                            <?php } ?>
                            <td><a href="messageDetails.php?id=<?= $msg->id ?>">Show</a></td>
                        </tr>
                        <?php } ?>
                        <?php if (!$allMessages) { ?>
                            <tr>
                                <td colspan="7" class="text-center">Empty !</td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>