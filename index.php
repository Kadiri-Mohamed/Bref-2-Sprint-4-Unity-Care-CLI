<?php
require_once 'autoload.php';

$db = new Database();
$conn = $db->dbConnection();

// if(!$conn) {
//     echo "Database connection failed!\n";
// }

$departmentModel = new Department();
$patientModel = new Patient();
$medecinModel = new Medecin();

// $departments = $departmentModel->getAll();
// $recentPatients = array_slice($patientModel->getAll(), 0, 5);
// $recentMedecins = $medecinModel->getAll();

while (true) {
    Menu::showMainMenu();
    $choice = trim(fgets(STDIN));

    switch ($choice) {
        case '1':
            $patientChoice = '';
            while ($patientChoice !== '0') {
                Menu::showPatientMenu();
                $patientChoice = trim(fgets(STDIN));
                switch ($patientChoice) {
                    case '1':
                        echo "=== Ajouter un patient ===\n";
                        echo "Nom: ";
                        $nom = trim(fgets(STDIN));
                        echo "Prenom: ";
                        $prenom = trim(fgets(STDIN));
                        echo "Date de naissance (YYYY-MM-DD): ";
                        $dateNaissance = trim(fgets(STDIN));
                        echo "Telephone: ";
                        $telephone = trim(fgets(STDIN));
                        echo "Email: ";
                        $email = trim(fgets(STDIN));
                        echo "Adresse: ";
                        $adresse = trim(fgets(STDIN));
                        
                        $data = [
                            'nom' => $nom,
                            'prenom' => $prenom,
                            'date_naissance' => $dateNaissance,
                            'telephone' => $telephone,
                            'email' => $email,
                            'adresse' => $adresse
                        ];
                        
                        if($patientModel->create($data)) {
                            echo "Patient ajoute avec succes!\n";
                        } else {
                            echo "Erreur dans l'ajout du patient.\n";
                        }
                        break;
                        
                    case '2':
                        echo "=== Liste des patients ===\n";
                        $patients = $patientModel->getAll();
                        if(empty($patients)) {
                            echo "Aucun patient trouve.\n";
                        } else {
                            foreach($patients as $patient) {
                                echo "ID: " . $patient['id'] . "\n";
                                echo "Nom: " . $patient['nom'] . " " . $patient['prenom'] . "\n";
                                echo "Email: " . $patient['email'] . "\n";
                                echo "Telephone: " . $patient['telephone'] . "\n";
                                echo "Adresse: " . $patient['adresse'] . "\n";
                                echo "Date de naissance: " . $patient['date_naissance'] . "\n";
                                echo "Cree le: " . $patient['created_at'] . "\n";
                                echo "-------------------------\n";
                            }
                        }
                        break;
                        
                    case '3':
                        echo "=== Modifier un patient ===\n";
                        echo "ID du patient a modifier: ";
                        $id = trim(fgets(STDIN));
                        
                        $patient = $patientModel->getById($id);
                        if(!$patient) {
                            echo "Patient non trouve.\n";
                            break;
                        }
                        
                        echo "Nom [" . $patient['nom'] . "]: ";
                        $nom = trim(fgets(STDIN));
                        $nom = empty($nom) ? $patient['nom'] : $nom;
                        
                        echo "Prenom [" . $patient['prenom'] . "]: ";
                        $prenom = trim(fgets(STDIN));
                        $prenom = empty($prenom) ? $patient['prenom'] : $prenom;
                        
                        echo "Date de naissance [" . $patient['date_naissance'] . "]: ";
                        $dateNaissance = trim(fgets(STDIN));
                        $dateNaissance = empty($dateNaissance) ? $patient['date_naissance'] : $dateNaissance;
                        
                        echo "Telephone [" . $patient['telephone'] . "]: ";
                        $telephone = trim(fgets(STDIN));
                        $telephone = empty($telephone) ? $patient['telephone'] : $telephone;
                        
                        echo "Email [" . $patient['email'] . "]: ";
                        $email = trim(fgets(STDIN));
                        $email = empty($email) ? $patient['email'] : $email;
                        
                        echo "Adresse [" . $patient['adresse'] . "]: ";
                        $adresse = trim(fgets(STDIN));
                        $adresse = empty($adresse) ? $patient['adresse'] : $adresse;
                        
                        $data = [
                            'nom' => $nom,
                            'prenom' => $prenom,
                            'date_naissance' => $dateNaissance,
                            'telephone' => $telephone,
                            'email' => $email,
                            'adresse' => $adresse
                        ];
                        
                        if($patientModel->update($id, $data)) {
                            echo "Patient modifie avec succes!\n";
                        } else {
                            echo "Erreur lors de la modification du patient.\n";
                        }
                        break;
                        
                    case '4':
                        echo "=== Supprimer un patient ===\n";
                        echo "ID du patient a supprimer: ";
                        $id = trim(fgets(STDIN));
                        
                        echo "vous voulez supprimer ce patient? (oui/non): ";
                        $confirm = trim(fgets(STDIN));
                        
                        if(strtolower($confirm) === 'oui') {
                            if($patientModel->delete($id)) {
                                echo "Patient supprime avec succes!\n";
                            } else {
                                echo "Erreur lors de la suppression du patient.\n";
                            }
                        } else {
                            echo "Suppression annulee.\n";
                        }
                        break;
                        
                    case '0':
                        echo "Retour au menu principal...\n";
                        break;
                        
                    default:
                        echo "Option invalide. Veuillez reessayer.\n";
                }
            }
            break;

        case '2': // Medecin
            $medecinChoice = '';
            while ($medecinChoice !== '0') {
                Menu::showMedecinMenu();
                $medecinChoice = trim(fgets(STDIN));
                
                switch ($medecinChoice) {
                    case '1':
                        // Add medecin logic
                        break;
                    case '2':
                        // View medecins logic
                        break;
                    case '3':
                        // Update medecin logic
                        break;
                    case '4':
                        // Delete medecin logic
                        break;
                    case '0':
                        echo "Returning to main menu...\n";
                        break;
                    default:
                        echo "Invalid option. Please try again.\n";
                }
            }
            break;

        case '3': // Department
            $departmentChoice = '';
            while ($departmentChoice !== '0') {
                Menu::showDepartmentMenu();
                $departmentChoice = trim(fgets(STDIN));
                
                switch ($departmentChoice) {
                    case '1':
                        $departments = $departmentModel->getAll();
                        print_r($departments);
                        break;
                    case '2':
                        // Add department logic
                        break;
                    case '3':
                        // Update department logic
                        break;
                    case '4':
                        // Delete department logic
                        break;
                    case '0':
                        echo "Returning to main menu...\n";
                        break;
                    default:
                        echo "Invalid option. Please try again.\n";
                }
            }
            break;

        case '0':
            echo "Goodbye!\n";
            exit(0);

        default:
            echo "Invalid choice. Please select a valid option.\n";
    }
}