<?php
    $users = $result["data"]["users"];
?>

<div class="none">
    <h1>Liste des utilisateurs</h1>
    <br>
    <?php foreach ($users as $user) { 
        echo $user->getPseudo()."<br>".
        "<u>Email</u> : ".$user->getMail()."<br>".
        "<u>Rôle</u> : ".$user->getRole()."<br>".
        "<u>Date de création du compte</u> : ".$user->getDateCreaFr()."<br><br>";
    } ?>
</div>