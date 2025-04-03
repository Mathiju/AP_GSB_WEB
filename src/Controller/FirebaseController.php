<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class FirebaseController extends AbstractController
{
    #[Route('/api/setSession', methods: ['POST'])]
    public function setSession(Request $request, SessionInterface $session): JsonResponse
    {
        // Lire les données envoyées depuis JavaScript
        $data = json_decode($request->getContent(), true);

        if (isset($data['uid'])) {
            // Enregistrer l'UID Firebase dans la session Symfony
            $session->set('uid', $data['uid']);
            
            return new JsonResponse(['status' => 'Session mise à jour avec UID: ' . $data['uid']]);
        }

        return new JsonResponse(['error' => 'Données invalides'], 400);
    }

    #[Route('/api/getSession', methods: ['GET'])]
    public function getSession(SessionInterface $session): JsonResponse
    {
        // Vérifier si l'utilisateur est connecté
        $uid = $session->get('uid');

        if ($uid) {
            return new JsonResponse(['uid' => $uid]);
        }

        return new JsonResponse(['error' => 'Utilisateur non connecté'], 401);
    }
}
