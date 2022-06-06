<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CharpenteController extends AbstractController
{
    #[Route('/charpente', name: 'charpente')]
    public function index(): Response
    {
        return $this->render('charpente/index.html.twig', [
            'controller_name' => 'CharpenteController',
        ]);
    }
}
