<?php
session_start();

// require_once 'libraries/controllers/Comment.php';
require_once 'libraries/autoload.php';
$controller = new \Controllers\Comment();
$controller->insert();