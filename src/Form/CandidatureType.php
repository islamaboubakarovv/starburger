<?php

namespace App\Form;

use App\Entity\Postulant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CandidatureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // ->add('offre')
            ->add('postulant')
            ->add('prenom')
            ->add('telephone')
            ->add('mail')
            ->add('objet')
            ->add('message')
            ->add('valider')

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Postulant::class,
        ]);
    }
}
