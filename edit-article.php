<?php
// 1-Démarre une nouvelle session ou reprend une session existante
session_start();

// 2Inclut le fichier de connexion à la base de données
require_once 'libraries/database.php';
// require_once 'libraries/utils.php';
$pdo = \Database::getPdo();

if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $sql = "SELECT*FROM `articles` WHERE id=:id";
    $requete = $pdo->prepare($sql);
    $requete->bindParam(':id', $id);
    $requete->execute();
    $article = $requete->fetch();


    //renommer les donnees dans la database

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //verification de la taille du tiitre de l article
        if (strlen($_POST['title']) > 30 || empty($_POST['title'])) {
            $errors = 'title non valide ';
        }
        if (strlen($_POST['introduction']) > 30 || empty($_POST['introduction'])) {
            $errors['introduction'] = 'title non valide ';
        }
        if (strlen($_POST['content']) > 500 || empty($_POST['content'])) {
            $errors['content'] = 'title non valide ';
        }
        if (empty($errors)) {
            //echo "ok";
            $sql = "UPDATE `articles` SET title=:title,  introduction=:introduction, content=:content WHERE id=:id";
            $requete = $pdo->prepare($sql);
            $requete->bindValue(':title', $_POST['title']);

            $requete->bindValue(':introduction', $_POST['introduction']);
            $requete->bindValue(':content', $_POST['content']);
            $requete->bindValue(':id', $id);
            $requete->execute();
            \Http::redirect('admin.php');
        } else {
            echo "<pre>";
            var_dump($errors);
            echo "</pre>";
        }
    }
}

$pageTitle = "Éditer un article";

\Renderer::render('admin_dashboarddddddddddddddddd/admin_dashboarddddddddddddddddd_edit', compact('pageTitle', 'article'));
