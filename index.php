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
                            echo "Erreur dans la modification du patient.\n";
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
                                echo "Erreur dans la suppression du patient.\n";
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

        case '2':
            $medecinChoice = '';
            while ($medecinChoice !== '0') {
                Menu::showMedecinMenu();
                $medecinChoice = trim(fgets(STDIN));
                
                switch ($medecinChoice) {
                    case '1':
                        echo "=== Ajouter un medecin ===\n";
                        echo "Nom: ";
                        $nom = trim(fgets(STDIN));
                        echo "Prenom: ";
                        $prenom = trim(fgets(STDIN));
                        echo "Specialite: ";
                        $specialite = trim(fgets(STDIN));
                        echo "ID du departement: ";
                        $department_id = trim(fgets(STDIN));
                        echo "Email: ";
                        $email = trim(fgets(STDIN));
                        echo "Telephone: ";
                        $telephone = trim(fgets(STDIN));
                        
                        $data = [
                            'nom' => $nom,
                            'prenom' => $prenom,
                            'specialite' => $specialite,
                            'department_id' => $department_id,
                            'email' => $email,
                            'telephone' => $telephone
                        ];
                        
                        if($medecinModel->create($data)) {
                            echo "Medecin ajoute avec succes!\n";
                        } else {
                            echo "Erreur dans l'ajout du medecin.\n";
                        }
                        break;
                        
                    case '2':
                        echo "=== Liste des medecins ===\n";
                        $medecins = $medecinModel->getAll();
                        if(empty($medecins)) {
                            echo "Aucun medecin trouve.\n";
                        } else {
                            foreach($medecins as $medecin) {
                                echo "ID: " . $medecin['id'] . "\n";
                                echo "Nom: " . $medecin['nom'] . " " . $medecin['prenom'] . "\n";
                                echo "Specialite: " . $medecin['specialite'] . "\n";
                                echo "Departement: " . $medecin['department_nom'] . "\n";
                                echo "Email: " . $medecin['email'] . "\n";
                                echo "Telephone: " . $medecin['telephone'] . "\n";
                                echo "Cree le: " . $medecin['created_at'] . "\n";
                                echo "-------------------------\n";
                            }
                        }
                        break;
                        
                    case '3':
                        echo "=== Modifier un medecin ===\n";
                        echo "ID du medecin a modifier: ";
                        $id = trim(fgets(STDIN));
                        
                        $medecin = $medecinModel->getById($id);
                        if(!$medecin) {
                            echo "Medecin non trouve.\n";
                            break;
                        }
                        
                        echo "Nom [" . $medecin['nom'] . "]: ";
                        $nom = trim(fgets(STDIN));
                        $nom = empty($nom) ? $medecin['nom'] : $nom;
                        
                        echo "Prenom [" . $medecin['prenom'] . "]: ";
                        $prenom = trim(fgets(STDIN));
                        $prenom = empty($prenom) ? $medecin['prenom'] : $prenom;
                        
                        echo "Specialite [" . $medecin['specialite'] . "]: ";
                        $specialite = trim(fgets(STDIN));
                        $specialite = empty($specialite) ? $medecin['specialite'] : $specialite;
                        
                        echo "ID du departement [" . $medecin['department_id'] . "]: ";
                        $department_id = trim(fgets(STDIN));
                        $department_id = empty($department_id) ? $medecin['department_id'] : $department_id;
                        
                        echo "Email [" . $medecin['email'] . "]: ";
                        $email = trim(fgets(STDIN));
                        $email = empty($email) ? $medecin['email'] : $email;
                        
                        echo "Telephone [" . $medecin['telephone'] . "]: ";
                        $telephone = trim(fgets(STDIN));
                        $telephone = empty($telephone) ? $medecin['telephone'] : $telephone;
                        
                        $data = [
                            'nom' => $nom,
                            'prenom' => $prenom,
                            'specialite' => $specialite,
                            'department_id' => $department_id,
                            'email' => $email,
                            'telephone' => $telephone
                        ];
                        
                        if($medecinModel->update($id, $data)) {
                            echo "Medecin modifie avec succes!\n";
                        } else {
                            echo "Erreur dans la modification du medecin.\n";
                        }
                        break;
                        
                    case '4':
                        echo "=== Supprimer un medecin ===\n";
                        echo "ID du medecin a supprimer: ";
                        $id = trim(fgets(STDIN));
                        
                        echo "vous voulez supprimer ce medecin? (oui/non): ";
                        $confirm = trim(fgets(STDIN));
                        
                        if(strtolower($confirm) === 'oui') {
                            if($medecinModel->delete($id)) {
                                echo "Medecin supprime avec succes!\n";
                            } else {
                                echo "Erreur dans la suppression du medecin.\n";
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

        case '3':
            $departmentChoice = '';
            while ($departmentChoice !== '0') {
                Menu::showDepartmentMenu();
                $departmentChoice = trim(fgets(STDIN));
                
                switch ($departmentChoice) {
                    case '1':
                        echo "=== Ajouter un departement ===\n";
                        echo "Nom: ";
                        $nom = trim(fgets(STDIN));
                        echo "Description: ";
                        $description = trim(fgets(STDIN));
                        
                        $data = [
                            'nom' => $nom,
                            'description' => $description
                        ];
                        
                        if($departmentModel->create($data)) {
                            echo "Departement ajoute avec succes!\n";
                        } else {
                            echo "Erreur dans l'ajout du departement.\n";
                        }
                        break;
                        
                    case '2':
                        echo "=== Liste des departements ===\n";
                        $departments = $departmentModel->getAll();
                        if(empty($departments)) {
                            echo "Aucun departement trouve.\n";
                        } else {
                            foreach($departments as $department) {
                                echo "ID: " . $department['id'] . "\n";
                                echo "Nom: " . $department['nom'] . "\n";
                                echo "Description: " . $department['description'] . "\n";
                                echo "Cree le: " . $department['created_at'] . "\n";
                                echo "-------------------------\n";
                            }
                        }
                        break;
                        
                    case '3':
                        echo "=== Modifier un departement ===\n";
                        echo "ID du departement a modifier: ";
                        $id = trim(fgets(STDIN));
                        
                        $department = $departmentModel->getById($id);
                        if(!$department) {
                            echo "Departement non trouve.\n";
                            break;
                        }
                        
                        echo "Nom [" . $department['nom'] . "]: ";
                        $nom = trim(fgets(STDIN));
                        $nom = empty($nom) ? $department['nom'] : $nom;
                        
                        echo "Description [" . $department['description'] . "]: ";
                        $description = trim(fgets(STDIN));
                        $description = empty($description) ? $department['description'] : $description;
                        
                        $data = [
                            'nom' => $nom,
                            'description' => $description
                        ];
                        
                        if($departmentModel->update($id, $data)) {
                            echo "Departement modifie avec succes!\n";
                        } else {
                            echo "Erreur dans la modification du departement.\n";
                        }
                        break;
                        
                    case '4':
                        echo "=== Supprimer un departement ===\n";
                        echo "ID du departement a supprimer: ";
                        $id = trim(fgets(STDIN));
                        
                        echo "vous voulez supprimer ce departement? (oui/non): ";
                        $confirm = trim(fgets(STDIN));
                        
                        if(strtolower($confirm) === 'oui') {
                            if($departmentModel->delete($id)) {
                                echo "Departement supprime avec succes!\n";
                            } else {
                                echo "Erreur dans la suppression du departement.\n";
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

        case '0':
            echo "Goodbye!\n";
            exit(0);

        default:
            echo "Invalid choice. Please select a valid option.\n";
    }
}