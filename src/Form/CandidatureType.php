<?php

namespace App\Form;

use App\Entity\Postulant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\File;
// use Misd\PhoneNumberBundle\Form\Type\PhoneNumberType;

class CandidatureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('nom', TextType::class, [
                'label' => 'NOM',
                'constraints' => new Length(30, 2),
                'attr' => [
                    'placeholder' => 'Merci de saisir votre nom'
                ]
            ])
            ->add('prenom', TextType::class, [
                'label' => 'PRÉNOM',
                'constraints' => new Length(30, 2),
                'attr' => [
                    'placeholder' => 'Merci de saisir votre prénom'
                ]
            ])
            ->add('telephone', NumberType::class, [
                'label' => 'NUMÉRO DE TÉLÉPHONE',
                //array('default_region' => 'FR', 'format' => PhoneNumberFormat::INTERNATIONAL),
                'attr' => [
                    'placeholder' => 'Merci de saisir votre numéro de téléphone '
                ]

            ])
            ->add('mail', EmailType::class, [
                'label' => 'ADRESSE E-MAIL',
                'constraints' => new Length(60, 2),
                'attr' => [
                    'placeholder' => 'Merci de saisir votre adresse email'
                ]
            ])
            ->add('cv', FileType::class, [
                'required' => false,
                'mapped' => false,
                'constraints' => [
                    new File(['maxSize' => '1024k',
                    'mimeTypes' => ['application/pdf', 'application/x-pdf'],
                    'mimeTypesMessage' => 'Veuillez choisir un fichier au format PDF',
                    ])
                ],
            ])
            ->add('lm', FileType::class, [
                'required' => false,
                'mapped' => false,
                'constraints' => [
                    new File(['maxSize' => '1024k',
                    'mimeTypes' => ['application/pdf', 'application/x-pdf'],
                    'mimeTypesMessage' => 'Veuillez choisir un fichier au format PDF',
                    ])
                ],
            ])
            ->add('infoComp', TextareaType::class)
            // ->add('captcha', CheckboxType::class)
            ->add('envoyer', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Postulant::class,
        ]);
    }
}
