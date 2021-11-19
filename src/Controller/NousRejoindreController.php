<?php

namespace App\Controller;

use App\Form\CandidatureType;
use App\Entity\Postulant;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;



class NousRejoindreController extends AbstractController
{
    #[Route('/nous_rejoindre', name: 'nous_rejoindre')]
    public function index(Request $request, string $fichierCv, string $fichierLm): Response
    {
        $candidature=new Postulant();
        $form = $this->createForm(CandidatureType::class, $candidature);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
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

            $em->persist($candidature);
            $em->flush();

            $this->addFlash('success', 'Votre demande a été envoyé !');
        }

        return $this->render('nous_rejoindre/index.html.twig', [
            'controller_name' => 'NousRejoindreController',
            'candidat_form' => $form->createView(),
        ]);
    }
}