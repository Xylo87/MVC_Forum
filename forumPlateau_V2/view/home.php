<?php
use App\Session;
?>

<div id="sidebar">
    <div class="sideHome">
        <i class="fa-solid fa-house"></i>
        <a href="index.php?ctrl=home&action=index"><p>Acceuil</p></a>
    </div>
    <div class="sideSection">
        <div class="navElement">
            <i class="fa-solid fa-comments"></i>
            <p>Populaires</p>
        </div>
        <div class="navElement">
            <i class="fa-solid fa-bars"></i>
            <a href="index.php?ctrl=forum&action=index"><p>Catégories</p></a>
        </div>
    </div>
    <hr class="cutSection">
    <div class="sideSection">
        <p>Favoris</p>
    </div>
    <hr class="cutSection">
    <div class="sideSection">
        <p>Hot Topics</p>
    </div>
    <footer>
        <hr class="cutSection">
        <p><a href="#">Règlement</a></p>
        <p><a href="#">Mentions</a></p>
        <p>&copy; <?= date_create("now")->format("Y") ?></p> 
    </footer>
</div>
<div id="content">
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
    Sit ut nemo quia voluptas numquam, itaque ipsa soluta ratione eum temporibus aliquid, 
    facere rerum in laborum debitis labore aliquam ullam cumque.</p>
</div>

