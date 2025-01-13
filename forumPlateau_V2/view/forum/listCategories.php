<?php
    $categories = $result["data"]['categories']; 
?>

<div class="none">
    <h1>Liste des catégories</h1>
    <br>
    <?php
    foreach($categories as $category ){ ?>
        <ul><li><a href="index.php?ctrl=forum&action=listTopicsByCategory&id=<?= $category->getId() ?>"><?= $category->getNom() ?></a></li></ul>
    <?php } ?>
</div>


  
