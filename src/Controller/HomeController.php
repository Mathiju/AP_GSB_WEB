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

    #[ Route("/homeC", name:"homeC")] // Route principale pour la page d'accueil
     
    public function indexC(): Response
    {
        // Affiche la vue Twig associée à la page d'accueil
        return $this->render('home/homeC.html.twig', [
            'controller_name' => 'HomeController',
        ]);
        // Symfony gère automatiquement la déconnexion via le firewall, cette méthode peut être vide.
        // Assurez-vous d'avoir configuré la déconnexion dans security.yaml.
    }

    #[ Route("/homeA", name:"homeA")] // Route principale pour la page d'accueil
     
    public function indexA(): Response
    {
        // Affiche la vue Twig associée à la page d'accueil
        return $this->render('home/homeA.html.twig', [
            'controller_name' => 'HomeController',
        ]);
        // Symfony gère automatiquement la déconnexion via le firewall, cette méthode peut être vide.
        // Assurez-vous d'avoir configuré la déconnexion dans security.yaml.
    }

    #[ Route("/fraisV", name:"fraisV")] // Route principale pour la page d'accueil
     
    public function indexFraisV(): Response
    {
        // Affiche la vue Twig associée à la page d'accueil
        return $this->render('page/fraisV.html.twig', [
            'controller_name' => 'HomeController',
        ]);
        // Symfony gère automatiquement la déconnexion via le firewall, cette méthode peut être vide.
        // Assurez-vous d'avoir configuré la déconnexion dans security.yaml.
    }

    #[ Route("/fraisR", name:"fraisR")] // Route principale pour la page d'accueil
     
    public function indexFraisR(): Response
    {
        // Affiche la vue Twig associée à la page d'accueil
        return $this->render('page/fraisR.html.twig', [
            'controller_name' => 'HomeController',
        ]);
        // Symfony gère automatiquement la déconnexion via le firewall, cette méthode peut être vide.
        // Assurez-vous d'avoir configuré la déconnexion dans security.yaml.
    }
}
