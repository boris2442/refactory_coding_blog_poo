<?php
/**
 * Retourne une connexion a la database
 * @return PDO
 */
function getPdo():PDO
{
    $pdo = new PDO('mysql:host=localhost; dbname=blogphp-2025.sql; charset=utf8', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //quand il ya une erreur  je veux que tu affiches
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC //on doit exploiter les donees sous forme de tableau associatif
    ]);
    return $pdo;
}

/**
 * retourne la listes des articles classes par la date de creation
 * @return array
 */
function getArticlesPaginated(PDO $pdo, int $limit, int $offset): array
{
    $sql = "SELECT * FROM articles ORDER BY created_at DESC LIMIT :limit OFFSET :offset";
    $query = $pdo->prepare($sql);
    $query->bindParam(':limit', $limit, PDO::PARAM_INT);
    $query->bindParam(':offset', $offset, PDO::PARAM_INT);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

