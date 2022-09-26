<?php 
session_start();
//connexion à la base de données:
$BDD = array();
$BDD['host'] = "localhost";
$BDD['user'] = "root";
$BDD['pass'] = "root";
$BDD['db'] = "nom_de_la_base_de_donnees";
$mysqli = mysqli_connect($BDD['host'], $BDD['user'], $BDD['pass'], $BDD['db']);
if(isset($_POST['titre'],$_POST['article'],$_POST['theme'])){//l'utilisateur à cliqué sur "S'inscrire", on demande donc si les champs sont défini avec "isset"
    if(empty($_POST['titre'])){//le champ titre est vide, on arrête l'exécution du script et on affiche un message d'erreur
        echo "Le champ Titre est vide.";
    } elseif(empty($_POST['article'])){//le champ de l'article est vide
        echo "Le champ Article est vide.";
    } elseif (empty($_POST['theme'])) {
        echo "Le champ Thème est vide.";
    } elseif(mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM articles WHERE titre='".$_POST['titre']."'"))==1){//on vérifie que ce titre n'est pas déjà utilisé par un autre article
        echo "Ce titre est déjà utilisé.";
    } else {
        //toutes les vérifications sont faites, on passe à l'enregistrement dans la base de données:
        //Bien évidement il s'agit là d'un script simplifié au maximum, libre à vous de rajouter des conditions avant l'enregistrement comme la longueur minimum du mot de passe par exemple
        if(!mysqli_query($mysqli,"INSERT INTO articles SET titre='".$_POST['titre']."', texte='".$_POST['article']."', theme='".$_POST['theme']."'")){
            echo "Une erreur s'est produite: ".mysqli_error($mysqli);
        } else {
            echo "L'article a été publié avec succès!";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Ecriture d'arcticle</title>
</head>
<body>
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="index.php">Acceuil</a>
        <a href="#">Thème</a>
        <a href="#">Auteur</a>
        <a href="deconnexion.php">Déconnexion</a>
    </div>
      
    <!-- Use any element to open the sidenav -->
    <input type="button" value="Open" name="sidebar button" onclick="openNav()"/>
      
    <!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
    <div id="main">
        <h1 class="white_text">Ecriture d'arcticle :</h1>
        <form method="POST" class="white_text">
            <h2>Titre :</h2>
            <br/>
            <input type="text" name="titre">
            <br/>
            <h2>Article :</h2>
            <br/>
            <textarea name="article" cols="250" rows="100"></textarea>
            <h2>Thèmes :</h2>
            <input type="text" name="theme">
            <br/>
            <input type="submit" value="Publier">
        </form>
    </div>   
</body>
<script src="scripts.js"></script>
</html>