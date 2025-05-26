<?php
// require_once 'libraries/database.php';
require_once 'libraries/models/Model.php';
class Comment extends Model
{

    public function findAllComments(int $article_id): array
    {
        // $pdo = getPdo();
        // $this->pdo;
        $sql = "SELECT comments.*, users.username FROM
 comments
 JOIN users ON comments.user_id=users.id
  WHERE article_id=:article_id";
        $requete = $this->pdo->prepare($sql);
        $requete->bindValue(':article_id', $article_id);
        $requete->execute();
        $commentaires = $requete->fetchAll(PDO::FETCH_ASSOC);
        return $commentaires;
    }

    public function insertComment(
        string $content,
        int $article_id,
        int $user_auth
    ): void {
        // $pdo = getPdo();
        // $this->pdo;
        $query = $this->pdo->prepare("INSERT INTO `comments` (content, article_id, user_id, created_at)  VALUES (?,?,?, NOW())");
        $query->execute([
            $content,
            $article_id,
            $user_auth
        ]);
       
    }
}
