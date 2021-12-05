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
                'label' => 'Nom',
                'constraints' => new Length(30, 2),
                'attr' => [
                ]
            ])
            ->add('prenom', TextType::class, [
                'label' => 'Prénom',
                'constraints' => new Length(30, 2),
                'attr' => [
                ]
            ])
            ->add('telephone', NumberType::class, [
                'label' => 'Numéro de téléphone',
                //array('default_region' => 'FR', 'format' => PhoneNumberFormat::INTERNATIONAL),
                'attr' => [
                ]

            ])
            ->add('mail', EmailType::class, [
                'label' => 'Email',
                'constraints' => new Length(60, 2),
                'attr' => [
                ]
            ])
            ->add('cv', FileType::class, [
                'label' => 'Votre CV',
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
                'label' => 'Votre lettre de motivation',
                'required' => false,
                'mapped' => false,
                'constraints' => [
                    new File(['maxSize' => '1024k',
                    'mimeTypes' => ['application/pdf', 'application/x-pdf'],
                    'mimeTypesMessage' => 'Veuillez choisir un fichier au format PDF',
                    ])
                ],
            ])
            ->add('infoComp', TextareaType::class, [
                "label" => "Infos complémentaires"
            ])
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
