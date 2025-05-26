<?php
session_start();
require_once 'libraries/controllers/Article.php';
$controller = new \Controllers\Article();
$controller->show();
// require_once 'libraries/models/Comment.php';
// $commentModel = new \Models\Comment();
// require_once 'libraries/database.php';
// $pdo = getPdo();
// require_once 'libraries/utils.php';
// require_once 'libraries/models/Article.php';
// $errors = [];
// $article_id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
// if (!$article_id || $article_id === NULL) {
//   $errors['article_id'] = 'Parametre id non valide';
// }
// $model=new \Models\Article();
// $article =$model-> findArticle($article_id);

// $commentaires = $commentModel->findAllComments($article_id);

// //recuperation des articles dans la datyabase...
// $model=new \Models\Article();
// $articles=$model->findAll();


// // 1--On affiche le titre autre

// $pageTitle = 'Articles du Blog';

// render('articles/show', compact('pageTitle', 'commentaires', 'article', 'article_id'));
