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
function stockageCompte($identifiantClient,$type,$codeAgence,$numeroCompte,&$donnees) {
    $donnees[]=[$numeroCompte,$identifiantClient,$type,$codeAgence];
    $header = ["numero de compte","identifiant de client ", "type de compte","code d'agence" ];
    $fp = fopen(FILE_COMPTE, 'w');
    fputcsv($fp, $header, DELIMITER, "\t");
    foreach ($donnees as $row) {
        fputcsv($fp, $row, DELIMITER, "\t");
    
    fclose($fp);
    }
}