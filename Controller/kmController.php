<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class kmController extends AbstractController
{
    // Route pour afficher la page des frais kilométriques
    #[Route('/km', name: 'km')]
    public function index(): Response
    {
        return $this->render('/page/km.html.twig', [
            'controller_name' => 'KmController',
        ]);
    }

    // Route pour la déconnexion
    #[Route('/logout', name: 'logout')]
    public function logout(): void
    {
        throw new \Exception('N\'oubliez pas d\'activer la déconnexion dans security.yaml');
    }
}