<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        nav {
            background-color: #333;
        }

        .lienNav {
            color: white;
            transition: text-decoration 0.3s;
        }

        .lienNav:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">Logo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <?php if (empty($_SESSION)) { ?>
                    <li class="nav-item">
                        <a class="nav-link lienNav h5" href="./login_view.php">Connexion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link lienNav h5" href="./registerView.php">Inscription</a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link lienNav h5" href="./profil.php">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link lienNav h5" href="./logout.php">Déconnexion</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </nav>

    <!-- Votre contenu ici -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>