<?php

function stockageAgence ($codeAgence,$nomAgence,$adresseAgence,&$donnees) {
    $donnees[]=[$codeAgence,$nomAgence,$adresseAgence];
    $header = ["CodeAgence", "nomAgence", "adresseAgence"];
    $fp = fopen(FILE_AGENCE, 'w');
    fputcsv($fp, $header, DELIMITER, "\t");
    foreach ($donnees as $row) {
        fputcsv($fp, $row, DELIMITER, "\t");
    }
    fclose($fp);
    print_r($donnees);
}
function stockageClient ($identifiantClient,$nom,$prenom,$date,$email,
$solde,$decouvertautorise,&$donnees) {
    $donnees[]=[$identifiantClient,$nom,$prenom,$date,$email,
    $solde,$decouvertautorise];
    $header = ["identifiantClient", "nom", "prénom","datedenaissance","email","solde","découvertautorisé"];
    $fp = fopen(FILE_CLIENT, 'w');
    fputcsv($fp, $header, DELIMITER, "\t");
    foreach ($donnees as $row) {
        fputcsv($fp, $row, DELIMITER, "\t");
    }
    fclose($fp);
    print_r($donnees);
}
function creationCompte ($donneesCompte,$type,$donneesAgence,$donneesClient,&$donneesNumCompte){
    $typeCompte = $type;
    $agence = 0;
    while ($agence == 0){
    $codeAgence = readline("inscrivez votre code d'agence a 3 chiffre : ");
    $agence = chercheAgence($codeAgence,$donneesAgence);
    }
    $numeroCompte = calculeNumCompte($donneesNumCompte);
    $client = 0;
    while ($client == 0){
        $identifiantClient = readline("indiquez votre identifiant client : ");
        $client = chercheClient($identifiantClient,$donneesClient);
    }

    
}
function chercheClient($identifiantClient,$donneesClient){
    $clientP = 0;
    foreach($donneesClient as $client){
        if($client[0] == $identifiantClient){
            $clientP=$client;
        }
    }
    return $clientP;
}

function chercheAgence($codeAgence,$donneesAgence){
    $agenceP = 0;
    foreach($donneesAgence as $agence){
        if ($agence[0] == $codeAgence) {
            $agenceP = $agence;
        }
    }
    return $agenceP;
}