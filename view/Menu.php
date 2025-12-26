<?php

class Menu{

    public static function showMainMenu()
    {
        echo "\n";
        echo "\033[36m==============================\033[0m" . "\n";
        echo "\033[36m   UNITY CARE - CLI SYSTEM   \033[0m" . "\n";
        echo "\033[36m==============================\033[0m" . "\n";
        echo "1. Gestion des patients" . "\n";
        echo "2. Gestion des medecins" . "\n";
        echo "3. Gestion des departements" . "\n";
        echo "0. Quitter" . "\n";
        echo "------------------------------" . "\n";
        echo "\033[33mVotre choix : \033[0m";
    }
    
    public static function showMedecinMenu(){
        echo "\n";
        echo "\033[34m==============================\033[0m" . "\n";
        echo "\033[34m   UNITY CARE - CLI SYSTEM   \033[0m" . "\n";
        echo "\033[34m==============================\033[0m" . "\n";
        echo "1. Ajouter un medecin" . "\n";
        echo "2. Lister les medecins" . "\n";
        echo "3. Modifier un medecin" . "\n";
        echo "4. Supprimer un medecin" . "\n";
        echo "0. Retour" . "\n";
        echo "------------------------------" . "\n";
        echo "\033[33mVotre choix : \033[0m";
    }
    
    public static function showPatientMenu(){
        echo "\n";
        echo "\033[32m==============================\033[0m" . "\n";
        echo "\033[32m   UNITY CARE - CLI SYSTEM   \033[0m" . "\n";
        echo "\033[32m==============================\033[0m" . "\n";
        echo "1. Ajouter un patient" . "\n";
        echo "2. Lister les patients" . "\n";
        echo "3. Modifier un patient" . "\n";
        echo "4. Supprimer un patient" . "\n";
        echo "0. Retour" . "\n";
        echo "------------------------------" . "\n";
        echo "\033[33mVotre choix : \033[0m";
    }
    
    public static function showDepartmentMenu(){
        echo "\n";
        echo "\033[35m==============================\033[0m" . "\n";
        echo "\033[35m   UNITY CARE - CLI SYSTEM   \033[0m" . "\n";
        echo "\033[35m==============================\033[0m" . "\n";
        echo "1. Ajouter un departement" . "\n";
        echo "2. Lister les departements" . "\n";
        echo "3. Modifier un departement" . "\n";
        echo "4. Supprimer un departement" . "\n";
        echo "0. Retour" . "\n";
        echo "------------------------------" . "\n";
        echo "\033[33mVotre choix : \033[0m";
    }
}