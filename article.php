<?php
session_start();
// require_once 'libraries/controllers/Article.php';
require_once 'libraries/autoload.php'; 
$controller = new \Controllers\Article();
$controller->show();
