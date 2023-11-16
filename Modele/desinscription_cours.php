<?php
include('./header.php');
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
    $deleteSql = "DELETE FROM inscription_cours WHERE id_utilisateur = ? AND id_cours = ?";
    $stmt = $conn->prepare($deleteSql);

    if (!$stmt) {
        die("Erreur N°1-21 Contactez un administrateur");
    }

    $stmt->bind_param("ii", $userId, $coursId);

    if ($stmt->execute()) {
        $updateStatutSql = "UPDATE utilisateurs SET statut = 'desincrit' WHERE id = ?";
        $stmtUpdateStatut = $conn->prepare($updateStatutSql);

        if ($stmtUpdateStatut) {
            $stmtUpdateStatut->bind_param("i", $userId);
            $stmtUpdateStatut->execute();
            $stmtUpdateStatut->close();
        }
        
        echo "Désinscription réussie!";
    } else {
        die("Erreur lors de la désinscription, Contactez un administrateur");
    }

    $stmt->close();
    $conn->close();
    exit(); 
}

echo "Une erreur s'est produite.";
?>
