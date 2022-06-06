<?php

namespace App\Controller;

use App\Entity\Projet;
use App\Entity\Client;
use App\Form\DemandeProjetType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Security\Core\Security;


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
            
            $userId = $this->getUser()->getId();

            $utilisateur = $em->getRepository(Client::class)->find(intval($userId));

            $projet->setestRecontacte(0);
            $projet->setClient($utilisateur);
            
            $em->persist($projet);
            $em->flush();

            $contentform = $form->getData();
            $message = (new TemplatedEmail())
            ->from(new Address('starburger37@outlook.fr', 'Star Burger and Steaks'))
                ->to('chabazovtanzila@gmail.com')
                ->subject('Vous avez reçu une nouvelle demande de devis')
                ->htmlTemplate('mail_devis/index.html.twig')
                ->context([
                    'description_devis' => $contentform->getDescription(),
                    'objet_devis' => $contentform->getObjet(),
                    'client_prenom' => $this->getUser()->getPrenom(),
                    'client_nom' => $this->getUser()->getNom(),
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
