<?php
session_start();
require_once 'libraries/database.php';
$pdo = getPdo();
require_once 'libraries/utils.php';
$errors = [];
$article_id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$article_id || $article_id === NULL) {
  $errors['article_id'] = 'Parametre id non valide';
}

$article = findArticle($article_id);



//recuperation des articles dans la datyabase...

$articles=findAllArticles();

$commentaires=findAllComments($article_id);
// 1--On affiche le titre autre

$pageTitle = 'Articles du Blog';

render('articles/show', compact('pageTitle', 'commentaires', 'article', 'article_id'));
