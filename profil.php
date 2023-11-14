<?php

session_start();

$serveur = "localhost";
$utilisateur = "root";
$mot_de_passe = "";
$base_de_donnees = "enigma";


$connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

if ($connexion->connect_error) {
    die("Échec de la connexion à la base de données : " . $connexion->connect_error);
}

$sql = "SELECT email, nom, prenom FROM utilisateurs WHERE id_utilisateur = 1"; 

$resultat = $connexion->query($sql);


if ($resultat && $resultat->num_rows > 0) {
  
    $row = $resultat->fetch_assoc();
    

    $email = $row['email'];
    $nom = $row['nom'];
    $prenom = $row['prenom'];

    $connexion->close();
} else {
    echo "Aucune donnée d'utilisateur trouvée.";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informations Utilisateur</title>
</head>
<body>

    <h1>Informations de l'utilisateur</h1>

    <p><strong>Email :</strong> <?php echo $email; ?></p>
    <p><strong>Nom :</strong> <?php echo $nom; ?></p>
    <p><strong>Prénom :</strong> <?php echo $prenom; ?></p>

</body>
</html>
