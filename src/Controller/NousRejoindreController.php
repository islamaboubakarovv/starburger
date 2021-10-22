<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NousRejoindreController extends AbstractController
{
    #[Route('/nous/rejoindre', name: 'nous_rejoindre')]
    public function index(): Response
    {
        return $this->render('nous_rejoindre/index.html.twig', [
            'controller_name' => 'NousRejoindreController',
        ]);
    }
}
