<?php

namespace App\Controller\Admin;

use App\Entity\Projet;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;

class ProjetCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Projet::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('objet','Objet')->setFormTypeOption('disabled','disabled'),
            TextAreaField::new('description','Description')->setFormTypeOption('disabled','disabled')->hideOnIndex(),
            BooleanField::new('estRecontacte','Est Recontacté')->setColumns(2)
        ];
    }
    
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Liste des projets')
            ->setPageTitle('edit', 'Détail du projet');
    }

    public function configureActions(Actions $actions): Actions
    {

        return $actions
            ->disable(Action::NEW)
            ->disable(Action::DELETE)
        ;
    }
}
