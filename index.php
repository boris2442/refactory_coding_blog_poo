<?php
require_once 'libraries/database.php';
require_once 'libraries/utils.php';
require_once 'libraries/models/Article.php';
$pdo=getPdo();
require 'vendor/autoload.php';

use JasonGrimes\Paginator;

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



// 1--On affiche le titre autre

$pageTitle = 'Accueil du Blog';

// // 2-Debut du tampon de la page de sortie

// ob_start();

// // 3-inclure le layout de la page d' accueil
// require_once 'layouts/articles/index_html.php';

// //4-recuperation du contenu du tampon de la page d'accueil
// $pageContent = ob_get_clean();

// //5-Inclure le layout de la page de sortie
// require_once 'layouts/layout_html.php';
render('articles/index', compact('pageTitle', 'articles', 'paginator'));