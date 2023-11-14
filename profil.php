<?php
session_start();
include('./header.php');

require_once('./database.php');
require_once('user.php');

$email = $_SESSION['user_email'];
$database = new Database("localhost", "root", "", "bddcrud");
$conn = $database->getConnection();

// Utilisation de requête préparée pour éviter les injections SQL
$sql = "SELECT first_name, last_name, email FROM utilisateurs WHERE email = ?";
$stmt = $conn->prepare($sql);

$stmt->bind_param("s", $email);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();

// Vérification des informations d'identification
if ($user) {
    // Informations correctes, afficher la page avec les détails de l'utilisateur
    ?>

    

        <h1>Informations de l'utilisateur</h1>

        <p><strong>Email :</strong> <?php echo $user['email']; ?></p>
        <p><strong>Nom :</strong> <?php echo $user['last_name']; ?></p>
        <p><strong>Prénom :</strong> <?php echo $user['first_name']; ?></p>

   

    <?php
} else {
    // Identifiants incorrects, afficher un message d'erreur par exemple
    echo "Identifiants incorrects.";
}
include('./footer.php');
$database->closeConnection();
?>
