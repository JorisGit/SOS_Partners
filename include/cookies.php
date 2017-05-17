<?php
setcookie('email', $email, time() + 3600*24*7, null, null, false, true);
setcookie('mdp', $mdp, time() + 3600*24*7, null, null, false, true);
?>