<?php
require_once 'libraries/database.php';
require_once 'libraries/utils.php';
$pdo = \Database::getPdo();

// 1--On affiche le titre autre

$pageTitle ='page users'; 
\Libraries\Renderer::render('users_dddddddddddddddd/usersddddddddddddddddd', compact('pageTitle'));