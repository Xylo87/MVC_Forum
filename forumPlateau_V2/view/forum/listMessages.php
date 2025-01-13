<?php
    use App\Session;
    $topic = $result["data"]['topic']; 
    $messages = $result["data"]['messages'];
    $category = $result["data"]['category'];
?>
<div class="none">
    <!-- TITRE -->
    <?php if ($topic->getLock() == 1) { ?>
        <h1><?= $topic ?> 🔒</h1>
    <?php } else { ?>
        <h1><?= $topic ?></h1>
    <?php } ?>

    <!-- LIEN NAV -->
    <p>(<a href="index.php?ctrl=forum&action=listTopicsByCategory&id=<?= $category->getId() ?>">Retour à la liste des sujets de <?= $category ?></a>)</p>
    <br>

    <!-- LOCK/UNLOCK -->
    <?php if ((Session::getUser() && Session::getUser()->getId() == $topic->getUtilisateur()->getId()) || (Session::getUser() && Session::getUser()->getRole() == "Administrateur")) { ?>
        <?php if ($topic->getLock() == 0) { ?>
        <a href="index.php?ctrl=forum&action=lock&id=<?=$topic->getId()?>">Lock</a>
        <?php } else { ?>
        <a href="index.php?ctrl=forum&action=unlock&id=<?=$topic->getId()?>">Unlock</a>
        <?php } ?>
    <?php } ?>
    <br>
    <br>

    <!-- AFFICHAGE MESSAGES -->
    <?php
    foreach($messages as $message){ ?>
        <p><?= $message ?></p>
        <small><?= $message->getUtilisateur()?> - <?= $message->getDateMesFr()?></small>
        <br>
        <br>
    <?php } ?>

    <!-- CHAMP TEXTE POST -->
    <form action="index.php?ctrl=forum&action=addMessage&id=<?= $topic->getId() ?>" method="post">
        <?php if ($topic->getLock() == 1) { ?>
                <textarea class="locked" name="post" id="post" placeholder="Sujet verouillé !" cols="40" rows="5" required disabled></textarea>
                <br>
                <br>
            <?php } else { ?>
                <textarea name="post" id="post" placeholder="Votre réponse" cols="40" rows="5" required></textarea>
                <br>
                <br>
                <input type="submit" name="submit" value="Post">
        <?php } ?>
    </form>
</div>


