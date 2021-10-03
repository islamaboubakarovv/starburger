<?php

namespace App\Controller\Admin;


use App\Entity\Article;
use App\Entity\Artisan;
use App\Entity\Client;
use App\Entity\Offre;
use App\Entity\Postulant;
use App\Entity\IllustrationArticle;
use App\Entity\Projet;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Techguys');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Articles', 'fas fa-list', Article::class);
        yield MenuItem::linkToCrud('Artisans', 'fas fa-list', Artisan::class);
        yield MenuItem::linkToCrud('Clients', 'fas fa-list', Client::class);
        yield MenuItem::linkToCrud('Offres', 'fas fa-list', Offre::class);
        yield MenuItem::linkToCrud('Postulants', 'fas fa-list', Postulant::class);
        yield MenuItem::linkToCrud('Projets', 'fas fa-list', Projet::class);
        yield MenuItem::linkToCrud('Images d\'articles', 'fas fa-list', IllustrationArticle::class);
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
