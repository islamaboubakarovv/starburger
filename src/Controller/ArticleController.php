<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class ArticleController extends AbstractController
{
    #[Route('/article', name: 'article')]
    public function index(Environment $twig, ArticleRepository $articleRepository): Response
     {
        return new Response($twig->render('article/index.html.twig', [
            'articles' => $articleRepository->find($_GET['id']),
            ]));
    }
}
