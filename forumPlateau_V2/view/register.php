<div class="none">
    <h1>Inscription</h1>
    <br>
    <p>Le mot de passe doit contenir :</p>
    <ul>
        <li>
            au moins 12 caractères
        </li>
        <li>
            au moins une minuscule
        </li>
        <li>
            au moins une majuscule
        </li>
        <li>
            au moins un chiffre 
        </li>
        <li>
            au moins un caractère spécial (@-$-!-%-*-?-&)
        </li>
    </ul>
    <br>
    <form action="index.php?ctrl=security&action=register" method="post">
        <label for="pseudo">Pseudo :</label>
        <input type="text" name="pseudo" id="pseudo"><br>

        <label for="mail">Email :</label>
        <input type="email" name="mail" id="mail" required><br>

        <label for="pass1">Mot de passe :</label>
        <input type="password" name="pass1" id="pass1" required><br>

        <label for="pass2">Confirmation du mot de passe :</label>
        <input type="password" name="pass2" id="pass2" required><br><br>
        <input type="submit" name="submit" value="S'enregistrer">
    </form>
</div>