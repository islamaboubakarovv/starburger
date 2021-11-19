<?php

namespace App\Form;

use App\Entity\Postulant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\File;

class CandidatureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class)
            ->add('prenom', TextType::class)
            ->add('telephone', NumberType::class)
            ->add('mail', EmailType::class)
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
