<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OuvragesSpecController extends AbstractController
{
    #[Route('/ouvrages_spec', name: 'ouvrages_spec')]
    public function index(): Response
    {
        return $this->render('ouvrages_spec/index.html.twig', [
            'controller_name' => 'OuvragesSpecController',
        ]);
    }
}
