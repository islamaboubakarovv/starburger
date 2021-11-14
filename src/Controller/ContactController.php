<?php

namespace App\Controller;

use App\Entity\Projet;
use App\Form\DemandeProjetType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;


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

            $dodge = $form->getData();
            $message = (new TemplatedEmail())
            ->from(new Address('xsway41@gmail.com', 'ABC Legermain'))
                ->to('julienvercoutere@yahoo.fr')
                ->subject('Vous avez reçu une nouvelle demande de devis')
                ->htmlTemplate('mail_devis/index.html.twig')
                ->context([
                    'description_devis' => $dodge->getDescription(),
                    'objet_devis' => $dodge->getObjet(),
                ]);
            $mailer->send($message);

            $this->addFlash('success', 'Votre devis a été envoyé !');
        }

        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
            'projet_form' => $form->createView(),
        ]);
    }
}
