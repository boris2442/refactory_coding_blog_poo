<?php
require_once "libraries/database.php";
//ce ichier doit contenir les classes que tous les models vont avoit...
class Model
{
    protected $pdo;
    public function __contruct()
    {
        $this->pdo = getPdo();
    }
}
