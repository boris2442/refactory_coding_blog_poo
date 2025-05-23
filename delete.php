<?php
// 1-Démarre une nouvelle session ou reprend une session existante
session_start();

// 2Inclut le fichier de connexion à la base de données
require_once 'libraries/database.php';
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
    $sql="DELETE FROM  `articles` WHERE id=:id";
    $query=$pdo->prepare($sql);
    $query->bindParam('id', $id);
    $query->execute();
    header('location:index');
}