<?php

use dataManager\Db;

include_once $_SERVER['DOCUMENT_ROOT'] . '/includes.php';

if (!isset($_SESSION["user"])) {
    header("location: loginPage.php");
}


$user = Db::seekUser($_GET['email']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="assets/css/specialStyles.css">

    <title>Twink</title>
</head>
<body>
<?php include("header.php") ?>
<div class="container-fluid main">
    <div class="row h-100">
        <div class="col-md-9 content">
            <div class="panel panel-primary">
                <div class="panel-heading">Edit User: <?php echo $user["email"]; ?> </div>
                <div class="panel-body">
                    <form action="editUser.php" method="POST">
                        <input type="hidden" name="email" value=<?php echo $user["email"]; ?>>
                        <div class="form-group row">
                            <div class="col-md-5">
                                <label for="login" class="col-form-label">Email</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" disabled name="email" value='<?php echo $user["email"]; ?>'
                                       id="login" class="form-control" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-5">
                                <label for="password" class="col-form-label">Password</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="password" value='<?php echo $user["password"]; ?>'
                                       id="password" class="form-control" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-5">
                                <label for="active" class="col-form-label">Active</label>
                            </div>
                            <div class="col-md-6">
                                <input type="checkbox" <?php if ($user["active"] == 1) echo 'checked'; ?> value="active"
                                       name="active" id="active" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-5">
                                <label for="admin" class="col-form-label">Admin</label>
                            </div>
                            <div class="col-md-6">
                                <input type="checkbox" <?php if ($user["admin"] == 1) echo 'checked'; ?> value="admin"
                                       name="admin" id="admin" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row text-center">
                            <div class="col-md-12"><input type="submit" class="btn mb-2 submit" value="Submit"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>