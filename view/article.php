<div class="article_div">
    <div class="article_img"><div class="img"></div></div>
    <div class="info_article">
        <header>
            <h1>Marque</h1>
            <h1>Nom de l'article</h1>
            <h1>prix</h1>
        </header>
        <form method="dialog">
            <div class="size_select">
                <button id="open_height" class="input_select" value="Votre taille"></button>
                <button class="input_select nav_select" value="38"><!-- je peux ajouter un paramètre taille a la création d'un article pour disposer un nombre de taille dispo. alpine js me permettra d'afficher correctemnt-->
                <button class="input_select nav_select" value="39">
            </div>
            <button class="add_order" type="button"></button>
        </form>
    </div>
</div>

<div id="chaussureNike" class="articleList">
    <h1 style="margin: 3vh 3vh;">Complétez votre look</h1>
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