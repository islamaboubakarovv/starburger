<?php

namespace App\Controller;

use App\Entity\Projet;
use App\Form\DemandeProjetType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'contact')]
    public function index(): Response
    {
        $projet = new Projet();
        $form = $this->createForm(DemandeProjetType::class, $projet);

        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
            'projet_form' => $form->createView(),
        ]);
    }
}
