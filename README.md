# ⚡💬 Projet d'application web type Forum de discussions, autour du Retrogaming

## 1. Description 
Ce projet est un exercice pratique de programmation web utilisant l'architecture **Modèle/Vue/Contrôleur**, **PHP** et un **Framework** dédié.
Il permet l'affichage de sujets de discussions thématiques (jeux vidéo rétro) répartis en catégories/sujets et de messages d'utilisateurs.
L'application inclus un système d'authentification de connexion : elle permet aux utilisateurs souhaitant poster un message, ou créer un sujet, de s'inscrire via un formulaire et de se connecter en `$_SESSION`.
Les informations affichées sont appelées depuis une base de données **MySQL** grâce à l'architecture **MVC**.

## 2. Fonctionnalités
- Navigation entre les différentes **Vues** (home, sujets / login, register, page de profil utilisateur) à l'aide d'une **Navbar** et d'une **Sidebar** sommaires.

- Listage des catégories, des sujets par catégorie (avec auteur + date de création) et des utilisateurs (la liste des utilisateurs étant restreinte aux membres **administrateurs**).

- Fonction de **Register** (inscription) pour les utilisateurs, avec choix d'un pseudo, d'une adresse mail, d'un mot de passe. Le mot de passe doit être confirmé pour que l'inscription soit validée.
Le système d'inscription vérifie et exclu les doublons de pseudos et d'adresses mail.
Le choix du mot de passe doit respecter une **Regex** selon les recommandations récentes de la **CNIL**.
Si les conditions sont vérifiées, les informations de l'utilisateur sont inscrites en base de données, après que le mot de passe ait été haché (via la fonction **Bcrypt**).

- Fonction de **Login** (adresse mail + mot de passe) pour un enregistrement de l'utilisateur en `$_SESSION` PHP.

- Fonction de **Logout** (le tableau de `$_SESSION` est alors vidé via la fonction native `unset`).

- Fonction de création de messages et de sujets (via un premier message obligatoire) pour les utilisateurs inscrits et connectés.
Fonction de suppression de messages par utilisateur.

- Accès à une page de profil pour l'utilisateur, lui rappelant les informations relatives à son compte (pseudo, adresse mail, rôle sur le forum, date de création du compte).

- Statuts spéciaux pour certains utilisateurs : **modérateurs** et **administrateurs**.
Les modérateurs sont en mesure de supprimer n'importe quel message et de verrouiller n'importe quel sujet, empêchant quiconque d'y écrire un message. Ils peuvent également déverrouiller le sujet à loisir.
Les administrateurs disposent des pouvoirs des modérateurs, et peuvent également accéder à une liste complète des utilisateurs du forum via un lien accessible sur leur propre page profil.
Ces fonctions sont sécurisées avec une méthode RestrictTo() qui empêche de les appeler via leur URL en méthode `$_POST`, pour un utilisateur déconnecté ou qui ne disposerait pas du rôle adéquate en base de données. Une redirection vers la vue **Login** est alors mise en place.

---

## 3. Installation 

1. Clonez ce projet depuis GitHub :
   ```bash
   git clone https://github.com/Xylo87/MVC_Forum.git
   cd MVC_Forum
   ```
2. Assurez-vous que PHP est installé sur votre machine en exécutant la commande suivante :
   ```bash
   php --version
   ```

3. Installer un logiciel type "Laragon" pour disposer d'un environnement qui permet d'exécuter un script PHP :

- Télécharger Laragon [ici](https://laragon.org/download/)
- Démarrer Laragon
- Enregistrer le "Repo" dans le dossier laragon\www\
- Exécuter la fonction "Web" de Laragon

4. Pour commencer la navigation, veuillez exécuter la requête suivante dans la barre d'URL :
   ```bash
   php http://localhost/MVC_Forum/forumPlateau_V2/index.php?ctrl=home&action=index
   ```

   ---

## 4. Améliorations possibles
- Ajout de **messages flash** en `$_SESSION` via des méthodes dédiées au sein du **Framework**, lors de la réussite ou de l'échec de l'utilisation de certaines fonctionnalités (**register**, **login** etc.).
- Ajout de style sur les différentes **vues**, autres que la **HomePage**.
- Ajout d'un design **Responsive** sur l'ensemble des **vues** à destination des utilisateurs **Mobile**.

---

## 5. Auteur
Ce projet a été réalisé par Théo Arbogast (aka Xylo87).  
N'hésitez pas à ouvrir une issue ou à me contacter pour toute suggestion ou question.
