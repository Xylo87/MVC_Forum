<?php
    $topic = $result["data"]['topic']; 
    $messages = $result["data"]['messages']; 
?>

<h1><?= $topic ?></h1>

<?php
foreach($messages as $message){ ?>
    <p><?= $message ?></p>
    <small><?= $message->getUtilisateur()?> - <?= $message->getDateMesFr()?></small>
    <br>
    <br>
<?php }


