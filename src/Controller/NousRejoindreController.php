<?php

namespace App\Controller;

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
        $candidature=new Postulant();
        $form = $this->createForm(CandidatureType::class, $candidature);
        return $this->render('nous_rejoindre/index.html.twig', [
            'controller_name' => 'NousRejoindreController',
            'candidat_form' => $form->createView(),
        ]);
    }
}
