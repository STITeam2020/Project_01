<?php
    use interfaces\GlobalPDO; 
    use interfaces\UserInterface;
    use interfaces\Utils;
    /**
     * Authentification
     */
    /*
    include_once $_SERVER['DOCUMENT_ROOT'].'/includes.php';
   // $result = DataBaseObject::findUser("User",$_POST["email"]);
    if($true){
        $user = $result[0];
        if($user['password'] == $_POST["password"] && $user['status'] == 1){//utilisateur actif uniquement
            if(true){
            $currentUser = new UserInterface($user[Utils::$_EMAIL],$user[Utils::$_FIRST_NAME],$user[Utils:: $_LAST_NAME],
                $user[Utils::$_STATUS],$user[Utils::$_ADMIN]);
            $_SESSION["user"]=$currentUser;//on ajoute l'utilisateur courant dans une variable de session
            header('Location: index.php');//redirection vers index
           // exit();
        }
    } 
    */
    header('Location: index.php');
  //  header('Location: login-view.php?error=1');//redirection vers la page de login en cas d'aucune correspondance
    exit();
