<?php
session_start();
require_once 'libraries/database.php';

$pdo = getPdo();

if (!isset($_SESSION['auth']['id'])) {
  header('location: login.php');
  exit();
}

$user_auth = $_SESSION['auth']['id'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


  $content = htmlspecialchars($_POST['content'] ?? '');

  // $article_id = $_POST['article_id'] ?? null;
  $article_id = intval($_POST['article_id'] ?? null);
  // $query = $pdo->prepare('SELECT COUNT(*) FROM articles WHERE id=:article_id ');
  // $query->execute(['article_id' => $article_id]);
  // $articleExists = $query->fetchColumn();
  $articleExists = articleSelect($article_id);
  //insertion du commentaire

  // $query = $pdo->prepare("INSERT INTO `comments` (content, article_id, user_id, created_at)  VALUES (?,?,?, NOW())");

  // var_dump($article_id, $user_auth, $content);
  // $query->execute([
  //   $content,
  //   $article_id,
  //   $user_auth
  // ]);
  insertComment(
    $content,
    $article_id,
    $user_auth
  );
  //redirection dans la page des articles du commentaire
  header('location:index.php');
}
/**
 * CE FICHIER DOIT ENREGISTRER UN NOUVEAU COMMENTAIRE EST REDIRIGER SUR L'ARTICLE !
 * 
 * On doit d'abord vérifier que toutes les informations ont été entrées dans le formulaire
 * Si ce n'est pas le cas : un message d'erreur
 * Sinon, on va sauver les informations
 * 
 * Pour sauvegarder les informations, ce serait bien qu'on soit sûr que l'article qu'on essaye de commenter existe
 * Il faudra donc faire une première requête pour s'assurer que l'article existe
 * Ensuite on pourra intégrer le commentaire
 * 
 * Et enfin on pourra rediriger l'utilisateur vers l'article en question
 */

/**
 * 1. On vérifie que les données ont bien été envoyées en POST
 * D'abord, on récupère les informations à partir du POST
 * Ensuite, on vérifie qu'elles ne sont pas nulles
 */
// 6var_dump($_SESSION['auth']['id']);
// die();


// var_dump($user_auth);
// die();
