<?php
session_start();

class ModifProfile
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function updateProfile($email, $nom, $prenom)
    {
        $conn = $this->database->getConnection();

        $sql = "UPDATE utilisateurs SET last_name = ?, first_name = ? WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $nom, $prenom, $email);

        if ($stmt->execute()) {
            echo "Profil mis à jour avec succès. Redirection vers votre profil...";
            header("refresh:1;url=../View/ProfilView.php");
        } else {
            echo "Erreur lors de la mise à jour du profil : " . $stmt->error;
        }

        $stmt->close();
        $this->database->closeConnection();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once('../Database/database.php');

    $email = $_POST['email'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];

    if (empty($nom) || empty($prenom)) {
        echo "Veuillez remplir tous les champs.";
    } else {
        $database = new Database("localhost", "root", "", "bddcrud");
        $ModifProfile = new ModifProfile($database);

        $ModifProfile->updateProfile($email, $nom, $prenom);
    }
} else {
    echo "Méthode non autorisée.";
}
?>
