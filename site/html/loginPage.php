<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="assets/css/specialStyle.css">
</head>

<body>
<center>
    <div class="card" align="center">
        <img src="assets/img/logo.jpg" alt="Avatar" style="width:25%;">
        <div class="container">
            <form action="login.php" method="POST">
                <h1>Email</h1>
                <input type="text" name="email" placeholder="john.doe@gmail.com">
                <br/><br/>
                <h1>Password</h1>
                <input type="password" name="password" placeholder="*****">
                <br/><br/>
                <input type="submit" value="LogIn" style="margin:20px 20px">
        </div>

        <?php
        if (isset($_GET["error"]))
            echo '<div class="col-md-12 error">Wrong Login!</div>';

        ?>
        </form>
    </div>
    </div>
</center>
</body>
</html>