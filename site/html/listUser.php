<?php

use dataManager\Db;

include_once $_SERVER['DOCUMENT_ROOT'] . '/includes.php';
if (!isset($_SESSION["user"])) {
    header("location: loginPage.php");
}
if($_SESSION['user']-> admin == 0 ) {
    header("location: loginPage.php");
    exit;
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
                <div class="panel-heading" align="center">Users list</div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        $allUsers = \controller\User::directory();
                        foreach ($allUsers as $user) {
                            $str = "<tr>
                                        <td>" . $user->email . "</td>
                                        <td>" . $user->password . "</td>";
                            if ($user->admin == 1) {
                                $str .= "<td>Admin</td>";
                            } else {
                                $str .= "<td>Collaborator</td>";
                            }
                            if ($user->active == 1) {
                                $str .= "<td>Active</td>";
                            } else {
                                $str .= "<td>Disabled</td>";
                            }
                            $currentUser = ($_SESSION['user']->email == $user->email) ? "disabled=true" : "";
                            $str .= "<td><a href=\"editUserPage.php?email=" . $user->email .
                                "\"><button class='modify'>Edit</button></a>
                                        <a href=\"deleteUser.php?email=" . $user->email .
                                "\"><button " . $currentUser . " class='delete'>Delete</button></a></td>";
                            echo $str;
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>