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
        case '1': // Patient
            $patientChoice = '';
            while ($patientChoice !== '0') {
                Menu::showPatientMenu();
                $patientChoice = trim(fgets(STDIN));
                
                switch ($patientChoice) {
                    case '1':
                        // Add patient logic
                        break;
                    case '2':
                        // View patients logic
                        break;
                    case '3':
                        // Update patient logic
                        break;
                    case '4':
                        // Delete patient logic
                        break;
                    case '0':
                        echo "Returning to main menu...\n";
                        break;
                    default:
                        echo "Invalid option. Please try again.\n";
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