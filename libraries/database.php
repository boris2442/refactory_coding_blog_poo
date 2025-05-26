<?php

/**
 * Retourne une connexion a la database
 * @return PDO
 */
function getPdo(): PDO
{
    $pdo = new PDO('mysql:host=localhost; dbname=blogphp-2025.sql; charset=utf8', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //quand il ya une erreur  je veux que tu affiches
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC //on doit exploiter les donees sous forme de tableau associatif
    ]);
    return $pdo;
}

/**
 * retourne la listes des articles classes par la date de creation
 * @return array
 */
function getArticlesPaginated(PDO $pdo, int $limit, int $offset): array
{
    $sql = "SELECT * FROM articles ORDER BY created_at DESC LIMIT :limit OFFSET :offset";
    $query = $pdo->prepare($sql);
    $query->bindParam(':limit', $limit, PDO::PARAM_INT);
    $query->bindParam(':offset', $offset, PDO::PARAM_INT);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

//recuperation d'un seul article
function findArticle(int $article_id): array
{
    $pdo = getPdo();
    $sql = "SELECT*FROM ARTICLES WHERE id=:article_id";
    $query = $pdo->prepare($sql);
    $query->execute(compact('article_id'));
    $article = $query->fetch();
    return $article;
}



function findAllComments(int $article_id): array
{
    $pdo = getPdo();
    $sql = "SELECT comments.*, users.username FROM
 comments
 JOIN users ON comments.user_id=users.id
  WHERE article_id=:article_id";
    $requete = $pdo->prepare($sql);
    $requete->bindValue(':article_id', $article_id);
    $requete->execute();
    $commentaires = $requete->fetchAll(PDO::FETCH_ASSOC);
    return $commentaires;
}

function findAllArticles()
{
    $pdo = getPdo();
    $sql = "SELECT * FROM articles ORDER BY created_at DESC ";
    $query = $pdo->prepare($sql);
    $query->execute();
    $articles = $query->fetchAll(PDO::FETCH_ASSOC);
    return $articles;
}


//function de suppression d'un articles

function deleteArticle($id)
{
    $pdo = getPdo();
    $sql = "DELETE FROM  `articles` WHERE id=:id";
    $query = $pdo->prepare($sql);
    $query->bindParam('id', $id);
    $query->execute();
}

function articleSelect($article_id)
{
    $pdo = getPdo();
    $query = $pdo->prepare('SELECT COUNT(*) FROM articles WHERE id=:article_id ');
    $query->execute(['article_id' => $article_id]);
    $articleExists = $query->fetchColumn();
    return $articleExists;
}

function insertComment(
    string $content,
    int $article_id,
    int $user_auth
): void {
    $pdo = getPdo();
    $query = $pdo->prepare("INSERT INTO `comments` (content, article_id, user_id, created_at)  VALUES (?,?,?, NOW())");

    //   var_dump($article_id, $user_auth, $content);
    $query->execute([
        $content,
        $article_id,
        $user_auth
    ]);
    //redirection dans la page des articles du commentaire
    // header('location:index.php');
}
