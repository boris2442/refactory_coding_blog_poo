<?php

namespace Controllers;
use Libraries;
use \Libraries\Renderer;

require_once 'libraries/Database.php';
// require_once 'libraries/utils.php';
// require_once 'libraries/models/Article.php';
// require_once 'libraries/controllers/Controller.php';
require 'vendor/autoload.php'; // Assurez-vous que le chemin est correct
use JasonGrimes\Paginator;

// require_once 'libraries/models/Comment.php';

class Article extends Controller
{
    //   protected $modelName = "\Models\Article";
    protected $modelName = \Models\Article::class;
    public function index()
    {

        // $pdo = getPdo();
        $pdo = \Database::getPdo();
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
        // render('articles/index', compact('pageTitle', 'articles', 'paginator'));
        Renderer::render('articles/index', compact('pageTitle', 'articles', 'paginator'));
    }


    public function show()
    {

        $pdo = \Database::getPdo();
        $errors = [];
        $article_id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if (!$article_id || $article_id === NULL) {
            $errors['article_id'] = 'Parametre id non valide';
        }
        // $model = new \Models\Article();
        $article = $this->model->findArticle($article_id);
        $commentModel = new \Models\Comment();
        $commentaires = $commentModel->findAllComments($article_id);

        //recuperation des articles dans la datyabase...
        $model = new \Models\Article();
        $articles = $model->findAll();


        // 1--On affiche le titre autre

        $pageTitle = 'Articles du Blog';

        Renderer::render('articles/show', compact('pageTitle', 'commentaires', 'article', 'article_id'));
    }
    public function delete()
    {
        // $pdo = getPdo();

        $pageTitle = "supprimer un article";

        //supprimer un article
        if (isset($_GET)) {
            var_dump($_GET);
            $id = $_GET['id'];
            echo "<pre>";
            var_dump($id);
            echo "</pre>";

            // $model = new \Models\Article();
            $this->model->deleteArticle($id);
            \Libraries\Http::redirect('admin.php');
        }
    }
    public function create()
    {
        // Créer un article
    }
}
