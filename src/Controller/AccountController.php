<?php

namespace App\Controller;

use App\Entity\Projet;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccountController extends AbstractController
{
    #[Route('/compte', name: 'account')]
    public function index(): Response
    {
        $em = $this->getDoctrine()->getManager();

        $appointmentsRepository = $em->getRepository(Projet::class);

        $allAppointmentsQuery = $appointmentsRepository->createQueryBuilder('p')
            ->orderBy('p.id', 'DESC')
            ->setMaxResults(5)
            ->getQuery();

        $devis = $allAppointmentsQuery->getResult();
        return $this->render('account/index.html.twig', [
            'devis' => $devis
        ]);
    }
}
