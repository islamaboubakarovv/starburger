<?php

namespace App\Controller;

use App\Form\RegisterType;
use App\Entity\Artisan;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Client;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/client", name="client")
     * @param AuthenticationUtils $authenticationUtils
     * @return Response
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }
    /**
     * @Route("/inscription", name="register")
     * @param Request $request
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @return Response
     */
    public function register(Request $request,UserPasswordEncoderInterface $encoder): Response
    {
    $user = new Client();
    $form = $this->createForm(RegisterType::class,$user);
        $form->handleRequest($request);
        if($form->isSubmitted()&&$form->isValid()){
            if(!(strlen($form->get('telephone')->getViewData())==17)){
                throw new Exception('numéro de téléphone pas au format +33....');
            }
            $tel=$form->get('telephone')->getViewData();
            $user->setPassword(
                $encoder->encodePassword(
                    $user,
                    $form->get('mdp')->getData()
                )
            );
            $user->setTelephone($tel);
            $entityManager=$this->getDoctrine()->getManager();

            $entityManager->persist($user);
            $entityManager->flush();
        }
        return $this->render('register/index.html.twig',[
            'form'=>$form->createView()
        ]);
    }


    /**
     * @Route("/deconnexion", name="app_logout")
     */
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
