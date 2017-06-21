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

$dataReceive = $_POST['dataReceive'];

if(isset($dataReceive)) {

    $mois = 'janvier février mars avril mai juin juillet août septembre octobre novembre décembre';
    $mois2 = explode(' ', $mois);

    $annonces = array();

    $typeData = explode('|', $dataReceive);

    foreach($typeData as $key => $valueData) {
        $valueData2 = explode('->', $valueData);
        $arrayData[$valueData2[0]] = $valueData2[1];
    }
    $arrayDateAnnonces = explode(' ', $arrayData['date-annonces']);
    $arrayDateEvenement = explode(' ', $arrayData['date-evenement']);

    foreach($mois2 as $key => $moisString) {
        if($key < 9)
            $moisNumber[$key+1] = '0'.strval($key+1);
        else
            $moisNumber[$key+1] = strval($key+1);

        if($arrayDateAnnonces[2] == $moisString)
            $moisDateAnnonces = $moisNumber[$key+1];
        if($arrayDateAnnonces[6] == $moisString)
            $moisDateAnnonces2 = $moisNumber[$key+1];
        if($arrayDateEvenement[2] == $moisString)
            $moisDateEvenement = $moisNumber[$key+1];
        if($arrayDateEvenement[6] == $moisString)
            $moisDateEvenement2 = $moisNumber[$key+1];
    }
    
    if(intval($arrayDateAnnonces[1]) < 10)
        $arrayDateAnnonces[1] = '0'.$arrayDateAnnonces[1];
    if(intval($arrayDateAnnonces[5]) < 10)
        $arrayDateAnnonces[5] = '0'.$arrayDateAnnonces[1];
    if(intval($arrayDateEvenement[1]) < 10)
        $arrayDateEvenement[1] = '0'.$arrayDateEvenement[1];
    if(intval($arrayDateEvenement[5]) < 10)
        $arrayDateEvenement[5] = '0'.$arrayDateEvenement[1];

    $dateAnnonces = $arrayDateAnnonces[3].'-'.$moisDateAnnonces.'-'.$arrayDateAnnonces[1];
    $dateAnnonces2 = $arrayDateAnnonces[7].'-'.$moisDateAnnonces2.'-'.$arrayDateAnnonces[5];
    $dateEvenement = $arrayDateEvenement[3].'-'.$moisDateEvenement.'-'.$arrayDateEvenement[1];
    $dateEvenement2 = $arrayDateEvenement[7].'-'.$moisDateEvenement2.'-'.$arrayDateEvenement[5];
    $sport = $arrayData['sport'];
    $codePostal = $arrayData['code-postal'];

    $dateFormat = ", DATE_FORMAT(datePublication, '%d/%M/%Y') AS datePubli, DATE_FORMAT(dateEvenement, '%d/%M/%Y') AS dateEvent";

    if($sport == 'Tout les sports') {
        $sql = "SELECT * ".$dateFormat." FROM annonce WHERE ";
    } else if($sport == 'Tout les sports individuels' || $sport == 'Tout les sports collectifs' || $sport == 'Tout les sports libres') {
        $sql = 'SELECT *'.$dateFormat.' FROM annonce
        INNER JOIN sport s ON annonce.id_sport = s.id
        INNER JOIN type_sport ts ON s.id_typeSport = ts.id
        WHERE id_typeSport = ';

        $explodeSport = explode(' ', $sport);
        $typeSport = $explodeSport[3];
        switch ($typeSport) {
            case 'individuels':
                $sql .= '1 ';
            break;
            case 'collectifs':
                $sql .= '2 ';
            break;
            case 'libres':
                $sql .= '3 ';
            break;
        }
    } else {
        $sql = 'SELECT *'.$dateFormat.' FROM annonce
        INNER JOIN sport s ON annonce.id_sport = s.id
        WHERE s.intitule = \''.$sport.'\' ';
    }

    if($sport != 'Tout les sports' || $codePostal != 'empty') {
        $sql .= 'AND ';
        if($codePostal != 'empty') {
            $sql .= ' codePostal = \''.$codePostal.'\' AND ';
        }
    }

    $sql.= 'datePublication BETWEEN \''.$dateAnnonces.'\' AND '.$dateAnnonces2.' AND dateEvenement BETWEEN \''.$dateEvenement.'\' AND \''.$dateEvenement2.'\'';
    

    $req = $db->query($sql);

    $key = 0;

    while($data = $req->fetch()) {
        $annonces[$key]['titre'] = $data['titre'];
        $annonces[$key]['description'] = $data['description'];
        $annonces[$key]['codePostal'] = $data['codePostal'];
        $annonces[$key]['dateP'] = $data['datePubli'];
        $annonces[$key]['dateE'] = $data['dateEvent'];
        $annonces[$key]['nbParticipant'] = $data['nbParticipant'];
        $annonces[$key]['id_sport'] = $data['id_sport'];

        $key++;
    }

    echo json_encode($annonces);

}

?>