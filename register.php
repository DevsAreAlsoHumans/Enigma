<?php
include('./database.php');

// Récupérer les données du formulaire
$email = $_POST['email'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$mot_de_passe = $_POST['mot_de_passe'];
$confirm_mot_de_passe = $_POST['confirm_mot_de_passe'];

if ($mot_de_passe === $confirm_mot_de_passe) {

    // Préparer la requête SQL
    
    $database = new Database("localhost", "root", "", "bddcrud");
    $conn = $database->getConnection();
    
    // Utilisation de requête préparée pour éviter les injections SQL
    $sql = "INSERT INTO utilisateurs (email, mot_de_passe, first_name, last_name) VALUES ('$email', '$mot_de_passe', '$first_name', '$last_name')";
    $stmt = $conn->prepare($sql);
    
    $stmt->execute();
    

    // Fermer la connexion à la base de données
    $database->closeConnection();
    header("Location: login_view.php");
    exit();
}
