<?php

namespace App\Manager;

use App\Entity\Post;

class PostManager extends BaseManager
{
    /**
     * @return Post[]
     */
    public function getAllPosts(): array
    {
        $query = $this->pdo->query("select * from Posts");

        $posts = [];

        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            $posts[] = new Post($data);
        }

        return $posts;
    }

    public function insertPost(Post $post) {
        $query = $this->pdo->prepare("INSERT INTO Posts (content,author) VALUES (:content,:username)");
        $query->bindValue("content", $post->getContent(), \PDO::PARAM_STR);
        $query->bindValue("username", $_SESSION["username"], \PDO::PARAM_STR);
        $query->execute();
    }

    // Partager un post

    // Modifier un poste
}
