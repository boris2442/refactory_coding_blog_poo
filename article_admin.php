<?php
session_start();
require_once 'libraries/database.php';
require_once 'libraries/utils.php';
// require_once 'libraries/model/Article.php';
require_once 'libraries/autoload.php';
$pdo = getPdo();
$errors = [];
$article_id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$article_id || $article_id === NULL) {
    $errors['article_id'] = 'Parametre id non valide';
}

$model = new \Models\Article();
$article = $model->findArticle($article_id);


//recuperation des articles dans la datyabase...
$model = new \Models\Article();
$articles = findAll();
$pageTitle = 'Articles du Blog';
render('admin_dashboarddddddddddddddddd/admin_show', compact('pageTitle', 'articles', 'article'));
