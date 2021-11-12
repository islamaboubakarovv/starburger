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
            $objet_devis = $dodge->getObjet();
            $description_devis = $dodge->getDescription();
            $message = (new Email())
            ->from(new Address('xsway41@gmail.com', 'ABC Legermain'))
                ->to('julienvercoutere@yahoo.fr')
                ->embed(fopen('images/logos/LogoArtisan.PNG', 'r'), 'logo')
                ->subject('Vous avez reçu une nouvelle demande de devis')
                ->text('Sender : ')
                ->html('<img src="cid:logo" width="130px">
                <p>Objet : '.dump($objet_devis).'</p>
                <p>Description de la demande : '.dump($description_devis).'</p>
                <table>
                    <tr>
                        <td>
                            <a href="http://127.0.0.1:8000/accueil"><button>Accéder au site</button></a>
                        <td>
                    </tr>
                </table>');
            $mailer->send($message);

            $this->addFlash('success', 'Votre devis a été envoyé !');
        }

        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
            'projet_form' => $form->createView(),
        ]);
    }
}
