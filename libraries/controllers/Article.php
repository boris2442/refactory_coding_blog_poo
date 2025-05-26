<?php
require_once 'libraries/utils.php';
require_once 'libraries/database.php';
require_once 'libraries/models/Article.php';
require 'vendor/autoload.php'; // Assurez-vous que le chemin est correct
use JasonGrimes\Paginator;

class Article
{
    // protected $pdo;
    // public function __construct(PDO $pdo)
    // {
    //     $this->pdo = $pdo;
    // }    
    public function index()
    {
        // Montrer la liste des articles
        // Assurez-vous que la fonction getPdo() est définie dans votre fichier database.php
        $pdo = getPdo();
      
       // = getPdo(); // Assurez-vous que $this->pdo est défini pour les méthodes de la classe



        // $userModel=new User();
        // $user=$userModel->findAllArticles();
        // var_dump($user);
        // die();
        $itemsPerPage = 5; //nbre article par page
        $currentPage = $_GET['page'] ?? 1; //page actuelle

        $totalQuery = $pdo->query("SELECT COUNT(*) FROM articles");
        $totalItems = $totalQuery->fetchColumn(); //recupere le nombre Total  d articles 
        $offset = ($currentPage - 1) * $itemsPerPage;

        //recuperation des articles dans la database...
        $model = new \Models\Article();
        $articles = $model->getArticlesPaginated($pdo, $itemsPerPage, $offset);

        $paginator = new Paginator(
            $totalItems,
            $itemsPerPage,
            $currentPage,

            '?page=(:num)'

        );
        $pageTitle = 'Accueil du Blog';
        render('articles/index', compact('pageTitle', 'articles', 'paginator'));
    }




    public function show($id)
    {
        // Montrer un article
    }
    public function delete() {}
    public function create()
    {
        // Créer un article
    }
    // protected $pdo;

    // public function __construct(PDO $pdo)
    // {
    //     $this->pdo = $pdo;
    // }

    // public function findAllArticles(): array
    // {
    //     $sql = "SELECT * FROM articles ORDER BY created_at DESC";
    //     $query = $this->pdo->prepare($sql);
    //     $query->execute();
    //     return $query->fetchAll(PDO::FETCH_ASSOC);
    // } 
}
