<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuiController extends AbstractController
{
    #[Route('/qui', name: 'qui')]
    public function index(): Response
    {
        return $this->render('qui/index.html.twig', [
            'controller_name' => 'QuiController',
        ]);
    }
}
