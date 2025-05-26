<?php
namespace Controllers;            
namespace Comments;            
session_start();
require_once 'libraries/database.php';
require_once 'libraries/utils.php';
require_once 'libraries/models/Article.php';
require_once 'libraries/models/Comment.php';
$pdo = getPdo();

if (!isset($_SESSION['auth']['id'])) {
  header('location: login.php');
  exit();
}

$user_auth = $_SESSION['auth']['id'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


  $content = htmlspecialchars($_POST['content'] ?? '');

 
  $article_id = intval($_POST['article_id'] ?? null);
  
  $model=new \Models\Article();
  $articleExists =$model->articleSelect($article_id);
  //insertion du commentaire

  if (!$articleExists) {
    $errors['article_id'] = 'L\'article n\'existe pas';
  }
  if (empty($content)) {
    $errors['content'] = 'Le contenu du commentaire ne peut pas être vide';
  }
  if (empty($article_id) || $article_id === null) {
    $errors['article_id'] = 'L\'ID de l\'article est invalide';
  }
  $model=new \Models\Comment();
    $model->insertComment(
    $content,
    $article_id,
    $user_auth
  );

  redirect("index.php");
}

