<?php
require_once 'libraries/database.php';
require_once 'libraries/utils.php';
require_once 'libraries/models/Article.php';
// require_once 'libraries/models/User.php';
$pdo=getPdo();
require 'vendor/autoload.php';

use JasonGrimes\Paginator;

// $userModel=new User();
// $user=$userModel->findAllArticles();
// var_dump($user);
// die();
$itemsPerPage = 5; //nbre article par page
$currentPage = $_GET['page'] ?? 1; //page actuelle

$totalQuery = $pdo->query("SELECT COUNT(*) FROM articles");
$totalItems = $totalQuery->fetchColumn(); //recupere le nombre Total  d articles 
$offset = ($currentPage - 1) * $itemsPerPage;

//recuperation des articles dans la database...
$model=new Article();
$articles =$model-> getArticlesPaginated($pdo, $itemsPerPage, $offset);

$paginator = new Paginator(
  $totalItems,
  $itemsPerPage,
  $currentPage,

  '?page=(:num)'

);
$pageTitle = 'Accueil du Blog';
render('articles/index', compact('pageTitle', 'articles', 'paginator'));