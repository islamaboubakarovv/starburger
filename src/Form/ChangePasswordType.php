<?php

namespace App\Form;

use App\Entity\Client;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Misd\PhoneNumberBundle\Form\Type\PhoneNumberType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\Length;
 

class ChangePasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('mail',EmailType::class,[
                'disabled'=>true,
                'label'=>'Mon adresse email'
            ])
            ->add('old_password',PasswordType::class,[
                'label'=>'Mon mot de passe actuel',
                'mapped'=>false,
                'attr'=>[
                    'placeholder'=>'Veuillez saisir votre mot de passe actuel'
                ]
            ])
            ->add('prenom',TextType::class,[
                'disabled'=>true,
                'label'=>'Mon prénom'
            ])
            ->add('nom',TextType::class,[
                'disabled'=>true,
                'label'=>'Mon nom'

            ])
            ->add('new_password',RepeatedType::class,[
                'type'=>PasswordType::class,
                'constraints' => new Length(20, 2),
                'mapped'=>false,
                'invalid_message'=>'Le mot de passe et la confirmation doivent être identiques',
                'label'=>'Mon nouveau mot de passe',
                'required'=>true,
                'first_options'=>['label'=>'Mon nouveau mot de passe',
                'attr'=>[
                    'placeholder'=>'Merci de saisir votre mot de passe'
                ]],
                'second_options'=>['label'=>'Confirmez votre nouveau mot de passe',
                'attr'=>[
                    'placeholder'=>'Merci de confirmer votre nouveau mot de passe'
                ]]

            ])
            ->add('new_mail',EmailType::class,[
                'mapped'=>false,
                'constraints' => new Length(60, 2),
                'label'=>'Nouvelle adresse mail'
                
            ])
            ->add('new_prenom',TextType::class,[
                'mapped'=>false,
                'constraints' => new Length(30, 2),
                'label'=>'Nouveau prénom'
            ])
            ->add('new_nom',TextType::class,[
                'mapped'=>false,
                'constraints' => new Length(30, 2),
                'label'=>'Nouveau nom'

            ])
            ->add('new_tel', PhoneNumberType::class, [
                'mapped'=>false,
                'label' => 'Nouveau numéro de tel',
                //array('default_region' => 'FR', 'format' => PhoneNumberFormat::INTERNATIONAL),
                'attr' => [
                    'placeholder' => 'Merci de saisir votre numéro de téléphone au format : "+code"+"numéro" '
                ]

            ])
            ->add('new_adresse', null, [
                'mapped'=>false,
                'label' => 'Nouvelle adresse',
                'attr' => [
                    'placeholder' => 'Merci de saisir votre adresse'
                ]

            ])
            ->add('new_ville', null, [
                'mapped'=>false,
                'label' => 'Nouvelle ville',
                'attr' => [
                    'placeholder' => 'Merci de saisir votre ville'

                ]
            ])
            ->add('new_cp', TextType::class, [
                'mapped'=>false,
                'label' => 'Nouveau code postal',
                //contrainte regex pour CP FR 
                'constraints' => [
                    new NotBlank(),
                    new Regex('~^[0-9]{5}$~') //contrainte regex
                ],
                //'input'=>'number',
                'attr' => [
                    'placeholder' => 'Merci de saisir votre code postal'
                ]
            ])
            
            ->add('submit',SubmitType::class,[
                'label'=>"Mettre à jour"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}
