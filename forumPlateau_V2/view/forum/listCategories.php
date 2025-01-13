<?php
    $categories = $result["data"]['categories']; 
?>

<div class="none">
    <h1>Liste des catégories</h1>

    <?php
    foreach($categories as $category ){ ?>
        <p><a href="index.php?ctrl=forum&action=listTopicsByCategory&id=<?= $category->getId() ?>"><?= $category->getNom() ?></a></p>
    <?php } ?>
</div>


  
