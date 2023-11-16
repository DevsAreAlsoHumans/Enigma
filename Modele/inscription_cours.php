<?php
session_start();

if (!isset($_SESSION['user_email'])) {
    die("Vous n'êtes pas connecté.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id_cours"])) {
    if (!isset($_SESSION['user_id']) || !is_numeric($_SESSION['user_id'])) {
        die("L'ID de l'utilisateur n'est pas valide.");
    }

    $userId = $_SESSION['user_id'];
    $coursId = $_POST["id_cours"];

    $conn = new mysqli("localhost", "root", "", "bddcrud");

    if ($conn->connect_error) {
        die("Erreur N°1-20 Contactez un administrateur");
    }

    $insertSql = "INSERT INTO inscription_cours (id_utilisateur, id_cours, statut) VALUES (?, ?, 'inscrit')";
    $stmt = $conn->prepare($insertSql);

    if (!$stmt) {
        die("Erreur N°1-21 Contactez un administrateur");
    }

    $stmt->bind_param("ii", $userId, $coursId);

    if ($stmt->execute()) {
        echo "Inscription réussie!";
    } else {
        if ($conn->errno == 1062) {
            echo "Erreur : Vous êtes déjà inscrit à ce cours.";
        } else {
            echo "Erreur lors de l'inscription : " . $stmt->error;
        }
    }

    $stmt->close();
    $conn->close();
    exit();
}

echo "Une erreur s'est produite.";
?>
