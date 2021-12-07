<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use JeroenDesloovere\VCard\VCard;

class ClientController extends AbstractController
{
    #[Route('/clientt', name: 'clientt')]
    public function index(): Response
    {
        $vcard = new VCard();

        $lastname = 'Desloovere';
        $firstname = 'Jeroen';
        $additional = '';
        $prefix = '';
        $suffix = '';

        $vcard->addName($lastname, $firstname, $additional, $prefix, $suffix);

        $vcard->addCompany('Siesqo');
        $vcard->addJobtitle('Web Developer');
        $vcard->addRole('Data Protection Officer');
        $vcard->addEmail('info@jeroendesloovere.be');
        $vcard->addPhoneNumber(1234121212, 'PREF;WORK');
        $vcard->addPhoneNumber(123456789, 'WORK');
        $vcard->addAddress(null, null, 'street', 'worktown', null, 'workpostcode', 'Belgium');
        $vcard->addLabel('street, worktown, workpostcode Belgium');
        $vcard->addURL('http://www.jeroendesloovere.be');

        $vcard->addPhoto('images/logos/LogoArtisan.PNG');

        return $this->render('client/index.html.twig', [
            'controller_name' => 'ClientController',
            $vcard->download(),
        ]);
    }
}
