<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <img src="./assets/img/logo.png" height="45px" class="navbar-brand"/>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <b><a class="nav-link" href="index.php">TWINK</a></b>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="writeMessagePage.php">New message</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php">Mail Box</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="sentBox.php">Sent messages</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="editPasswordPage.php">Change password</a>
            </li>
            <li class="nav-item">
                <span <?php if ($_SESSION['user']->admin == 0) echo "style ='display:none;'"; ?>>
                    <a class="nav-link"
                       href="listUser.php">Users List</a></span>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="addingUserPage.php">Add user</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Log out</a>
            </li>
        </ul>
        <div class="form-inline my-2 my-lg-0">
            <span>User: <?php echo $_SESSION["user"]->email ?></span>
        </div>
    </div>
</nav>