<?php

namespace App\Controller;

use App\Entity\Projet;
use App\Form\DemandeProjetType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\MailerInterface;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'contact')]
    public function index(Request $request, MailerInterface $mailer): Response
    {
        $projet = new Projet();
        $form = $this->createForm(DemandeProjetType::class, $projet);
        
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $projet->setestRecontacte(0);
            
            $em->persist($projet);
            $em->flush();

            $message = (new Email())
                ->from('julienvercoutere@yahoo.fr')
                ->to('xsway41@gmail.com')
                ->subject('vous avez reçu un email')
                ->text('Sender : ')
                ->html('<p>See Twig integration for better HTML integration!</p>');
            $mailer->send($message);

            $this->addFlash('success', 'Votre devis a été envoyé !');
        }

        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
            'projet_form' => $form->createView(),
        ]);
    }
}
