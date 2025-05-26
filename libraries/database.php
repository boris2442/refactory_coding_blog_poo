<?php
// $pdo=Database::getPdo(); //ici, il s'agit d'une methode statique, on peut l'appeler sans instancier la classe Database
class Database
{
    /**
     * Retourne une connexion a la database
     * @return PDO
     */
 public static  function getPdo(): PDO
    {
        $pdo = new PDO('mysql:host=localhost; dbname=blogphp-2025.sql; charset=utf8', 'root', '', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //quand il ya une erreur  je veux que tu affiches
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC //on doit exploiter les donees sous forme de tableau associatif
        ]);
        return $pdo;
    }
}
