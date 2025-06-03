<?php
session_start();
require_once 'vendor/autoload.php';
$controller = new \Controllers\Comment();
$controller->insert();