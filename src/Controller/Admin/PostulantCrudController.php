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
            TextField::new('nom','Nom'),
            TextField::new('prenom','Prénom'),
            EmailField::new('mail','E-mail'),
            TextField::new('telephone','Téléphone'),
            TextareaField::new('cvFile','CV')->setFormType(VichFileType::class),
            TextareaField::new('lmFile','Lettre de motivation')->setFormType(VichFileType::class),
            TextAreaField::new('info_comp','Informations complémentaires')
        ];
    }
    
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Liste des candidatures')
            ->setPageTitle('edit', 'Détail de la candidature');
    }
}
