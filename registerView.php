<?php

include('./header.php');

?>
    <h2>Inscription</h2>
    <form action="register.php" method="post">
    <label for="last_name">Nom :</label>
        <input type="text" name="last_name" required><br>
        
        <label for="first_name">Prénom :</label>
        <input type="text" name="first_name" required><br>

        <label for="email">Email :</label>
        <input type="email" name="email" required><br>

        <label for="mot_de_passe">Mot de passe :</label>
        <input type="password" name="mot_de_passe" required><br>

        <label for="confirm_mot_de_passe">Confimer le mot de passe :</label>
        <input type="password" name="confirm_mot_de_passe" required><br>

        <input type="submit" value="S'inscrire">
    </form>

    <?php

include('./footer.php');

?>