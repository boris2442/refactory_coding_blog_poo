<?php
spl_autoload_register(function ($classname) { //enregistrer une nouvelle facon de charger les classes
    $classname = str_replace('\\', '/', $classname);
    var_dump($classname);
    require_once("libraries/$classname.php");
});
