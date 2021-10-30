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

class ActualitésController extends AbstractController
{
    #[Route('/actualites', name: 'actualites')]
    public function index(Request $request, PaginatorInterface $paginator)
    {
        $em = $this->getDoctrine()->getManager();

        $appointmentsRepository = $em->getRepository(IllustrationArticle::class);

        $allAppointmentsQuery = $appointmentsRepository->createQueryBuilder('i')
            ->innerJoin(Article::class, 'a', Join::WITH, 'i.article = a.id')
            ->add('orderBy','a.importance DESC, a.datePubli DESC')
            ->getQuery();
            
        $articles = $paginator->paginate(
            $allAppointmentsQuery,
            $request->query->getInt('page', 1),
            5
        );
        
        return $this->render('actualités/index.html.twig', [
            'articles' => $articles
        ]);
    }
}
