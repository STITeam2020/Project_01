<?php
use controller\User;
use controller\Message;
include_once $_SERVER['DOCUMENT_ROOT'].'/includes.php';
if (!isset($_SESSION["user"])) {
  header("location: loginPage.php");
}
$message = Message::lookForMessage($_GET['id']);
$message->seen();
$sender = User::lookForUser($message->sender_email);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel ="stylesheet" href="assets/bootstrap/bootstrap.css">
	<link rel ="stylesheet" href="assets/css/specialStyle.css">
    <title>Twink</title>
</head>
<body>
    <?php include("header.php") ?>
    <div class="container-fluid main">
        <div class="row h-100">
            <div class="col-md-9 content">
                <div class="panel panel-primary">
                    <div class="panel-heading">Details</div>
                    <div class="panel-body">
                        <form action="doDetails.php" method="POST">
                            <input type="hidden" name="id" value="<?=$message->id?>">
                            <div class="form-group row">
                                <div class="col-md-5">
                                    <label for="sender" class="col-form-label">Sender</label>
                                </div>
                                <div class="col-md-6">
                                   <input disabled type="text" value="<?= $sender->email?>" name="sender" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-5">
                                    <label for="topic" class="col-form-label">Topic</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" disabled value="<?=$message->object?>" name="topic" id="topic" class="form-control" placeholder="Topic">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-5">
                                    <label for="message" class="col-form-label">Content of the message</label>
                                </div>
                                <div class="col-md-6">
                                    <textarea name="message" disabled class="form-control" id="message" cols="30" rows="10"><?=$message->body?></textarea>
                                </div>
                            </div>
                            <div class="form-group row text-center">
                                <div class="col-md-6"><input type="submit" name="respond" class="btn mb-2 submit" value="Respond"></div>
                                <div class="col-md-6"><input type="submit" name="delete" class="btn mb-2 submit" value="Delete"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>