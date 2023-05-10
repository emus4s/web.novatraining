<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WebController extends AbstractController
{
    #[Route('/', name: 'app_web')]
    public function index(): Response
    {
        return $this->render('web/index.html.twig', [
            'controller_name' => 'WebController',
        ]);
    }

    #[Route('/primary', name: 'app_web_primary')]
    public function primary(): Response
    {
        return $this->render('web/primary.html.twig', [
            'controller_name' => 'WebController',
        ]);
    }

    #[Route('/secondary', name: 'app_web_secondary')]
    public function secondary(): Response
    {
        return $this->render('web/secondary.html.twig', [
            'controller_name' => 'WebController',
        ]);
    }
}
