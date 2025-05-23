<?php
// src/Controller/SecurityController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends AbstractController
{
    //Route pour la page de connexion
    #[Route('/login', name: 'login')]
    public function index() : Response
    {
        return $this->render('/login/login.html.twig', [
          'controller_name' => 'LoginController',
        ]);
    }
    //Route pour la déconnexion
    #[Route('/logout', name: 'logout')]
    public function logout(): void
    {
        // controller can be blank: it will never be executed!
        throw new \Exception('Don\'t forget to activate logout in security.yaml');
    }
}