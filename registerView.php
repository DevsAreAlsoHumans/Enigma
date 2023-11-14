<?php
include('./header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .navbar {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 15px;
            width: 100%;
        }

        .register-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 50px 0;
            width: 400px;
            text-align: center;
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

    <div class="register-container">
        <h2>Inscription</h2>
        <form action="register.php" method="post">
            <div class="form-group">
                <label for="last_name">Nom :</label>
                <input type="text" name="last_name" required>
            </div>

            <div class="form-group">
                <label for="first_name">Prénom :</label>
                <input type="text" name="first_name" required>
            </div>

            <div class="form-group">
                <label for="email">Email :</label>
                <input type="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="mot_de_passe">Mot de passe :</label>
                <input type="password" name="mot_de_passe" required>
            </div>

            <div class="form-group">
                <label for="confirm_mot_de_passe">Confirmer le mot de passe :</label>
                <input type="password" name="confirm_mot_de_passe" required>
            </div>

            <div class="form-group">
                <input type="submit" value="S'inscrire">
            </div>
        </form>
    </div>
</body>
</html>

<?php
include('./footer.php');
?>
