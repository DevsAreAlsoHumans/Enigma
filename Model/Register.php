<?php
include('../Database/database.php');

class Register
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function registerUser($email, $first_name, $last_name, $date_de_naissance, $mot_de_passe, $confirm_mot_de_passe)
    {
        $conn = $this->database->getConnection();
        $sql = "SELECT  * FROM utilisateurs WHERE id = ( 
            SELECT MAX( id )  AS idMax FROM utilisateurs );";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $user = $stmt->get_result()->fetch_assoc();
        
        $image = "";

        // Vérifier si le fichier a été correctement téléchargé
        if (isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
            // Emplacement où vous souhaitez sauvegarder le fichier téléchargé
            $repertoireDuFichier = dirname(__FILE__);
            $target_dir = $repertoireDuFichier."/../Public/img/";
            $target_file = $target_dir . "image#". $user["id"] +1 . ".png";
            $image=  "image#". $user["id"] +1 . ".png";
            // Déplacer le fichier téléchargé vers l'emplacement souhaité
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                echo "L'image a été téléchargée avec succès.";
            } else {
                echo "Une erreur s'est produite lors du téléchargement de l'image.";
            }
        } else {
            echo "Veuillez sélectionner une image.";
        }
    

        if ($mot_de_passe === $confirm_mot_de_passe) {
            $mot_de_passe = password_hash($mot_de_passe, PASSWORD_BCRYPT);
            

            $sql = "INSERT INTO utilisateurs (email, mot_de_passe, first_name, last_name, date_de_naissance, image_profil) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);

            if ($stmt) {
                $stmt->bind_param("ssssss", $email, $mot_de_passe, $first_name, $last_name, $date_de_naissance, $image);

                if ($stmt->execute()) {
                    $this->database->closeConnection();
                    header("Location: ../View/LoginView.php");
                    exit();
                } else {
                    echo "Erreur lors de l'inscription : " . $stmt->error;
                }

                $stmt->close();
            } else {
                echo "Erreur de préparation de la requête : " . $conn->error;
            }
        } else {
            echo "Les mots de passe ne correspondent pas.";
        }
    }
}

// Utilisation de la classe RegisterController
$database = new Database("localhost", "root", "", "bddcrud");
$register = new Register($database);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $mot_de_passe = $_POST['mot_de_passe'];
    $confirm_mot_de_passe = $_POST['confirm_mot_de_passe'];
    $date_de_naissance = $_POST['date_de_naissance'];
    
    $register->registerUser($email, $first_name, $last_name, $date_de_naissance, $mot_de_passe, $confirm_mot_de_passe);
}
?>
