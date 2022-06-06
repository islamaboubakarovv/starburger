<?php

namespace App\Controller\Admin;

use App\Entity\Artisan;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;

class ArtisanCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Artisan::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('prenom','Prénom'),
            TextField::new('nom','Nom'),
            EmailField::new('mail','E-mail'),
            TextField::new('mdp','Mot de passe')->onlyWhenCreating(),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Liste des artisans')
            ->setPageTitle('edit', 'Modification d\'un artisan')
            ->setPageTitle('new', 'Ajout d\'un artisan');
    }
}
