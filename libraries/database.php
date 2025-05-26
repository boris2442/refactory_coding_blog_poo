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
