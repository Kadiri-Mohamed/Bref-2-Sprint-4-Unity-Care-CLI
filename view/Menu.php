<?php

class Menu{

    public static function showMainMenu()
    {
        echo "\n";
        echo "==============================" . "\n";
        echo "   UNITY CARE - CLI SYSTEM   " . "\n";
        echo "==============================" . "\n";
        echo "1. Gestion des patients" . "\n";
        echo "2. Gestion des medecins" . "\n";
        echo "3. Gestion des departements" . "\n";
        echo "0. Quitter" . "\n";
        echo "------------------------------" . "\n";
        echo "Votre choix : ";
    }
    
    public static function showMedecinMenu(){
        echo "\n";
        echo "==============================" . "\n";
        echo "   UNITY CARE - CLI SYSTEM   " . "\n";
        echo "==============================" . "\n";
        echo "1. Ajouter un medecin" . "\n";
        echo "2. Lister les medecins" . "\n";
        echo "3. Modifier un medecin" . "\n";
        echo "4. Supprimer un medecin" . "\n";
        echo "0. Retour" . "\n";
        echo "------------------------------" . "\n";
        echo "Votre choix : ";
    }
    public static function showPatientMenu(){
        echo "\n";
        echo "==============================" . "\n";
        echo "   UNITY CARE - CLI SYSTEM   " . "\n";
        echo "==============================" . "\n";
        echo "1. Ajouter un patient" . "\n";
        echo "2. Lister les patients" . "\n";
        echo "3. Modifier un patient" . "\n";
        echo "4. Supprimer un patient" . "\n";
        echo "0. Retour" . "\n";
        echo "------------------------------" . "\n";
        echo "Votre choix : ";
    }
    public static function showDepartmentMenu(){
        echo "\n";
        echo "==============================" . "\n";
        echo "   UNITY CARE - CLI SYSTEM   " . "\n";
        echo "==============================" . "\n";
        echo "1. Ajouter un departement" . "\n";
        echo "2. Lister les departements" . "\n";
        echo "3. Modifier un departement" . "\n";
        echo "4. Supprimer un departement" . "\n";
        echo "0. Retour" . "\n";
        echo "------------------------------" . "\n";
        echo "Votre choix : ";
    }
}
    