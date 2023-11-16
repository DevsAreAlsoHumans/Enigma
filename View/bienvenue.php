<?php
session_start();

if (!isset($_SESSION['user_email'])) {
    header("Location: ../index.php");
    exit();
}

$user_email = $_SESSION['user_email'];

include('../header.php');
?>

    
    <h2>Bienvenue <?php echo $user_email; ?></h2>
    <p>Ceci est la page de bienvenue.</p>
    <!-- <a href="logout.php">Se déconnecter</a> -->


<?php
include('../footer.php');