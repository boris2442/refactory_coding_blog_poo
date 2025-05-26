<?php
require_once "libraries/database.php";
//ce ichier doit contenir les classes que tous les models vont avoit...
class Model
{
    // private $pdo;
    //utilisation de l'encapsulation: car lorsque une propriete est privee, mme si elle herite elle ne dois pas donner
    protected $pdo;
    
    public function __contruct()
    {
        $this->pdo = getPdo();
    }


     public function findAllArticles()
    {
        // $pdo = getPdo();
        $sql = "SELECT * FROM {$this->table} ";
        $query = $this->pdo->prepare($sql);
        $query->execute();
        $articles = $query->fetchAll(PDO::FETCH_ASSOC);
        return $articles;
    }
}
