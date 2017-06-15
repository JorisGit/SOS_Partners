<?php

if(isset($_POST['confirm'])) {

    $tableau = array(
        'mdp' => htmlspecialchars(hash(hash_algos()[7], $_POST['mdp'])),
        'newmdp' => htmlspecialchars(hash(hash_algos()[7], $_POST['newmdp'])),
        'email' => htmlspecialchars($_POST['email']),
        'newemail' => htmlspecialchars($_POST['newemail']),
        'supprimer-compte' => htmlspecialchars($_POST['supprimer-compte']),
        'mdp-confirm' => htmlspecialchars(hash(hash_algos()[7], $_POST['mdp'])),
    );
    
}

?>