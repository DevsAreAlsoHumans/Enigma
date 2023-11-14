
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/280f44a12d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./menu.css">
</head>

<body>
    <nav>
        <i class="fas fa-bars burger"></i>
        <a href="#" class="lienNav lien1">Logo</a>
        <?php if (empty($_SESSION)) { ?>
            <a href="./login_view.php" class="lienNav recherche">Connexion</a>
            <a href="./registerView.php" class="lienNav">Inscription</a>
            <?php     } else { ?>
                <a href="./profil.php" class="lienNav recherche">Profil</a>
            <a href="./logout.php" class="lienNav ">Déconnexion</a>
        <?php } ?>
    </nav>