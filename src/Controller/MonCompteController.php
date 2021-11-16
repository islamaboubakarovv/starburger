<?php

namespace App\Controller;

use App\Entity\Projet;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class MonCompteController extends AbstractController
{
    #[Route('/mon_compte', name: 'mon_compte')]
    public function index(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
      
        $appointmentsRepository = $em->getRepository(Projet::class);
                
        $allAppointmentsQuery = $appointmentsRepository->createQueryBuilder('p')
            ->orderBy('p.id', 'DESC')
            ->setMaxResults(5)
            ->getQuery();
        
        $devis = $allAppointmentsQuery->getResult();

        return $this->render('mon_compte/index.html.twig', [
            'devis' => $devis
        ]);
    }
}
