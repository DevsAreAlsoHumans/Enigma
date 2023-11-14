<?php
session_start();

require_once('database.php');
require_once('user.php');

// Initialiser la connexion à la base de données
$db = new Database("localhost", "root", "", "bddcrud");

// Initialiser la classe User
$user = new User($db);

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Tentative de connexion
    if ($user->loginUser($email, $password)) {
        $_SESSION['user_email'] = $email;
        $_SESSION['connexion_status'] = "Connexion réussie!";
        header("Location: bienvenue.php");
        exit();
    } else {
        $_SESSION['connexion_status'] = "Échec de la connexion. Veuillez vérifier vos informations de connexion.";
        header("Location: login_view.php");
        exit();
    }
}

$db->closeConnection();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Connexion</h2>
        <?php
        if (isset($_SESSION['connexion_status'])) {
            echo "<p style='color: " . ($_SESSION['connexion_status'] === "Connexion réussie!" ? "green" : "red") . ";'>{$_SESSION['connexion_status']}</p>";
            unset($_SESSION['connexion_status']); 
        }
        ?>
        <form action="login_view.php" method="post">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit">Se connecter</button>
            </div>
        </form>
    </div>
</body>
</html>
