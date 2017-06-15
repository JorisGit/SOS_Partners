<?php

setcookie('pseudo', $_SESSION['pseudo'], time() -3600, null, null, false, true);
setcookie('avatar', $_SESSION['avatar'], time() -3600, null, null, false, true);
setcookie('email', $_SESSION['email'], time() -3600, null, null, false, true);
setcookie('mdp', $_SESSION['mdp'], time() -3600, null, null, false, true);

if($_SESSION['deconnexion'] == true) {
    session_destroy();
    header('Location:'.$link['accueil']);
} else {
    session_destroy();
    header('Location:'.$_SERVER["HTTP_REFERER"]);
}

?>