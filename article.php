<?php
session_start();
require_once 'libraries/database.php';
$pdo = getPdo();
require_once 'libraries/utils.php';
require_once 'libraries/models/Article.php';
$errors = [];
$article_id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$article_id || $article_id === NULL) {
  $errors['article_id'] = 'Parametre id non valide';
}
$model=new Article();
$article =$model-> findArticle($article_id);



//recuperation des articles dans la datyabase...
$model=new Article();
$articles=$model->findAllArticles();


// 1--On affiche le titre autre

$pageTitle = 'Articles du Blog';

render('articles/show', compact('pageTitle', 'commentaires', 'article', 'article_id'));
