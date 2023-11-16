<?php
include('../Database/database.php');

$email = $_POST['email'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$mot_de_passe = $_POST['mot_de_passe'];
$confirm_mot_de_passe = $_POST['confirm_mot_de_passe'];

if ($mot_de_passe === $confirm_mot_de_passe) {

    $mot_de_passe = password_hash($mot_de_passe, PASSWORD_BCRYPT);
    $database = new Database("localhost", "root", "", "bddcrud");
    $conn = $database->getConnection();

    $sql = "INSERT INTO utilisateurs (email, mot_de_passe, first_name, last_name) VALUES ('$email', '$mot_de_passe', '$first_name', '$last_name')";
    $stmt = $conn->prepare($sql);
    
    $stmt->execute();
    
    $database->closeConnection();
    header("Location: ../View/login_view.php");
    exit();
}
