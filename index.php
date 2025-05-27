<?php
require_once "libraries/autoload.php"; 
// \Application::process();
$controller = new \Controllers\Article();
$controller-> index();
