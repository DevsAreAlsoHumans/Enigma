<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once('./database.php');

    $email = $_POST['email'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];

    // Vérifier si les champs ne sont pas vides
    if (empty($nom) || empty($prenom)) {
        echo "Veuillez remplir tous les champs.";
    } else {
        $database = new Database("localhost", "root", "", "bddcrud");
        $conn = $database->getConnection();

        $sql = "UPDATE utilisateurs SET last_name = ?, first_name = ? WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $nom, $prenom, $email);

        if ($stmt->execute()) {
            echo "Profil mis à jour avec succès. Redirection vers votre profil...";
            header("refresh:3;url=profil.php");  // Redirection après 3 secondes
        } else {
            echo "Erreur lors de la mise à jour du profil : " . $stmt->error;
        }

        $stmt->close();
        $database->closeConnection();
    }
} else {
    echo "Méthode non autorisée.";
}
?>
