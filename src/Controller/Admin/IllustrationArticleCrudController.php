<?php

namespace App\Controller\Admin;

use App\Entity\IllustrationArticle;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use Vich\UploaderBundle\Form\Type\VichImageType; 

class IllustrationArticleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return IllustrationArticle::class;
    }

    public function configureFields(string $pageName): iterable
    {
        
        
        return [
            TextareaField::new('imageFile')->setFormType(VichImageType::class)
        ];
    }

}
