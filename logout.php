<?php
session_start();
require_once 'libraries/utils.php';
session_unset();
session_destroy();
redirect('index.php');
