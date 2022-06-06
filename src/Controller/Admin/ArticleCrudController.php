<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use Symfony\Component\Validator\Constraints\DateTime;


class ArticleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Article::class;
    }

    public function createEntity(string $entityFqcn)
    {
        $article = new Article();
        $user = $this->getUser();
        $id = $this->getUser()->getId();
        //dd(date('d-m-y H:i'));
        //$time = new \DateTime(date('d-m-y H:i'));
        //dd($time);
        //dd(date('d-m-y H:i'));
        $date = \DateTime::createFromFormat('d-m-y H:i',date('d-m-y H:i'));
        
        $article->setDatePubli($date);
        $article->setArtisan($user);

        return $article;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            IntegerField::new('importance'),
            TextField::new('titre'),
            TextareaField::new('contenu'),
            //DateField::new('datePubli')
            
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Liste des articles')
            ->setPageTitle('edit', 'Modification d\'un article')
            ->setPageTitle('new', 'Ajout d\'un article');
    }
}
