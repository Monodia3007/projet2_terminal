<?php  
    /* page: inscription.php */
//connexion à la base de données:
$BDD = array();
$BDD['host'] = "localhost";
$BDD['user'] = "root";
$BDD['pass'] = "root";
$BDD['db'] = "nom_de_la_base_de_donnees";
$mysqli = mysqli_connect($BDD['host'], $BDD['user'], $BDD['pass'], $BDD['db']);
if(!$mysqli) {
    echo "Connexion non établie.";
    exit;
}
$AfficherFormulaire=1;
//traitement du formulaire:
if(isset($_POST['pseudo'],$_POST['mdp'])){//l'utilisateur à cliqué sur "S'inscrire", on demande donc si les champs sont défini avec "isset"
    if(empty($_POST['pseudo'])){//le champ pseudo est vide, on arrête l'exécution du script et on affiche un message d'erreur
        echo "Le champ Pseudo est vide.";
    } elseif(!preg_match("#^[a-z0-9]+$#",$_POST['pseudo'])){//le champ pseudo est renseigné mais ne convient pas au format qu'on souhaite qu'il soit, soit: que des lettres minuscule + des chiffres (je préfère personnellement enregistrer le pseudo de mes membres en minuscule afin de ne pas avoir deux pseudo identique mais différents comme par exemple: Admin et admin)
        echo "Le Pseudo doit être renseigné en lettres minuscules sans accents, sans caractères spéciaux.";
    } elseif(strlen($_POST['pseudo'])>25){//le pseudo est trop long, il dépasse 25 caractères
        echo "Le pseudo est trop long, il dépasse 25 caractères.";
    } elseif(empty($_POST['mdp'])){//le champ mot de passe est vide
        echo "Le champ Mot de passe est vide.";
    } elseif(mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM membres WHERE pseudo='".$_POST['pseudo']."'"))==1){//on vérifie que ce pseudo n'est pas déjà utilisé par un autre membre
        echo "Ce pseudo est déjà utilisé.";
    } else {
        //toutes les vérifications sont faites, on passe à l'enregistrement dans la base de données:
        //Bien évidement il s'agit là d'un script simplifié au maximum, libre à vous de rajouter des conditions avant l'enregistrement comme la longueur minimum du mot de passe par exemple
        if(!mysqli_query($mysqli,"INSERT INTO membres SET pseudo='".$_POST['pseudo']."', mdp='".md5($_POST['mdp'])."'")){//on crypte le mot de passe avec la fonction propre à PHP: md5()
            echo "Une erreur s'est produite: ".mysqli_error($mysqli);//je conseille de ne pas afficher les erreurs aux visiteurs mais de l'enregistrer dans un fichier log
        } else {
            echo "Vous êtes inscrit avec succès!";
            //on affiche plus le formulaire
            $AfficherFormulaire=0;
        }
    }
}
if($AfficherFormulaire==1){
    ?>
    <!-- 
    Les balises <form> sert à dire que c'est un formulaire
    on lui demande de faire fonctionner la page inscription.php une fois le bouton "S'inscrire" cliqué
    on lui dit également que c'est un formulaire de type "POST"
     
    Les balises <input> sont les champs de formulaire
    type="text" sera du texte
    type="password" sera des petits points noir (texte caché)
    type="submit" sera un bouton pour valider le formulaire
    name="nom de l'input" sert à le reconnaitre une fois le bouton submit cliqué, pour le code PHP
     -->
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="CSS/style.css">
        <title>Inscription</title>
    </head>
    <body>
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="index.php">Acceuil</a>
            <a href="#">Thème</a>
            <a href="#">Auteur</a>
            <a href="connexion.php">Connexion</a>
        </div>

        <!-- Use any element to open the sidenav -->
        <input type="button" value="Open" name="sidebar button" onclick="openNav()"/>

        <!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
        <div id="main">
            <div class="form_center">
                <form method="post" action="inscription.php" class="white_text">
                    Pseudo (a-z0-9) : <input type="text" name="pseudo">
                    <br />
                    Mot de passe : <input type="password" name="mdp">
                    <br />
                    <input type="submit" value="S'inscrire">
                </form>
            </div>
        </div>     
    </body>
    <script src="scripts.js"></script>
    </html>
    <?php
}
?>