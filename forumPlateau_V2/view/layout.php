<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="<?= $meta_description ?>">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="https://cdn.tiny.cloud/1/zg3mwraazn1b2ezih16je1tc6z7gwp5yd4pod06ae5uai8pa/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="public/css/style.css">
        <title>Retro Game Corner</title>
    </head>
    <body>
        <div id="wrapper"> 
            <!-- c'est ici que les messages (erreur ou succès) s'affichent-->
            <h3 class="message" style="color: red"><?= App\Session::getFlash("error") ?></h3>
            <h3 class="message" style="color: green"><?= App\Session::getFlash("success") ?></h3>
            <header>
                <nav>
                    <div id="nav-left">
                        <a href="index.php?ctrl=home&action=index">
                            <img src="public/css/img/logo.png" alt="mister game and watch icon">
                        </a>
                        <h1>Retro Game Corner</h1>
                    </div>
                    <div id="nav-right">
                        <div id="search-bar">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <p>Rechercher</p>
                        </div>
                        <div id="logs">
                            <?php
                            // si l'utilisateur est connecté 
                            if(App\Session::getUser()){ ?>
                            <div id="profilPic">
                                <span class="fas fa-user"></span>
                                <a href="index.php?ctrl=security&action=profile"><?= App\Session::getUser()?></a>
                            </div>
                            <div id="logout">
                                <img src="public/css/img/door.png" alt="logout door icon">
                                <a href="index.php?ctrl=security&action=logout">Déconnexion</a>
                            </div> 
                            <?php }
                            else { ?>
                            <div id="login">
                                <img src="public/css/img/key.png" alt="login key icon">
                                <a href="index.php?ctrl=security&action=login">Connexion</a>
                            </div>
                            <div id="register">
                                <img src="public/css/img/floppy.png" alt="register floppy icon">
                                <a href="index.php?ctrl=security&action=register">Inscription</a>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </nav>
                <hr>
            </header>
                
            <main>
                <div id="sidebar">
                    <div class="sideHome">
                        <i class="fa-solid fa-house"></i>
                        <a href="index.php?ctrl=home&action=index"><p>Accueil</p></a>
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
                        <div class="navElement">
                            <i class="fa-solid fa-heart"></i>
                            <p>Favoris</p>
                        </div>
                    </div>
                    <hr class="cutSection">
                    <div class="sideSection">
                        <div class="navElement">
                            <i class="fa-solid fa-chart-line"></i>
                            <p>Hot Topics</p>
                        </div>
                    </div>
                    <footer>
                    <hr class="cutSectionEnd">
                        <div class="navElement">
                            <i class="fa-solid fa-book"></i>
                            <p>Règlement</p>
                        </div>
                        <div class="navElement">
                            <i class="fa-solid fa-scale-balanced"></i>
                            <p>Mentions</p>
                        </div>
                        <p>&copy; <?= date_create("now")->format("Y") ?></p> 
                    </footer>
                </div>
                <?= $page ?>
            </main>
        </div>
        <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous">
        </script>
        <script>
            $(document).ready(function(){
                $(".message").each(function(){
                    if($(this).text().length > 0){
                        $(this).slideDown(500, function(){
                            $(this).delay(3000).slideUp(500)
                        })
                    }
                })
                $(".delete-btn").on("click", function(){
                    return confirm("Etes-vous sûr de vouloir supprimer?")
                })
                tinymce.init({
                    selector: '.post',
                    menubar: false,
                    plugins: [
                        'advlist autolink lists link image charmap print preview anchor',
                        'searchreplace visualblocks code fullscreen',
                        'insertdatetime media table paste code help wordcount'
                    ],
                    toolbar: 'undo redo | formatselect | ' +
                    'bold italic backcolor | alignleft aligncenter ' +
                    'alignright alignjustify | bullist numlist outdent indent | ' +
                    'removeformat | help',
                    content_css: '//www.tiny.cloud/css/codepen.min.css'
                });
            })
        </script>
        <script src="<?= PUBLIC_DIR ?>/js/script.js"></script>
    </body>
</html>