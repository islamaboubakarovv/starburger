<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use App\Entity\Article;
use App\Entity\IllustrationArticle;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\Query\Expr\Join;
use Twig\Environment;

class ArticleController extends AbstractController
{
    #[Route('/article', name: 'article')]
    public function index(Request $request, PaginatorInterface $paginator)
    {
        $em = $this->getDoctrine()->getManager();
      
        $appointmentsRepository = $em->getRepository(IllustrationArticle::class);
                
        $allAppointmentsQuery = $appointmentsRepository->createQueryBuilder('i')
            ->innerJoin(Article::class, 'a', Join::WITH, 'i.article = a.id')
            ->where('a.id = :idart')
            ->setParameter('idart', $_GET['id'])
            ->getQuery();
        
        $articles = $allAppointmentsQuery->getResult();

        return $this->render('article/index.html.twig', [
            'articles' => $articles
        ]);
    }
}
