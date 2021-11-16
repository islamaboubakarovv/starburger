<?php

namespace App\Controller;


use Symfony\Component\HttpFoundation\Request;
use App\Entity\Client;
use App\Form\RegisterType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegisterController extends AbstractController
{
    /*
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager){
        $this->entityManager=$entityManager;
    }
    */
    #[Route('/inscription', name: 'register')]
    public function index(Request $request,UserPasswordEncoderInterface $encoder): Response
    {
        $user = new Client();
        $form = $this->createForm(RegisterType::class,$user);
        $form->handleRequest($request);
        if($form->isSubmitted()&&$form->isValid()){
            /*
            $user=$form->getData();
            $password=$encoder->encodePassword($user,$user->getPassword());
            $user->setPassword($password);
            */
            $user->setPassword(
                $encoder->encodePassword(
                    $user,
                    $form->get('mdp')->getData()
                )
            );
            $entityManager=$this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
        }
        return $this->render('register/index.html.twig',[
            'form'=>$form->createView()
        ]);
    }
}
