<?php
require_once '../database.php';
class Article
{
    public function findAllArticles()
    {
        $pdo = getPdo();
        $sql = "SELECT * FROM articles ORDER BY created_at DESC ";
        $query = $pdo->prepare($sql);
        $query->execute();
        $articles = $query->fetchAll(PDO::FETCH_ASSOC);
        return $articles;
    }
    public //recuperation d'un seul article
    function findArticle(int $article_id): array
    {
        $pdo = getPdo();
        $sql = "SELECT*FROM ARTICLES WHERE id=:article_id";
        $query = $pdo->prepare($sql);
        $query->execute(compact('article_id'));
        $article = $query->fetch();
        return $article;
    }
    //function de suppression d'un articles
    public function deleteArticle($id)
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
}
