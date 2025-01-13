<?php
    use App\Session;
    
    $category = $result["data"]['category']; 
    $topics = $result["data"]['topics']; 
?>

<div class="none">
    <h1>Liste des topics de <?= $category ?></h1>
    <p>(<a href="index.php?ctrl=forum&action=index">Retour à la liste des catégories</a>)</p>
    <br>
    <br>
    <?php
    foreach($topics as $topic ){ ?>
        <ul><li><a href="index.php?ctrl=forum&action=listMessagesBySujet&id=<?= $topic->getId() ?>"><?= $topic ?></a> par <?= $topic->getUtilisateur() ?>
        <br>
        Créé le <?=$topic->getDateSujFR()?></li></ul>
        <br>
    <?php } ?>
    <br>
    <?php 
    if (Session::getUser()) { ?>
        <form action="index.php?ctrl=forum&action=addTopic&id=<?= $category->getId() ?>" method="post">
        <input type="text" name="topic" placeholder="Nouveau sujet" size="41" required>
        <br>
        <br>
        <textarea name="post" id="post" placeholder="Nouveau message" cols="40" rows="5" required></textarea>
        <br>
        <br>
        <input type="submit" name="submit" value="Post">
    </form>
    <?php } else { ?>
    <form action="index.php?ctrl=forum&action=addTopic&id=<?= $category->getId() ?>" method="post">
        <input class="locked" type="text" name="topic" placeholder="Réservé aux membres !" size="41" required disabled>
        <br>
        <br>
        <textarea class="locked" name="post" id="post" placeholder="Réservé aux membres !" cols="40" rows="5" required disabled></textarea>
    </form>
    <?php } ?>
</div>
