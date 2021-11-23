<?php

namespace App\Form;

use App\Entity\Client;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use libphonenumber\PhoneNumber;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
//use libphonenumber\PhoneNumberFormat;
//use libphonenumber\PhoneNumberType as LibphonenumberPhoneNumberType;
use Misd\PhoneNumberBundle\Form\Type\PhoneNumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;


class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('prenom',TextType::class,[
                'label'=>'Votre prénom',
                'constraints'=>new Length(30,2),
                'attr'=>[
                    'placeholder'=>'Merci de saisir votre prénom'
                ]
            ])
            ->add('nom',TextType::class,[
                'label'=>'Votre nom',
                'constraints'=>new Length(30,2),
                'attr'=>[
                    'placeholder'=>'Merci de saisir votre nom'
                ]
            ])
            ->add('mail',EmailType::class,[
                'label'=>'Votre email',
                'constraints'=>new Length(60,2),
                'attr'=>[
                    'placeholder'=>'Merci de saisir votre adresse email'
                ]
            ])
            ->add('mdp',RepeatedType::class,[
                'type'=>PasswordType::class,
                'constraints'=>new Length(20,2),
                'mapped'=>true,
                'invalid_message'=>'Le mot de passe et la confirmation doivent être identiques',
                'label'=>'Votre mot de passe',
                'required'=>true,
                'first_options'=>['label'=>'Mot de passe',
                'attr'=>[
                    'placeholder'=>'Merci de saisir votre mot de passe'
                ]
                ],
                'second_options'=>['label'=>'Confirmez votre mot de passe',
                'attr'=>[
                    'placeholder'=>'Merci de confirmer votre mot de passe'
                ]]
            ])
            ->add('telephone',PhoneNumberType::class,[
                'label'=>'Votre numéro de téléphone',
                //array('default_region' => 'FR', 'format' => PhoneNumberFormat::INTERNATIONAL),
                'attr'=>[
                    'placeholder'=>'Merci de saisir votre numéro de téléphone au format : "+code"+"numéro" '
                ]
                
            ])
            ->add('adresse',null,[
                'label'=>'Votre adresse',
                'attr'=>[
                    'placeholder'=>'Merci de saisir votre adresse'
                ]

            ])
            ->add('ville',null,[
                'label'=>'Votre ville',
                'attr'=>[
                    'placeholder'=>'Merci de saisir votre ville'

                ]
            ])
            ->add('codePostal',TextType::class,[
                'label'=>'Votre code postal',
                //contrainte regex pour CP FR 
                'constraints'=>[
                    new NotBlank(),
                    new Regex('~^[0-9]{5}$~')//contrainte regex

                ],
                //'input'=>'number',
                'attr'=>[
                    'placeholder'=>'Merci de saisir votre code postal'
                ]
            ])
            ->add('submit',SubmitType::class,[
                'label'=>"S'inscrire"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
            'csrf_protection'=>true
        ]);
    }
}
