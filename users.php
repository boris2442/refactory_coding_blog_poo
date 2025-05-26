<?php
require_once 'libraries/database.php';
require_once 'libraries/utils.php';
$pdo = \Database::getPdo();

// 1--On affiche le titre autre

$pageTitle ='page users'; 
\Renderer::render('users_dddddddddddddddd/usersddddddddddddddddd', compact('pageTitle'));