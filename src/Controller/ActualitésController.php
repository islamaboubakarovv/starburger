<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class ActualitésController extends AbstractController
{
    #[Route('/actualites', name: 'actualites')]
    public function index(Environment $twig, ArticleRepository $articleRepository): Response
     {
        return new Response($twig->render('actualités/index.html.twig', [
            'articles' => $articleRepository->findBy([], ['importance' => 'DESC', 'datePubli' => 'DESC']),
            ]));
    }
}
