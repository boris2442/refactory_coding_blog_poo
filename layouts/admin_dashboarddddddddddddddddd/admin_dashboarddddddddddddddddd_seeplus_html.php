<h1><i>partie administrateur dashbord</i></h1>
<h1>Listes des articles</h1>

<hr>
<div>
  <?php
  foreach ($articles as $article): 
    ?>
    <div>
    <h2> <?= htmlspecialchars($article['title']) ?> </h2>

    <p> <?= htmlspecialchars($article['introduction']) ?> </p>

    <a href="article.php?id=<?= urlencode($article['id']) ?>">Voir plus</a>
    <a href="edit-article.php?id=<?= urlencode($article['id']) ?>">editer</a>
    <a onClick="return confirm('Voulez-vous vraiment supprimer cet article ?')"; href="delete-article.php?id=<?= urlencode($article['id']) ?>" >supprimer</a>
    
    </div>
    <hr>
  <?php endforeach; ?>
</div>


