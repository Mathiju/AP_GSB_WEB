<?php

namespace App\Controller;

use Doctrine\DBAL\ConnectionException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Mapping\MetadataInterface;

class HomeController extends AbstractController
{
    
    #[ Route("/home", name:"home")] // Route principale pour la page d'accueil
     
    public function index(): Response
    {
        // Affiche la vue Twig associée à la page d'accueil
        return $this->render('home/home.html.twig', [
            'controller_name' => 'HomeController',
        ]);
        // Symfony gère automatiquement la déconnexion via le firewall, cette méthode peut être vide.
        // Assurez-vous d'avoir configuré la déconnexion dans security.yaml.
    }
}
