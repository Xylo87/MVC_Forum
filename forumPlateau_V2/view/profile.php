<?php

use App\Session;

?>

<div class="none">
    <h1>Mon profil</h1>
    <br>
    <p><u>Pseudo</u> : <?= SESSION::getUser()->getPseudo() ?></p>
    <p><u>Email</u> : <?= SESSION::getUser()->getMail() ?></p>
    <p><u>Rôle</u> : <?= SESSION::getUser()->getRole() ?></p>
    <p><u>Date de création du compte</u> : <?= SESSION::getUser()->getDateCreaFr() ?></p>
    <br>
    <br>
    <?php
        if (Session::getUser() && Session::getUser()->getRole() == "Administrateur") { ?>
            <a href="index.php?ctrl=home&action=users">Afficher la liste des utilisateurs</a>
    <?php } ?>
</div>


