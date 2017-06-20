<?php

function strAttr($str) {

    $str = htmlentities($str, ENT_NOQUOTES, 'utf-8');
    $str = preg_replace('#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str);
    $str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str); // pour les ligatures e.g. '&oelig;'
    $str = preg_replace('#&[^;]+;#', '', $str); // supprime les autres caractères
    $str = strtolower(str_replace(' ', '-', $str));
    
    return $str;
}

$dbname = "sospartner";
$user   = "root";
$pass   = "";

try {
    $db = new PDO("mysql:host=localhost;dbname=$dbname;charset=utf8", $user, $pass);
} catch(PDOException $e) {
    die($e->getMessage());
}

$type = $_POST['typeSport'];

if(isset($type)) {

    $produits = array();

    if($type == 'Tout les types') {

        $req = $db->query('SELECT *, sport.id AS id_sport FROM sport ORDER BY intitule');

    } else {

    $req = $db->prepare('SELECT *, sport.id AS id_sport
    FROM sport 
    INNER JOIN type_sport ts ON sport.id_typeSport = ts.id 
    WHERE ts.type = :type
    ORDER BY sport.intitule');
    $req->execute(array('type' => $type));

    }


    while($data = $req->fetch()) {

        $produits[$data['id_sport']]['intitule'][] = ucfirst($data['intitule']);
        $produits[$data['id_sport']]['attribut'][] = strAttr($data['intitule']);
        $produits[$data['id_sport']]['type'][] = $data['type'];
        
    }

    echo json_encode($produits);

}

?>