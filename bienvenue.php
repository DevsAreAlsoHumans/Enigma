<?php
session_start();

if (!isset($_SESSION['user_email'])) {
    header("Location: login_view.php");
    exit();
}

$user_email = $_SESSION['user_email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue</title>
</head>
<body>
    <h2>Bienvenue <?php echo $user_email; ?></h2>
    <p>Ceci est la page de bienvenue.</p>
    <!-- <a href="logout.php">Se déconnecter</a> -->
</body>
</html>
