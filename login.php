<?php
session_start();
require_once 'libraries/database.php';
require_once 'libraries/renderer.php';
// require_once 'libraries/utils.php';
$pdo = Database::getPdo();


if (isset($_POST['login'])) {
    $errors = [];
    if (!empty($_POST['email']) && !empty($_POST['password'])) {

        // Vérification des informations de connexion
        $query = "SELECT * FROM users
      WHERE (email = :email OR username =:email)";
        $query = $pdo->prepare($query);
        $query->execute([
            'email' => $_POST['email'],
            'password' => $_POST['password']
        ]);
        $user = $query->fetch();
        // echo"<pre>";
        // print_r($user);
        // echo"<pre>";
        // die();

        // Si les informations de connexion sont correctes, on crée une session et on redirige vers la page d'accueil de l'admin ou l'utilisateur

        if ($user && password_verify($_POST['password'], $user['password'])) {
            $_SESSION['role'] = $user['role'];
            $_SESSION['auth'] = $user;


            // Redirection en fonction du rôle
            switch ($user['role']) {
                case 'admin':
                    header("Location: admin.php");
                    break;

                default:
                    header("Location: users.php");
                    break;
            }
        } else {
            $errors[] = "Email ou mot de passe incorrect.";
        }
    } else {
        $errors[] = "Tous les champs doivent être remplis.";
    }
}



// 1-On affiche le titre

$pageTitle = "Se connecter dans le Blog";
\Renderer::render('articles/login', compact('pageTitle'));
