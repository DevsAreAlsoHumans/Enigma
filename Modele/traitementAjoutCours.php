<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $date = $_POST["date"];
    $sujet = $_POST["sujet"];
    $description = $_POST["description"];
    $intervenant = $_POST["intervenant"];
    $duree_cours = $_POST["duree_cours"];
    $heure_cours = $_POST["heure_cours"];

    // Validation des données (ajoutez des validations supplémentaires au besoin)

    // Inclusion de la classe Database
    require_once('../Database/database.php');
    $db = new Database("localhost", "root", "", "bddcrud");

    // Préparation de la requête (utilisez des déclarations préparées pour éviter les injections SQL)
    $query = "INSERT INTO cours (date, sujet, description, intervenant, duree_cours, heure_cours) 
              VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $db->getConnection()->prepare($query);
    $stmt->bind_param("ssssss", $date, $sujet, $description, $intervenant, $duree_cours, $heure_cours);

    // Exécution de la requête
    if ($stmt->execute()) {
        $_SESSION['success_message'] = "Cours ajouté avec succès.";
        header("Location: ../View/bienvenue.php");
        exit();
    } else {
        $_SESSION['error_message'] = "Erreur lors de l'ajout du cours. Veuillez réessayer.";
        header("Location: ../View/AjoutCoursView.php");
        exit();
    }
} else {
    header("Location: ../View/AjoutCoursView.php");
    exit();
}
?>
