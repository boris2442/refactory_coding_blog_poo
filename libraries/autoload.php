<?php
spl_autoload_register(function ($classname) { //enregistrer une nouvelle facon de charger les classes
    $classname = str_replace('\\', '/', $classname);
    require_once("libraries/$classname.php");
});
