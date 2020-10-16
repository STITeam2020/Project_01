<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes.php';

if (!isset($_SESSION["user"]))
    header("location: loginPage.php");
$user = $_SESSION['user'];
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
                <div class="panel-heading" align="center">Change Password</div>
                <div class="panel-body">
                    <form action="editPassword.php" method="POST">
                        <div class="form-group row">
                            <div class="col-md-5">
                                <label for="password" class="col-form-label">New password</label>
                            </div>
                            <div class="col-md-6">
                                <input type="password" name="password" id="password" class="form-control"
                                       placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group row text-center">
                            <div class="col-md-12"><input type="submit" class="btn mb-2 submit" value="Change"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>