<?php
require_once 'libraries/database.php';
require_once 'libraries/utils.php';
$pdo=getPdo();

// 1--On affiche le titre autre

$pageTitle ='page users'; 

// 2-Debut du tampon de la page de sortie
 
// ob_start();

// // 3-inclure le layout de la page d' admin
// require_once 'layouts/users_dddddddddddddddd/usersddddddddddddddddd_html.php';

// //4-recuperation du contenu du tampon de la page d'admin
// $pageContent = ob_get_clean();

// //5-Inclure le layout de la page de sortie
// require_once 'layouts/layout_html.php';
render('users_dddddddddddddddd/usersddddddddddddddddd', compact('pageTitle'));