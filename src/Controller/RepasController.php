<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RepasController extends AbstractController
{
    // Route pour afficher la page des frais autres
    #[Route('/repas', name: 'repas')]
    public function index(): Response
    {
        return $this->render('/page/repas.html.twig', [
            'controller_name' => 'RepasController',
        ]);
    }

    // Route pour la déconnexion
    #[Route('/logout', name: 'logout')]
    public function logout(): void
    {
        throw new \Exception('N\'oubliez pas d\'activer la déconnexion dans security.yaml');
    }
}