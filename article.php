<?php
session_start();
require_once 'libraries/database.php';
$pdo=getPdo();
require_once 'libraries/utils.php';
$errors = [];
$article_id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$article_id || $article_id === NULL) {
    $errors['article_id'] = 'Parametre id non valide';
}
$sql = "SELECT*FROM ARTICLES WHERE id=:article_id";
$query = $pdo->prepare($sql);
$query->execute(compact('article_id'));
$article = $query->fetch();

//recuperation des articles dans la datyabase...
$sql = "SELECT * FROM articles ORDER BY created_at DESC ";
$query = $pdo->prepare($sql);
$query->execute();
$articles = $query->fetchAll(PDO::FETCH_ASSOC);


$sql="SELECT comments.*, users.username FROM
 comments
 JOIN users ON comments.user_id=users.id
  WHERE article_id=:article_id";
$requete=$pdo->prepare($sql);
$requete->bindValue(':article_id',$article_id );
$requete->execute();
$commentaires=$requete->fetchAll(PDO::FETCH_ASSOC);



$requete = $pdo->prepare($sql);
$requete->bindValue(':article_id', $article_id, PDO::PARAM_INT);
$requete->execute();
$commentaires = $requete->fetchAll(PDO::FETCH_ASSOC);






// 1--On affiche le titre autre

$pageTitle = 'Articles du Blog';

render('articles/show', compact('pageTitle', 'commentaires', 'article', 'article_id'));