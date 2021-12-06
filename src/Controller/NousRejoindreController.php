<?php

namespace App\Controller;

use App\Entity\Offre;
use App\Form\CandidatureType;
use App\Entity\Postulant;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Exception;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;

class NousRejoindreController extends AbstractController
{
    #[Route('/nous_rejoindre', name: 'nous_rejoindre')]
    public function index(Request $request, string $fichierCv, string $fichierLm): Response
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

        $candidature=new Postulant();
        $form = $this->createForm(CandidatureType::class, $candidature);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if(!(strlen($form->get('telephone')->getViewData())==17)){
                throw new Exception('numéro de téléphone pas au format +33....');
            }
            $em = $this->getDoctrine()->getManager();

        if ($pdfCv = $form['cv']->getData()) {
            $filename = bin2hex(random_bytes(6)).'.'.$pdfCv->guessExtension();
            try {
                $pdfCv->move($fichierCv, $filename);
            } catch (FileException $e) {
                // unable to upload the photo, give up
            }
            $candidature->setCv($filename);
        }

        if ($pdfLm = $form['lm']->getData()) {
            $filename = bin2hex(random_bytes(6)).'.'.$pdfLm->guessExtension();
            try {
                $pdfLm->move($fichierLm, $filename);
            } catch (FileException $e) {
                // unable to upload the photo, give up
            }
            $candidature->setLm($filename);
        }

            $etat = $em->getRepository(Offre::class)->find(intval($_GET['id']));
            $candidature->setOffre($etat);
            $tel = $form->get('telephone')->getViewData();
            $candidature->setTelephone($tel);
            $em->persist($candidature);
            $em->flush();

            $this->addFlash('success', 'Votre demande a été envoyé !');
            return $this->redirectToRoute('liste_offres'); //redirection
        }

        return $this->render('nous_rejoindre/index.html.twig', [
            'offres' => $offres,
            'controller_name' => 'NousRejoindreController',
            'candidat_form' => $form->createView(),
        ]);
    }
}