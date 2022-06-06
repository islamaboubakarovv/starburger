<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Galerie;
use App\Entity\Image;
use Doctrine\ORM\Query\Expr\Join;

class AccueilController extends AbstractController
{
    #[Route('', name: 'accueil')]
    public function index(): Response
    {
        $em = $this->getDoctrine()->getManager();

        $appointmentsRepository = $em->getRepository(Image::class);

        $carousel = $appointmentsRepository->createQueryBuilder('i')
            ->innerJoin(Galerie::class, 'g', Join::WITH, 'i.galerie=g.id')
            ->where('g.nom=\'carousel_accueil\'')
            ->getQuery()
            ->getResult();

        $galerie = $appointmentsRepository->createQueryBuilder('i')
            ->innerJoin(Galerie::class, 'g', Join::WITH, 'i.galerie=g.id')
            ->where('g.nom=\'galerie_accueil\'')
            ->getQuery()
            ->getResult();
        //dd($carousel);

        return $this->render('accueil/index.html.twig', [
            'carousel' => $carousel,
            'galerie' => $galerie
        ]);
    }
}   
