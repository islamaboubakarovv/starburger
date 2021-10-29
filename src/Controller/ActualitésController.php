<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Twig\Environment;

class ActualitésController extends AbstractController
{
    #[Route('/actualites', name: 'actualites')]
    public function index(Request $request, PaginatorInterface $paginator)
    {
        // Retrieve the entity manager of Doctrine
        $em = $this->getDoctrine()->getManager();
        
        // Get some repository of data, in our case we have an Appointments entity
        $appointmentsRepository = $em->getRepository(Article::class);
                
        // Find all the data on the Appointments table, filter your query as you need
        $allAppointmentsQuery = $appointmentsRepository->createQueryBuilder('a')
            ->where('a.titre != :titre')
            ->setParameter('titre', 'canceled')
            ->add('orderBy','a.importance DESC, a.datePubli DESC')
            ->getQuery();
        
        // Paginate the results of the query
        $articles = $paginator->paginate(
            // Doctrine Query, not results
            $allAppointmentsQuery,
            // Define the page parameter
            $request->query->getInt('page', 1),
            // Items per page
            5
        );
        
        // Render the twig view
        return $this->render('actualités/index.html.twig', [
            'articles' => $articles
        ]);
    }
}
