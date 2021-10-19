<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ActualitésController extends AbstractController
{
    #[Route('/actualites', name: 'actualites')]
    public function index(): Response
    {
        return $this->render('actualités/index.html.twig', [
            'controller_name' => 'ActualitésController',
        ]);
    }
}
