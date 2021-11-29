<?php

namespace App\Controller\Admin;

use App\Entity\Postulant;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use Vich\UploaderBundle\Form\Type\VichFileType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;

class PostulantCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Postulant::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('nom','Nom')->setFormTypeOption('disabled','disabled'),
            TextField::new('prenom','Prénom')->setFormTypeOption('disabled','disabled'),
            EmailField::new('mail','E-mail')->setFormTypeOption('disabled','disabled'),
            TextField::new('telephone','Téléphone')->setFormTypeOption('disabled','disabled'),
            TextareaField::new('cvFile','CV')->setFormType(VichFileType::class)->setFormTypeOption('disabled','disabled'),
            TextareaField::new('lmFile','Lettre de motivation')->setFormType(VichFileType::class)->setFormTypeOption('disabled','disabled'),
            TextAreaField::new('info_comp','Informations complémentaires')->setFormTypeOption('disabled','disabled')->hideOnIndex()

        ];
    }
    
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Liste des candidatures')
            ->setPageTitle('edit', 'Détail de la candidature');
    }

    public function configureActions(Actions $actions): Actions
    {

        return $actions
            ->disable(Action::NEW)
            ->disable(Action::DELETE)
        ;
    }
}
