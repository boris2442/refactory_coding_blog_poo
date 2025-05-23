<section style="display: flex; flex-direction:column;  justify-content:center; align-items:center">

    <h1 style="width:90vw ;">creer un article</h1>

    <form action="" method="post" style="width:100%;" id="form"
        enctype="multipart/form-data">
        <div class="form-control">
            <label for="username">Titre de l'article</label>
            <input type="text" id="title" placeholder="Le developpement mobile" name="title" autocomplete="off" required>
        </div>
        <div class="" hidden>
            <label for="slug">slug</label>
            <input type="text" placeholder="Le developpement mobile" name="slug" autocomplete="off">
        </div>


        <div class="form-control">
            <label for="text">introduction</label>
            <input required type="text" id="text" placeholder="L'introduction de l'article" name="introduction">
        </div>
        <div class="form-control">
            <label for="content">Contenu de l'article</label>
            <textarea name="content" id="content" placeholder="contenu de l'article" style="resize: none; height: 100px; width:70%; border-radius:7px; " required></textarea>
        </div>
        <div class="form-control">
            <input type="submit" name="add-article" class="btn" style="  width: 70%;
  padding: var(--sp-sm);
  font-size: var(--fs-6);
  background: var(--color-first);
  color: var(--color-white);
  border: none;
  border-radius: var(--radius);
  cursor: pointer;" value="creer l'article" />
        </div>

    </form>
</section>
<section>
    <h2>Listes des articles!!!</h2>
    <div
        class="article-grid">
        <?php
        foreach ($articles as $article): ?>
            <div class="article">
                <h2><?= $article['title'] ?></h2>
                <small> <?= $article['introduction'] ?></small>
                <div class="link" style="display: flex; gap:10px;">
                    <div class="">
                        <a href="article_admin.php?id=<?= $article['id'] ?>">Voir plus</a>
                    </div>
                    <div class="">
                        <a href="edit-article.php?id=<?= $article['id'] ?>">editer</a>
                    </div>
                    <div class="">

                        <a onClick="return confirm('Voulez-vous vraiment supprimer cet article ?')" ; href="delete-article.php?id=<?= urlencode($article['id']) ?>">supprimer</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?= $paginator?>
</section>