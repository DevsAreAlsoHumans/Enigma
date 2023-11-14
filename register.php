<?php
// Connexion à la base de données (à remplacer par vos propres informations)
$serveur = "localhost";
$utilisateur = "root";
$mot_de_passe = "";
$base_de_donnees = "enigma";

$connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

// Vérifier la connexion
if ($connexion->connect_error) {
    die("La connexion a échoué : " . $connexion->connect_error);
}

// Récupérer les données du formulaire
$email = $_POST['email'];
$mot_de_passe = $_POST['mot_de_passe'];

// Préparer la requête SQL
$sql = "INSERT INTO utilisateurs (email, mot_de_passe) VALUES ('$email', '$mot_de_passe')";

// Exécuter la requête
if ($connexion->query($sql) === TRUE) {
    echo "Inscription réussie !";
} else {
    echo "Erreur lors de l'inscription : " . $connexion->error;
}

// Fermer la connexion à la base de données
$connexion->close();
?>


