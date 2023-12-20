<?php
    $hommeActive = true;
    $femmeActive = false;
    
    //$host = '51.158.59.186:14301';
    //$db   = 'ls';
    //$user = 'phppex';
    //$pass = 'Supermotdepasse!42';
    //$pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    //$recupArticles = $pdo->prepare("SELECT * FROM article WHERE gender = ? and type = ?");
?>
<h1 style="margin: 5vh 3vh;">Articles pour Homme</h1>
<div id="chaussureNike" class="articleList">
    <h1 style="margin: 3vh 3vh;">À la une chez les Hommes</h1>
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