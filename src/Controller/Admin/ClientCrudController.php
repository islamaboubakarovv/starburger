<?php

namespace App\Controller\Admin;

use App\Entity\Client;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;

class ClientCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Client::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('prenom','Prénom'),
            TextField::new('nom','Nom'),
            EmailField::new('mail','E-mail'),
            TextField::new('telephone','Téléphone'),
            TextField::new('adresse','Adresse'),
            TextField::new('ville','Ville'),
            TextField::new('code_postal','Code Postal'),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Liste des clients');
    }

    public function configureAssets(Assets $assets): Assets
    {
        return $assets
            ->addHtmlContentToBody('<a href="/client">Exporter les données</a>')
        ;
    }

    public function configureActions(Actions $actions): Actions
    {

        $getVCard = Action::new('getVCard', 'Exporter les données', 'fa fa-user')
            ->linkToRoute('client', function(Client $entity){
                return [
                    'id' => $entity->getId()
                ];
            })
        ;

        return $actions
            ->disable(Action::DELETE)
            ->add(Crud::PAGE_EDIT, $getVCard)
        ;
    }

    public function getVCard(Request $request) {
        $id = $request->query->get('id');
        var_dump($id);
        return $this->redirectToRoute('admin', [
            'crudAction' => 'index',
            'entity' => $request->query->get('entity')
        ]);
    }

}
