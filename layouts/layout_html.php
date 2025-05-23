<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Blog PHP moderne pour gérer, publier et organiser facilement vos articles. Interface intuitive, fonctions d'administration, et design épuré.">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- inserer le logo de l image -->
  <link rel="icon" href="layouts/assets/logo_blog.png" type="image/png" sizes="16x16">


  <link rel="stylesheet" href="./layouts/style.css">
  <link rel="stylesheet" href="./layouts/paginate.css">
  <title>Cours blog PHP 2024 - <?= $pageTitle ?> </title>
</head>

<body>
  <header>
    <div class="logo">
      <h2>
        <a href="http://localhost/blogphp-2025/">Blog-2025
        </a>
      </h2>
    </div>

    <nav>
  <ul>
    <?php if (isset($_SESSION['auth'])): ?>
      
      <!-- L’utilisateur est connecté -->
      <?php if ($_SESSION['auth']['role'] === 'admin'): ?>
        <li><a id="lien-header" href="admin.php">Dashboard Admin</a></li>
      <?php endif; ?>
      
      <li><a id="gcu" href="logout.php">Se déconnecter</a></li>

    <?php else: ?>

      <!-- L’utilisateur n’est pas connecté -->
      <li><a id="lien-header" href="register.php">S'inscrire</a></li>
      <li><a href="login.php">Se connecter</a></li>

    <?php endif; ?>
  </ul>
</nav>


  </header>

  <div class="main">
    <?php
    if (!empty($errors)) {

      echo '<div style=" background:red; text-align:center; color:white; padding:2px 8px; font-size:25px;">'
        . reset($errors) .
        '</div>';
    }
    ?>
    <?= $pageContent ?>
  </div>
</body>

</html>