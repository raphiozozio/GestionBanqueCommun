<?php
/*
* @param:string
*/
function creationAgence (&$donnees,&$donneesCodeAgence) {
    $codeAgence = codeAgence($donneesCodeAgence);
    $nomAgence = readline("\nTapez le nom de l'agence : ");
    $adresseAgence = readline("\ntapez l'adresse de l'agence : ");
    stockageAgence($codeAgence,$nomAgence,$adresseAgence,$donnees);
}
function creationClient (&$donnees,&$donneesIdentifiant) {
    $email = readline("\nTapez email : ");
    $nom = readline("\nTapez le nom : ");
    $prenom = readline("\nTapez le prenom : ");
    $date = readline("\nTapez la date de naissance : ");
    $identifiantClient = calculIdentifiantClient($donneesIdentifiant);
    $decouvertAutorise = readline("\nVoulez vous un decouvert ? : ");
    $solde = readline("\nVotre solde est de : ");
    stockageClient($identifiantClient,$nom,$prenom,$date,$email,
    $solde,$decouvertAutorise,$donnees);
}   
function creationCompteBanquaire(&$donnees,$donneesAgence,$donneesClient,&$donneesNumCompte){
    echo "
    1- Créer un compte courant \n
    2- Créer un livret A\n
    3- Créer un plan epargne logement\n
    4- Retour
    \n";
    $choix = readline(' votre choix: ');

    switch($choix) {
        case '1' : 
            creationCompte ($donnees,"C",$donneesAgence,$donneesClient,$donneesNumCompte);
            break;
        case  '2' : 
            creationCompte ($donnees,"L",$donneesAgence,$donneesClient,$donneesNumCompte);
            break;
        case  '3' : 
            creationCompte ($donnees,"P",$donneesAgence,$donneesClient,$donneesNumCompte);
            break;
}
}
function creationCompte (&$donnees,$type,$donneesAgence,$donneesClient,$donneesNumCompte){
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
    $donnees[]=[$numeroCompte,$identifiantClient,$type,$codeAgence];
    stockageCompte($identifiantClient,$type,$codeAgence,$numeroCompte,$donnees);
}