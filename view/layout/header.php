<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ---------------------------- Alpine.js CDN ---------------------------- -->
    <script
    defer
    src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"
    ></script>
    <!-- ----------------------------- TailwindCSS ----------------------------- -->

    <title>Document</title>
    <link rel='stylesheet' href='../css/style.css'>
    <?php
    $compte_menu_active = false;
    $connect = null;
    $hommeActive = false;
    $femmeActive = false;

    $host = '51.158.59.186:14301';
    $db   = 'ls';
    $user = 'phppex';
    $pass = 'Supermotdepasse!42';

    if (isset($_GET['page'])){
        $page = $_GET['page'];
        $name = "";
        if($page == "accueil"){
            $hommeActive = false;
            $femmeActive = false;
            $name = "Tous";
        }elseif($page == "homme"){
            $hommeActive = true;
            $femmeActive = false;
            $name = "Homme";
        }elseif($page == "femme"){
            $hommeActive = false;
            $femmeActive = true;
            $name = "Femme";
        }
    }
    if (empty($_SESSION)){
        $connect = false;
    }else{
        $connect = true;
    }
    ?>
    <style>
        body{
            display: flex;
            flex-direction: column;
            margin: 0;
            padding: 0;
            z-index: 1;
            font-family: Arial;
            overflow-x: hidden;
        }
        #header {
            background-color: black;    
            height: 9vh;
            z-index: 1;
        }
        #menu {
            background-color: hsl(0, 0%, 20%);    
            height: 7vh;
            z-index: 0;
        }
        .footer{
            justify-content:end;
            height: 20vh;
            background-color: black;
            flex-direction: row;
            margin-top:6vh;
            width: 100%;
        }
        #header, #menu{
            position: relative;
            display: flex;
            flex-direction: row;
            width: 100%;
        }
        #header>a, #header>img, #header>input, #menu>a{
            flex-grow: 1;
        }
        .button, #menu>a{
            text-align: center;         
            text-decoration: none;
            font-family: Arial;
            color: white;
            z-index: 1;
        }
        #header>a:hover:not(.active){
            background-color: hsl(0, 0%, 30%);
            color: black;
        }
        #header>a:focus{
            background-color: hsl(0, 0%, 20%);

        }
        #menu>a:hover{
            background-color: gray;
            color: black;
        }
        #header>input{
            flex-basis:50%;
            border-radius: 50px;
            padding-left: 2vw;
            padding-right: 1vw;
            margin: 2vh 2vh;
            font-size: 2vh;
            color: black;
        }
        .button{
            height: 100%;
            text-align: center;         
            text-decoration: none;
            font-family: Arial;
            border: none;
            color: white;
            z-index: 2;
            width: 10vw;
        }
        .button div{
            display: flex;
            flex-direction: column;
            text-align: center;     
            justify-content: center; 
        }
        .active{
            background-color: hsl(0, 0%, 20%)
        }
        #buttonCompte{
            background-color: black; 
            font-family: Arial;
            cursor: pointer;
            border: none;
            color: white;
        }
        #buttonCompte2{
            z-index: 0;
            pointer-events: none;
        }
        #menu_compte{
            display: flex;
            height: fit-content;
            z-index: 2;
            justify-content: center;
            align-items: center;
            overflow: visible;
        }
        #buttonMonCompte{
            z-index: 2;
        }
        #menu_compte_div{
            width: fit-content;
            background-color: whitesmoke;
            display: flex;
            flex-direction: column;
            border: solid 2px black;
            z-index: 4;
        }
        .menu_button{
            display: flex;
            flex-grow: 1;
            height: 7vh;
            width: 21vw;
            font-size: 2vh;
            font-family: Arial;
            color: black;
            text-decoration: none;
            justify-content: left;
            padding-left: 2vw;
            align-items: center;
        }
        .menu_button:hover{
            background-color: hsl(0, 0%, 80%);
        }
        .article{
            display: flex;
            flex-direction: column;
            height: 50vh;
            width: 15vw;
            background-color: whitesmoke;
            margin: 0 20px;
        }
        .article_box{
            display: flex;
            width: 100%;
        }
        a.article_box {
            height: 75%;
        }
        div.article_box{
            flex-direction: column;
            height: 25%;
            background-color: white;
        }
        .article_name{
            display: flex;
            flex-direction: column;
            width: 100%;
            flex-grow: 1; 
        }
        .article_name>p{
            margin: 4px 0;
        }
        .article_div{
            display: flex;
            flex-direction: row;
            height: 100vh;
            width: 100vw;
        }
        .article_img{
            width: 47%;
            height: 100vh;
            margin: 0;
        }
        .info_article{
            display: flex;
            flex-direction: column;
            width: 47%;
            height: 100vh;
            margin: 0;
        }
        .info_article>form{
            flex-grow: 1;
        }
        .size_select{
            height: fit-content;
            width: 100%;
            margin: 20px 0;
        }
        .add_order{
            height:25px;
            width: 75%;
        }
        .input_select{
            height: 25px;
            width: 75%;
        }
        .no_article{
            width: 70vw;
            height: fit-content;
            margin: 5vh auto;
            flex-direction: column;
            text-align: center;
            justify-content: center;
            border: solid 3px black;
            padding: 3vh;
        }
        .quote{
            display: flex;
            font-size: 4vh;
            width: 100%;
            text-align: center;
            justify-content: center;
            margin: 2vh auto;
        }
        a.quote{
            font-size: 2vh;
            background-color: black;
            width: 45%;
            color: white;
            text-decoration: none;
            height: 15%;
            line-height: 6vh;
            justify-content: center;
            border: 2px solid black;
        }
        a.quote:hover{
            background-color: whitesmoke;
            color: black;
            border: 2px solid black;
        }
        .img{
            width: 80%;
            height: 100%;
            margin: auto;
            background-color: gray;
        }
    </style>
</head>
<body>
    <header>
        <nav id='header'>
            <a href="?page=accueil"><img src="https://picsum.photos/150/50"></a>
            <?php
            if (!$hommeActive){
                echo '<a href="?page=homme" id="buttonHomme" class="button"><h1>Homme</h1></a>';
            } else {
                echo '<a href="?page=homme" id="buttonHomme" class="active button"><h1>Homme</h1></a>';
            }
            if (!$femmeActive){
                echo'<a href="?page=femme" id="buttonFemme" class="button"><h1>Femme</h1></a>';
            } else {
                echo'<a href="?page=femme" id="buttonFemme" class ="active button"><h1>Femme</h1></a>';
            }
            ?>
            <input type='search' placeholder="Rechercher">
            <div id="buttonCompte" class="button">
                <h1 id="buttonCompte2">Compte</h1>
                <nav id="menu_compte" style="display: none;">
                    <div id="menu_compte_div">
                        <a <?php if ($connect){echo 'href= "?page=deconnexion"';}else{echo 'href= "?page=user_connexion"';} ?> id="buttonMonCompte" class="menu_button"><?php if ($connect){echo 'Se déconnecter';}else{echo 'Se connecter';} ?></a>
                        <a <?php if ($connect){echo 'href= "?page=accueil"';}else{echo 'href= "?page=user_connexion"';} ?> id="buttonCommandes" class="menu_button">Commandes</a>
                    </div>
                </nav>
            </div>
            <a href="?page=panier" id="buttonPanier" class="button"><h1>Panier</h1></a>
        </nav>
        <style>
            #menu{
                z-index:0;
            }
        </style>
    </header>
    <nav id="menu">
        <a><p>Nouveautés</p></a><!-- tri les articles par récents, je peux ajouter un parametre type et date à la création d'un article qui va permettre de trier-->
        <a><p>Vêtements</p></a><!-- tri les articles par vetements-->
        <a><p>Chaussures</p></a><!-- tri les articles par chaussures-->
        <a><p>Accessoires</p></a><!-- tri les articles par accessoires-->
    </nav>
    
    