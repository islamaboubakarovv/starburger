<?php

namespace App\Controller\Admin;

use App\Entity\Galerie;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class GalerieCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Galerie::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
