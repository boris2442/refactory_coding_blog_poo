<?php
session_start();
require_once 'libraries/database.php';
require_once 'libraries/utils.php';
require_once "libraries/models/Article.php";
$pdo=getPdo();


// 3-Définit le titre de la page
$pageTitle = "supprimer un article";

//supprimer un article
if(isset($_GET)){
    var_dump($_GET);
    $id=$_GET['id'];
    echo "<pre>";
    var_dump($id);
    echo "</pre>";
    // $sql="DELETE FROM  `articles` WHERE id=:id";
    // $query=$pdo->prepare($sql);
    // $query->bindParam('id', $id);
    // $query->execute();
    $model=new Article();
    $model->deleteArticle($id);
  header('location:admin.php');
}