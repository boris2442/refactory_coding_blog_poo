<?php
session_start();
require_once 'libraries/controllers/Article.php';

$controller = new \Controllers\Article();
$controller->delete();
