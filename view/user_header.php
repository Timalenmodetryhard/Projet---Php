<?php
if (isset($_GET['page'])){
    $page = $_GET['page'];

    if($page == "user"){
        $inscription = false;
        $connexion = false;
    }elseif($page == "user_inscription"){
        $inscription = true;
        $connexion = false;
    }elseif($page == "user_connexion"){
        $inscription = false;
        $connexion = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' href='../css/style.css'>
    <style>
        body{
            margin: 0;
        }
        .big_div{
            margin: auto;
            width: 40%;
            min-width: fit-content;
            overflow: hidden;
        }
        .menu{
            height: 6vh;
            min-width: fit-content;
            padding: 0;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
            border: solid;
        }
        .menu_button{
            display: flex;
            text-decoration: none;
            font-weight: bolder;
            height: 100%;
            font-family: Arial;
            flex-grow: 1;
            justify-content: center;
            align-items: center;
            font-size: large;
            border: none;
            color: black;
        }
        .form{
            text-align: left;
        }
        .input{
            font: 1vh Arial;
        }
        .input>input{
            height: 5vh;
            width: 95%;
            padding: 0 2%;
        }
        .submit{
            height: 6vh;
            width: 100%;
            border: none;
            background-color: black;
            color: white;
            padding: 0 2%;
        }
        #barre{
            position: relative;
            margin: 5vh 0;
            width: 100vw;
            border-bottom: solid 2px black;
        }
        .active{
            background-color: hsl(0, 0%, 80%);
        }
        .input>h1{
            margin: 2px;
        }
    </style>
</head>
<body>
    <a href="?page=accueil"><img src="https://picsum.photos/150/50"></a>
    <div id="barre"></div>
    <div class="big_div">
        <nav class="menu">
            <a class="<?php if($connexion){echo"active ";} ?>menu_button" href="?page=user_connexion">Connexion</a>
            <a class="<?php if($inscription){echo"active ";} ?>menu_button" href="?page=user_inscription">Inscription</a>
        </nav>
        <br/>