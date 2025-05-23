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
  <link rel="stylesheet" href="./layouts/style.css">
  <link rel="stylesheet" href="./layouts/paginate.css">
  <title>Cours blog PHP 2024 - <?= $pageTitle ?> </title>
</head>

<body>
  <header>
    <div class="logo">
      <h2>
        <a href="http://localhost/php-2025/cours-php/blogphp-2025/">Blog-2025
        </a>
      </h2>
    </div>

    <nav>
      <ul>
        <?php if (isset($_SESSION['auth'])) : ?>
          <li><a id="gcu" href="logout.php">Se deconnecter</a></li>
        <?php else : ?>
          <li><a id="lien-header" href="register.php">S'inscrire</a></li>
          <li><a href="login.php">Se connecter</a></li>
        <?php endif; ?>
      </ul>
    </nav>

  </header>

  <div class="main">
  <?php if (!empty($errors)) : ?>
      <div >
        <ul>
          <?php foreach ($errors as $error) : ?>
            <li><?= $error ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>
    <?= $pageContent ?>
  </div>
</body>

</html>