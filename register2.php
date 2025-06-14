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
      \Libraries\Http::redirect('login');
    }
}

$pageTitle = "S'inscrire dans le Blog";

\Libraries\Renderer::render('articles/register', compact('pageTitle'));