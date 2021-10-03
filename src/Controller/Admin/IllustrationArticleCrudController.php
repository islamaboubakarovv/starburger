<?php

namespace App\Controller\Admin;

use App\Entity\IllustrationArticle;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class IllustrationArticleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return IllustrationArticle::class;
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
