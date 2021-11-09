<?php

namespace App\Controller;

use App\Entity\Offre;
use App\Form\CandidatureType;
use App\Entity\Postulant;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NousRejoindreController extends AbstractController
{
    #[Route('/nous_rejoindre', name: 'nous_rejoindre')]
    public function index(): Response
    {
        $em = $this->getDoctrine()->getManager();
      
        $appointmentsRepository = $em->getRepository(Offre::class);
                
        $allAppointmentsQuery = $appointmentsRepository->createQueryBuilder('o')
            ->where('o.id = :idart')
            ->setParameter('idart', $_GET['id'])
            ->getQuery();
        
        $offres = $allAppointmentsQuery->getResult();

        $candidature=new Postulant();
        $form = $this->createForm(CandidatureType::class, $candidature);
        return $this->render('nous_rejoindre/index.html.twig', [
            'offres' => $offres,
            'controller_name' => 'NousRejoindreController',
            'candidat_form' => $form->createView(),
        ]);
    }
}