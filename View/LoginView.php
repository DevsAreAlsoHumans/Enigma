<?php
class RegisterView
{
    public function renderHeader()
    {
        include('../header.php');
    }

    public function renderForm()
    {
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
            <title>Inscription</title>
            <style>
                body {
                    margin: 0;
                    padding: 0;
                    font-family: sans-serif;
                    background: linear-gradient(#141e30, #243b55);
                    display: flex;
                    flex-direction: column;
                    min-height: 100vh;
                }

                .register-container {
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    width: 400px;
                    padding: 40px;
                    transform: translate(-50%, -50%);
                    background: rgba(0, 0, 0, .5);
                    box-sizing: border-box;
                    box-shadow: 0 15px 25px rgba(0, 0, 0, .6);
                    border-radius: 10px;
                }

                .register-container h2 {
                    margin: 0 0 30px;
                    padding: 0;
                    color: #fff;
                    text-align: center;
                }

                .register-container .user-box {
                    position: relative;
                }

                .register-container input[type="text"],
                .register-container input[type="password"],
                .register-container input[type="email"],
                .register-container input[type="date"] {
                    width: 100%;
                    padding: 10px 0;
                    font-size: 16px;
                    color: #fff;
                    margin-bottom: 30px;
                    border: none;
                    border-bottom: 1px solid #fff;
                    outline: none;
                    background: transparent;
                }

                .register-container label {
                    position: absolute;
                    top: 0;
                    left: 0;
                    padding: 10px 0;
                    font-size: 16px;
                    color: #fff;
                    pointer-events: none;
                    transition: .5s;
                }

                .register-container input:focus ~ label,
                .register-container input:valid ~ label {
                    top: -20px;
                    left: 0;
                    color: #03e9f4;
                    font-size: 12px;
                }

                .register-container a {
                    position: relative;
                    display: inline-block;
                    padding: 10px 20px;
                    color: #03e9f4;
                    font-size: 16px;
                    text-decoration: none;
                    text-transform: uppercase;
                    overflow: hidden;
                    transition: .5s;
                    margin-top: 40px;
                    letter-spacing: 4px;
                }

                .register-container a:hover {
                    background: #03e9f4;
                    color: #fff;
                    border-radius: 5px;
                    box-shadow: 0 0 5px #03e9f4, 0 0 25px #03e9f4, 0 0 50px #03e9f4, 0 0 100px #03e9f4;
                }

                .register-container a span {
                    position: absolute;
                    display: block;
                }

                .register-container a span:nth-child(1) {
                    top: 0;
                    left: -100%;
                    width: 100%;
                    height: 2px;
                    background: linear-gradient(90deg, transparent, #03e9f4);
                    animation: btn-anim1 1s linear infinite;
                }

                @keyframes btn-anim1 {
                    0% {
                        left: -100%;
                    }
                    50%,100% {
                        left: 100%;
                    }
                }

                .register-container a span:nth-child(2) {
                    top: -100%;
                    right: 0;
                    width: 2px;
                    height: 100%;
                    background: linear-gradient(180deg, transparent, #03e9f4);
                    animation: btn-anim2 1s linear infinite;
                    animation-delay: .25s
                }

                @keyframes btn-anim2 {
                    0% {
                        top: -100%;
                    }
                    50%,100% {
                        top: 100%;
                    }
                }

                .register-container a span:nth-child(3) {
                    bottom: 0;
                    right: -100%;
                    width: 100%;
                    height: 2px;
                    background: linear-gradient(270deg, transparent, #03e9f4);
                    animation: btn-anim3 1s linear infinite;
                    animation-delay: .5s
                }

                @keyframes btn-anim3 {
                    0% {
                        right: -100%;
                    }
                    50%,100% {
                        right: 100%;
                    }
                }

                .register-container a span:nth-child(4) {
                    bottom: -100%;
                    left: 0;
                    width: 2px;
                    height: 100%;
                    background: linear-gradient(360deg, transparent, #03e9f4);
                    animation: btn-anim4 1s linear infinite;
                    animation-delay: .75s
                }

                @keyframes btn-anim4 {
                    0% {
                        bottom: -100%;
                    }
                    50%,100% {
                        bottom: 100%;
                    }
                }
            </style>
        </head>

        <body>

            <div class="register-container">
                <h2>Inscription</h2>
                <form action="../Modele/Register.php" method="post" enctype="multipart/form-data">
                    <div class="user-box">
                        <input type="text" name="last_name" required="">
                        <label>Nom</label>
                    </div>

                    <div class="user-box">
                        <input type="text" name="first_name" required="">
                        <label>Prénom</label>
                    </div>

                    <div class="user-box">
                        <input type="date" name="date_de_naissance" required="">
                    </div>

                    <div class="user-box">
                        <input type="email" name="email" required="">
                        <label>Email</label>
                    </div>

                    <div class="user-box">
                        <input type="password" name="mot_de_passe" required="">
                        <label>Mot de passe</label>
                    </div>

                    <div class="user-box">
                        <input type="password" name="confirm_mot_de_passe" required="">
                        <label>Confirmer le mot de passe</label>
                    </div>

                    <a href="#">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <input type="submit" value="S'inscrire" class="btn btn-primary">
                    </a>
                </form>
            </div>

            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        </body>

        </html>
        <?php
    }

    public function renderFooter()
    {
        include('../footer.php');
    }
}

$RegisterView = new RegisterView();
$RegisterView->renderHeader();
$RegisterView->renderForm();
$RegisterView->renderFooter();
?>
