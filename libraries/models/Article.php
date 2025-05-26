<?php
require_once "libraries/models/Model.php";
class Article extends Model{

    protected $table="articles";
//un comportement qui s'appelle des que on creent une function s'appellent le contructeur...
//ici on utilise le contructeur car $pdo est appeler dans toites nos functions...
    // public function findAllArticles()
    // {
    //     // $pdo = getPdo();
    //     $sql = "SELECT * FROM articles ORDER BY created_at DESC ";
    //     $query = $this->pdo->prepare($sql);
    //     $query->execute();
    //     $articles = $query->fetchAll(PDO::FETCH_ASSOC);
    //     return $articles;
    // }
    //recuperation d'un seul article

        public function findArticle(int $article_id): array
    {
        // $pdo = getPdo();
        $sql = "SELECT*FROM ARTICLES WHERE id=:article_id";
        $query = $this->pdo->prepare($sql);
        $query->execute(compact('article_id'));
        $article = $query->fetch();
        return $article;
    }
    //function de suppression d'un articles
    public function deleteArticle($id)
    {
        // $pdo = getPdo();
        $sql = "DELETE FROM  `articles` WHERE id=:id";
        // $query = $pdo->prepare($sql);
        $query = $this->pdo->prepare($sql);
        $query->bindParam('id', $id);
        $query->execute();
    }

    public function articleSelect($article_id)
    {
        // $pdo = getPdo();
        $query = $this->pdo->prepare('SELECT COUNT(*) FROM articles WHERE id=:article_id ');
        $query->execute(['article_id' => $article_id]);
        $articleExists = $query->fetchColumn();
        return $articleExists;
    }

    public function insertArticle($title, $slug, $introduction, $content)
    {
        // $pdo = getPdo();
        $query = $this->pdo->prepare('INSERT INTO articles (title, slug, introduction, content, created_at) VALUES (:title, :slug, :introduction, :content, NOW())');
        $query->execute(compact('title', 'slug', 'introduction', 'content'));
    }
    /**
 * retourne la listes des articles classes par la date de creation
 * @return array
 */
function getArticlesPaginated(PDO $pdo, int $limit, int $offset): array
{
    // $pdo = getPdo();
    $sql = "SELECT * FROM articles ORDER BY created_at DESC LIMIT :limit OFFSET :offset";
    $query = $pdo->prepare($sql);
    $query->bindParam(':limit', $limit, PDO::PARAM_INT);
    $query->bindParam(':offset', $offset, PDO::PARAM_INT);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

}
