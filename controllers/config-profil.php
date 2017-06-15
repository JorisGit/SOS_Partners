<?php

if(isset($_POST['confirm'])) {

    $tableau = array(
        'newmdp' => htmlspecialchars(hash(hash_algos()[7], $_POST['newmdp'])),
        'newmdp-confirm' => htmlspecialchars(hash(hash_algos()[7], $_POST['newmdp-confirm'])),
        'email' => htmlspecialchars($_POST['email']),
        'newemail' => htmlspecialchars($_POST['newemail']),
        'supprimer-compte' => htmlspecialchars($_POST['supprimer-compte']),
        'mdp-confirm' => htmlspecialchars(hash(hash_algos()[7], $_POST['mdp'])),
    );
    
    
}

?>