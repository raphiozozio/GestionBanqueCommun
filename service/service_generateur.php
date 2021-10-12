<?php

function codeAgence(&$donneesCodeAgence){
    $cpt=1;
    $numero_aleatoire = rand(100,999);
    while($cpt!=0){
        $cpt=0;
        foreach($donneesCodeAgence as $valeur2){
            if ($numero_aleatoire == $valeur2){
                $numero_aleatoire = rand(100,999);
                $cpt=1;
            }
        }
        if($cpt==0){
            $donneesCodeAgence[]=$numero_aleatoire;
        }
    }
    return $numero_aleatoire;
}

function calculeNumCompte(&$donneesCompte){
    $cpt=1;
    $numero_aleatoire = rand(10000000000,99999999999);
    while($cpt!=0){
        $cpt=0;
        foreach($donneesCompte as $valeur2){
            if ($numero_aleatoire == $valeur2){
                $numero_aleatoire = rand(10000000000,99999999999);
                $cpt=1;
            }
        }
        if($cpt==0){
            $donneesCompte[]=$numero_aleatoire;
        }
    }
    return $numero_aleatoire;
    
}
function calculIdentifiantClient(&$donnees){
    $cpt=1;
    $code_aleatoire = rand(100000,999999);
    $fr = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"),0,2);
    $vrai_code = $fr.$code_aleatoire;
    while($cpt!=0){
        $cpt=0;
        foreach($donnees as $valeur){
            if ($vrai_code == $valeur){
                $code_aleatoire = rand(100000,999999);
                $fr = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"),0,2);
                $vrai_code = $fr.$code_aleatoire;
                $cpt=1;
            }
        }
        if($cpt==0){
            $donnees[]=$vrai_code;
            return $vrai_code;
        }
    }
}