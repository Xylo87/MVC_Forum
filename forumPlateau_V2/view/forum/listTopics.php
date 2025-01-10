<?php
    $category = $result["data"]['category']; 
    $topics = $result["data"]['topics']; 
?>

<h1>Liste des topics (<a href="index.php?ctrl=forum&action=index">/<?= $category ?></a>)</h1>

<?php
foreach($topics as $topic ){ ?>
    <p><a href="index.php?ctrl=forum&action=listMessagesBySujet&id=<?= $topic->getId() ?>"><?= $topic ?></a> par <?= $topic->getUtilisateur() ?>
    <br>
    <p>Créé le <?=$topic->getDateSujFR()?></p>
    <br>
<?php } ?>

<form action="index.php?ctrl=forum&action=addTopic&id=<?= $category->getId() ?>" method="post">
    <input type="text" name="topic" placeholder="Nouveau sujet" size="41" required>
    <br>
    <textarea name="post" id="post" placeholder="Nouveau message" cols="40" rows="5" required></textarea>
    <br>
    <br>
    <input type="submit" name="submit" value="Post">
</form>
