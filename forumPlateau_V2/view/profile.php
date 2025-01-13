<?php

use App\Session;

?>

<div class="none">
    <h1>Mon profil</h1>
    
    <p>Pseudo : <?= SESSION::getUser()->getPseudo() ?></p>
    <p>Email : <?= SESSION::getUser()->getMail() ?></p>
    <p>Rôle : <?= SESSION::getUser()->getRole() ?></p>
    <p>Date de création du compte : <?= SESSION::getUser()->getDateCreaFr() ?></p>
</div>


