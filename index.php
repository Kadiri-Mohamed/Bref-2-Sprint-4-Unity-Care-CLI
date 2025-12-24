<?php 
require_once 'autoload.php';
require_once 'models/Departments.php';
require_once 'models/Medecins.php';
require_once 'models/Patients.php';

$db = new Database();
$conn = $db->dbConnection();

// if($conn) {
//     echo "Connect";
// }


$departmentModel = new Department();
$Departments = $departmentModel->getAll();
// print_r($Departments);


$patientModel = new Patient();
$recentPatients = $patientModel->getAll();
$recentPatients = array_slice($recentPatients, 0, 5);
// print_r($recentPatients);

$medecinModel = new Medecin();
$recentMedecins = $medecinModel->getAll();
// print_r($recentMedecins);
