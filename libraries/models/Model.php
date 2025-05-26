<?php

namespace Models;

use PDO;

require_once "libraries/database.php";
//ce fichier doit contenir les classes que tous les models vont avoit...
abstract class Model
{
    // private $pdo;
    //utilisation de l'encapsulation: car lorsque une propriete est privee, mme si elle herite elle ne dois pas donner
    protected $pdo;
    protected $table;

    public function __construct() // il s'agit d une fonction constructeur... des que on appelle une fonction, elle reagit directement
    {
        $this->pdo = getPdo();
    }


    public function findAll()
    {
        // $pdo = getPdo();
        $sql = "SELECT * FROM {$this->table}";
        $query = $this->pdo->prepare($sql);
        $query->execute();
        $articles = $query->fetchAll(PDO::FETCH_ASSOC);
        return $articles;
    }
}
