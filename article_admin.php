<?php
session_start();
require_once 'libraries/database.php';
require_once 'libraries/utils.php';
require_once 'libraries/model/Article.php';
$pdo=getPdo();
$errors=[];
$article_id=filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);
if(!$article_id || $article_id===NULL){
$errors['article_id']='Parametre id non valide';

}
// $sql="SELECT*FROM ARTICLES WHERE id=:article_id";
// $query=$pdo->prepare($sql);
// $query->execute(compact('article_id'));
// $article=$query->fetch();
$model=new \Models\Article();
$article=$model->findArticle( $article_id);


//recuperation des articles dans la datyabase...
// $sql="SELECT * FROM articles ORDER BY created_at DESC ";
// $query = $pdo->prepare($sql);
// $query->execute();
// $articles = $query->fetchAll(PDO::FETCH_ASSOC);
$model=new \Models\Article();
$articles=findAllArticles();



// 1--On affiche le titre autre

$pageTitle ='Articles du Blog'; 

render('admin_dashboarddddddddddddddddd/admin_show', compact('pageTitle', 'articles', 'article'));