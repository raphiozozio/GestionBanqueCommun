<?php
require './service/service_banque.php';
require 'constante.php';
require './service/dao.php';
require './service/service_generateur.php';
$donnees=[] ;
if(!is_file($filename)){
    $handle = fopen(FILE_AGENCE, 'w');
    fclose($handle);
}
if(!is_file($filename)){
    $handle = fopen(FILE_CLIENT, 'w');
    fclose($handle);
}
$donneesAgence=[];
$donneesClient=[];
$donneesCompte=[];
$donneesCodeAgence=[];
$donneesIdentifiant=[];
$variable = true;
while($variable == true) {
    echo "
    1- Créer une agence \n
    2- Créer un client\n
    3- Créer un compte bancaire\n
    4- Recherche de compte (numéro de compte)\n
    5- Recherche de client (Nom, Numéro de compte, identifiant de client)\n
    6- Afficher la liste des comptes d’un client (identifiant client)\n
    7- Imprimer les infos client (identifiant client)\n
    8- Quitter le programme
    \n";
    $choix = readline(' votre choix: ');

    switch($choix) {
        case '1' : 
            creationAgence ($donneesAgence,$donneesCodeAgence);
            break;
        case '2' : 
            creationClient ($donneesClient,$donneesIdentifiant);
            break;
        case '3' :
            creationCompteBanquaire($donneesCompte,$donneesAgence,$donneesClient,$donneesIdentifiant);
            break;
        case '8' :
            $variable = false;
            break ;
    }

}