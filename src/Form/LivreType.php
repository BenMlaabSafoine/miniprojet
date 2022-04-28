<?php

namespace App\Form;

use App\Entity\Livre;
use App\Entity\Bibliotheque;
use App\Entity\Adherant;
use App\Entity\Emprunt;
use App\Entity\Reservation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class LivreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre')
            ->add('auteur')
            ->add('nbpages')
            ->add('prix')
            ->add('bibliotheque', EntityType::class, [
                // looks for choices from this entity
                'class' => Bibliotheque::class,
            
                // uses the User.username property as the visible option string
                'choice_label' => 'nom',
            
                // used to render a select box, check boxes or radios
                //'multiple' => true,
                // 'expanded' => true,
            ])
            ->add('emprunt', EntityType::class, [
                // looks for choices from this entity
                'class' => Emprunt::class,
            
                // uses the User.username property as the visible option string
                'choice_label' => 'nom',
            
                // used to render a select box, check boxes or radios
                //'multiple' => true,
                // 'expanded' => true,
            ])
            ->add('adherant', EntityType::class, [
                // looks for choices from this entity
                'class' => Adherant::class,
            
                // uses the User.username property as the visible option string
                'choice_label' => 'nom',
            
                // used to render a select box, check boxes or radios
                //'multiple' => true,
                // 'expanded' => true,
            ])
          
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Livre::class,
        ]);
    }
}
