<?php
session_start();
require_once 'libraries/database.php';
$pdo=getPdo();

//insertion de l'article dans la base de donnee
if (!empty($_POST)) {
    $errors = [];
    //title
    if (empty($_POST['title'])) {
        $errors['title'] = "Le titre de l'article est obligatoire";
    } elseif (strlen($_POST['title']) > 50) {
        $errors['title'] = 'Le nombre de caracteres n excede pas 50 caracteres';
    } else {
        $title = $_POST['title'];
    }
    
    //introduction
    if (empty($_POST['introduction'])) {
        $errors['introduction'] = 'introduction obligatoire';
    } elseif (strlen($_POST['introduction']) > 55) {
        $errors['introduction'] = 'introduction trop long';
    } else {
        $introduction = $_POST['introduction'];
    }
    //content

    if (empty($_POST['content'])) {
        $errors['content'] = 'content obligatoire';
    } elseif (strlen($_POST['content']) > 55) {
        $errors['content'] = 'content trop long';
    } else {
        $content = $_POST['content'];
    }

    if(empty($errors)){
        $sql="INSERT INTO `articles` (`title`, `introduction`, `content`) VALUES(?, ?,  ?)";
        $query=$pdo->prepare($sql);
        $query->execute([$title, $introduction, $content]);
 
    }else{
        echo "errreur produite";
    }
}else{
    echo "Une erreur s'est produite";
}


