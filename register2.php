<?php
session_start();
require_once 'libraries/database.php';
// require_once 'libraries/utils.php';
// $pdo=getPdo();
$pdo = \Database::getPdo();
if (isset($_POST['register'])) {
  
    $errors = [];

    // Pseudo--------------------------------
    if (empty($POST['username']) || !preg_match("#^[a-zA-Z0-9]+$#", $_POST['username'])) {

        $errors['username'] = "Pseudo non valide";
    } else {

        $query = "SELECT * FROM users WHERE username = ?";
        $req = $pdo->prepare($query);
        $req->execute([$_POST['username']]);

        if ($req->fetch()) {
            $errors['username'] = "Ce pseudo n'est plus disponible";
        }
    }

    // Email---------------------------------------
    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Email non valide";
    } else {
      
        $query = "SELECT * FROM users WHERE email = ?";
        $req = $pdo->prepare($query);
        $req->execute([$_POST['email']]);
        if ($req->fetch()) {
            $errors['email'] = "Cet email est déjà pris";
        }
    }

    // Password-----------------------------------------
    if (empty($_POST['password'])) {
        $errors['password'] = "Vous devez entrer un mot de passe ";
    } else if ($_POST['password'] !== $_POST['confirm_password']) {
        $errors['password'] = "Votre mot de passe ne correspond pas !";
    }

    // INSERT INTO------------------------------------------
    if (empty($errors)) {
        $query = "INSERT INTO users(username,email,password) VALUES(?,?,?)";
        $req = $pdo->prepare($query);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $req->execute([$_POST['username'], $_POST['email'], $password]);
        var_dump($req);
        die();
        // On redirige vers la page de login

        // header("Location: login");
        // exit();
        \Http::redirect('login');
    }
}





// 1-On affiche le titre

$pageTitle = "S'inscrire dans le Blog";

// 2-Debut du tampon de la page de sortie

// ob_start();

// // 3-inclure le layout de la page register
// require_once 'layouts/articles/register_html.php';

// //4-recuperation du contenu du tampon de la page register
// $pageContent = ob_get_clean();

// //5-Inclure le layout de la page de sortie
// require_once 'layouts/layout_html.php';
\Renderer::render('articles/register', compact('pageTitle'));