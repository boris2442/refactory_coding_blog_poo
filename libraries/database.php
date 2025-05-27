<?php
// $pdo=Database::getPdo(); //ici, il s'agit d'une methode statique, on peut l'appeler sans instancier la classe Database
//Le singleton permet de limiter les connexions a la bases de donnees 
$model = new \Models\Comment();
$commentaires = $model->findALl();  // premiere connexion a mysql
$commentaire->$model->find(); //deuxieme connexion a mysql
$commentaire->$model->delete(); //troisieme connexion a mysql
class Database
{
    private static  $instance = null; //pour eviter de creer plusieurs instances de la classe Database, on utilise le singleton

    //si une propriete est statique, on l'appelle avec self
    /**
     * Retourne une connexion a la database
     * @return PDO: PHP DATA OBJECT
     */
    public static  function getPdo(): PDO
    {
        if (self::$instance == null) { //je n'est pas encore d'instance
            self::$instance = new PDO('mysql:host=localhost; dbname=blogphp-2025.sql; charset=utf8', 'root', '', [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //quand il ya une erreur  je veux que tu affiches
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC //on doit exploiter les donees sous forme de tableau associatif
            ]);
        }
        return self::$instance;
    }
}
