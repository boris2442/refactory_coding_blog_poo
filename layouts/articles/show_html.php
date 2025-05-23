<section>
    <div>
        <h1 class="article-title"><?= $article['title'] ?></h1>
        <h3><?= $article['introduction'] ?></h3>
        <p><?= $article['content'] ?></p>
        <p> <em>Publié le : <?= $article['created_at'] ?></em></p>
        <p>Mis à jour le : <?= $article['updated_at'] ?></p>


        <?php
        if (count($commentaires) === 0): ?>

            <h2 class="comment-heading">Il n'y a pas encore de commentaires pour cet article... SOYEZ LE PREMIER ! :D</h2>
        <?php else : ?>
            <h2 class="comment-heading">Il y a déjà <?= count($commentaires) ?> réactions :</h2>
            <?php foreach ($commentaires as $commentaire): ?>

                <h3 class="comment-author">Commentaire de : <?= $commentaire['username'] ?></h3>
                <small class="comment-date">creer le:<?= $commentaire['created_at'] ?></small>
                <blockquote class="comment-content">
                    <em><?= $commentaire['content'] ?></em>
                </blockquote>
                <hr>
            <?php endforeach; ?>
        <?php endif; ?>

        <!-- Formulaire de commentaire -->
        <?php if (isset($_SESSION['auth'])) : ?>
            <form method="POST" class="comment-form" action="save-comment">
                <h3 class="comment-form-heading">Vous voulez réagir ? N'hésitez pas !</h3><br>

                <textarea name="content" cols="30" rows="10" placeholder="Votre commentaire ..."
                    class="comment-form-content" style="resize: none;"></textarea><br>
                <input type="number" name="article_id" value="<?= $article_id ?>" hidden><br>
                <input type="hidden" name="user_id" value="<?= $_SESSION['auth']['id'] ?>"><br>
                <button class="comment-form-submit" type="submit">COMMENTER !</button><br>
            </form>
        <?php else :
        ?>
            <p>Veuillez vous connecter ou vous inscrire pour commenter.</p>
            <a href="register.php">S'inscrire</a> | <a href="login.php">Se connecter</a>
        <?php endif;
        ?>

    </div>

        <button> <a href="index.php" style="color:blue ;text-decoration:none" ;>Retour</a></button>

</section>