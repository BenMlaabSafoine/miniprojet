<?php

namespace App\Form;

use App\Entity\Reservation;
use App\Entity\Adherant;
use App\Entity\Emprunt;
use App\Entity\Livre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('datedebut')
            ->add('datefin')
            ->add('livres', EntityType::class, [
                // looks for choices from this entity
                'class' => Livre::class,
            
                // uses the User.username property as the visible option string
                'choice_label' => 'titre',
                //'required' => true,
                // used to render a select box, check boxes or radios
                'multiple' => true,
                // 'expanded' => true,
            ])
            ->add('adherants', EntityType::class, [
                // looks for choices from this entity
                'class' => Adherant::class,
            
                // uses the User.username property as the visible option string
                'choice_label' => 'nom',
                //'required' => true,
                // used to render a select box, check boxes or radios
                'multiple' => true,
                // 'expanded' => true,
            ])
            ->add('emprunts', EntityType::class, [
                // looks for choices from this entity
                'class' => Emprunt::class,
            
                // uses the User.username property as the visible option string
                'choice_label' => 'nom',
                //'required' => true,
                // used to render a select box, check boxes or radios
                'multiple' => true,
                // 'expanded' => true,
            ])
           
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
