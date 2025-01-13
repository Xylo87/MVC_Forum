<div class="none">
    <h1>Inscription</h1>
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