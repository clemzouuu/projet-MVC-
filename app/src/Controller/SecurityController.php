<?php

namespace App\Controller;

use App\Entity\User;
use App\Factory\PDOFactory;
use App\Manager\UserManager;
use App\Route\Route;

class SecurityController extends AbstractController
{
    #[Route('/logged', name: "logged", methods: ["POST"])]
    public function logged()
    {
        $formUsername = $_POST['username'];
        $formPwd = $_POST['password'];
        $userManager = new UserManager(new PDOFactory());
        $user = $userManager->getByUsername($formUsername);

        if (!$user) {
            header('Location: /login');
            exit;
        }

        if ($user->passwordMatch($formPwd)) {
            header('Location: /logged-success');
            exit;
        }

        header('Location: /logged-success');
        exit;
    }



    #[Route('/', name: "logged", methods: ["GET"])]
    public function loggedUser()
    {
        $this->render("/quickie.php", ["titre" => "Quickie",
            "content" => 'Partagez votre ressenti !😊'], "Page utilisateur");
    }

    #[Route('/register', name: "register", methods: ["GET"])]
    public function registerPage()
    {
        $this->render("/register.php", [], "Créer un compte");
    }

    #[Route('/register-new-user', name: "register", methods: ["POST"])]
    public function registerNewUser()
    {

        $username = $_POST['username'];
        $password = $_POST["password"];
        $email = $_POST['email'];
        $userManager = new UserManager(new PDOFactory());
        $newUser = new User();
        $newUser->setUsername($username);
        $newUser->setPassword($password);
        $newUser->setEmail($email);
        $userManager->insertUser($newUser);
        header('Location: /login');

    }
}
