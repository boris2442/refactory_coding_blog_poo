<?php
require_once "./vendor/autoload.php"; // Autoload de Composer
// require_once "libraries/autoload.php"; 
// \Application::process();

$controller = new \Controllers\Article();
$controller-> index();
