<?php
$host = '51.158.59.186:14301';
$db   = 'ls';
$user = 'phppex';
$pass = 'Supermotdepasse!42';

$pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
$no_article_display = "flex";
$no_session_display = "flex";
if (!empty($_SESSION)){
    $panier = $pdo->prepare("SELECT * FROM panier WHERE id = ?");
    $panier->execute(array($_SESSION['id']));
    $no_session_display = "none";
    while ($row = $panier->fetch(PDO::FETCH_ASSOC)){
        if (!empty($row["elemnts"])) {
            $no_article_display = "none";
        } else {
            $no_article_display = "flex";
        }
    }
} else {
    $no_article_display = "flex";
    $no_session_display = "flex";
}

?>
<div style="display: <?php echo $no_article_display ?>" class="no_article">
    <h1 class="quote">Remplissez votre panier</h1>
    <a class="quote" href="?page=accueil">Continuer mes achats</a>
    
    <h1 style="display: <?php echo $no_session_display ?>" class="quote">Ou si vous n'êtes pas connecté,</h1>
    <a style="display: <?php echo $no_session_display ?>" class="quote" href="?page=user_connexion">Se connecter</a>
</div>

<div id="chaussureNike" class="articleList">
    <h1 style="margin: 3vh 3vh;">Pourrait vous plaire</h1>
    <div style="display: flex; flex-direction: row;">
        <article class="article">
            <a href="?page=article" class="article_box"></a>
            <div class="article_box">
                <div class="article_name">
                    <p class="label_name">Marque</p>
                    <p class="article_title">Nom de l'article</p>
                </div>
                <p>30$</p>
            </div>
        </article>
        <article class="article">
            <a href="?page=article" class="article_box"></a>
            <div class="article_box">
                <div class="article_name">
                    <p class="label_name">Marque</p>
                    <p class="article_title">Nom de l'article</p>
                </div>
                <p>30$</p>
            </div>
        </article>
    </div>
    <!-- Exemple de cas d'utilisation d'alpine js si la database est rempli et que je souhaite ajouter des articles d'un coup sans ajouter 1 par 1
    <php 
    $recupArticles->execute(array('homme', 'chaussure'));  
    $results = "";
    if ($recupArticles->rowCount()>0){
        $results = json_decode(['name'], true)
    }
    ?>
    <div x-data="{
        articles: <php echo $results ?>-> dans l'idée cela ressemblerait a peu pres à([name: 'Nike1':, name: 'Nike2', name: 'Nike3', name:'Nike4'])
    }">
        <template x-for="(article, name) in articles">
            <article class="article" x-text="(index + 1) + ' ' + article">
                <div x-text="article['name']"></div>
                etc...
            </article>
        </template>
    </div>
    -->
</div>