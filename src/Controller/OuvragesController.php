<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OuvragesController extends AbstractController
{
    #[Route('/ouvrages', name: 'ouvrages')]
    public function index(): Response
    {
        return $this->render('ouvrages/index.html.twig', [
            'controller_name' => 'OuvragesController',
        ]);
    }
}
