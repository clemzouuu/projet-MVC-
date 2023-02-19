<?php

namespace App\Controller;

use App\Factory\PDOFactory;
use App\Manager\PostManager;
use App\Entity\Post;
use App\Route\Route;

class PostController extends AbstractController
{

    // Prend la route, lui donne un nom et attribue une méthode
    #[Route('/home', name: "Homepage", methods: ["GET"])]
    public function home()
    {
        $manager = new PostManager(new PDOFactory());
        $posts = $manager->getAllPosts();

        // Array sert à prendre des parametres et les afficher dans quickie.php
        // Permet de faire passer des variables du "back" à la vue
        $this->render("home.php", [
            "posts" => $posts,
            "title" => "Quickie",
            "subtitle" => 'Partagez votre pensée !'
        ], "Tous les posts");


    }

    #[Route('/insert-new-post', name: "Homepage", methods: ["POST"])]
    public function insertNewPost() {
        $content = $_POST['content'];
        $postManager = new PostManager(new PDOFactory());
        $newPost = new Post();
        $newPost->setContent($content);
        $postManager->insertPost($newPost);
        header('Location: /home');
    }






    /**
     * @param $id
     * @param $truc
     * @param $machin
     * @return void
     */

}


