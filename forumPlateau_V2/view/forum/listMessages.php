<?php
    $topic = $result["data"]['topic']; 
    $messages = $result["data"]['messages']; 
?>

<h1><?= $topic ?></h1>
<br>

<?php
foreach($messages as $message){ ?>
    <p><?= $message ?></p>
    <small><?= $message->getUtilisateur()?> - <?= $message->getDateMesFr()?></small>
    <br>
    <br>
<?php } ?>

<form action="index.php?ctrl=forum&action=addMessage&id=<?= $topic->getId() ?>" method="post">
    <textarea name="post" id="post" placeholder="Votre réponse" cols="40" rows="5" required></textarea>
    <br>
    <br>
    <input type="submit" name="submit" value="Post">
</form>


