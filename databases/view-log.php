<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel ="stylesheet" href="assets/css/bootstrap.css">
    <link rel ="stylesheet" href="style/app.css">
    <link rel ="stylesheet" href="style/login.css">
    <title>Messagerie|Connexion</title>
</head>
<body>
    <div class="login-block">
        <div class="app-name">
            <span>Messagerie</span>
        </div>
        <form action="login.php" method="POST">
            <div class="form-group row">
                <div class="col-md-5">
                    <label for="login" class="col-form-label">Identifiant</label>
                </div>
                <div class="col-md-6">
                    <input type="text" name="email" id="login" class="form-control" placeholder="Identifiant">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-5">
                    <label for="password" class="col-form-label">Mot de passe</label>
                </div>
                <div class="col-md-6">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Mot de passe">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12"><input type="submit" class="btn mb-2 submit" value="Se connecter"></div>
                <?php
                    if(isset($_GET["error"])){
                        //envoyé par login.php si il y'a pas de correspondance
                        echo '<div class="col-md-12 error">Nom d\'chta9tini 8altae</div>';
                    }
                ?>
            </div>
        </form>
    </div>
</body>
</html>