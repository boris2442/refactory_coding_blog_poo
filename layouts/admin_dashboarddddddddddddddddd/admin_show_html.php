<section>
    <div>
        <h1 class="article-title"><?= $article['title'] ?></h1>
        <h3><?= $article['introduction'] ?></h3>
        <p><?= $article['content'] ?></p>
        <p> <em>Publié le : <?= $article['created_at'] ?></em></p>
        <p>Mis à jour le : <?= $article['updated_at'] ?></p>
      
        <form action="" class="form">
            <button> <a href="admin.php" style="color:white ;text-decoration:none" ;>Retour</a></button>
        </form>
    </div>
</section>