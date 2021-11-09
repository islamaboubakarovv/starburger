<?php

namespace App\Controller;

use App\Entity\Offre;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ListeOffresController extends AbstractController
{
    #[Route('/liste_offres', name: 'liste_offres')]
    public function index(Request $request, PaginatorInterface $paginator)
    {
        $em = $this->getDoctrine()->getManager();

        $appointmentsRepository = $em->getRepository(Offre::class);

        $allAppointmentsQuery = $appointmentsRepository->createQueryBuilder('i')
            ->getQuery();
            
        $offres = $paginator->paginate(
            $allAppointmentsQuery,
            $request->query->getInt('page', 1),
            5
        );
        
        return $this->render('liste_offres/index.html.twig', [
            'offres' => $offres
        ]);
    }
}
