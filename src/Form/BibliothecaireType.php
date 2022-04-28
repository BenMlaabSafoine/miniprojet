<?php

namespace App\Form;

use App\Entity\Bibliothecaire;
use App\Entity\Bibliotheque;
use App\Entity\Emprunt;
use App\Entity\Adherant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class BibliothecaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('adresse')
            ->add('numtel')
            ->add('bibliotheque', EntityType::class, [
                // looks for choices from this entity
                'class' => Bibliotheque::class,
            
                // uses the User.username property as the visible option string
                'choice_label' => 'nom',
                //'required' => true,
                // used to render a select box, check boxes or radios
                //'multiple' => true,
                // 'expanded' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Bibliothecaire::class,
        ]);
    }
}
