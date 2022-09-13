<?php

namespace App\Form;

use App\Entity\Personne;
use App\Entity\MissionOrder;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class MissionOrderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lieu')
            ->add('motif')
            ->add('numVehicule')
            ->add('nomChauffeur')
            ->add('date', DateType::class, [
                'widget' => 'single_text',
                'html5' => 'true',
            ])
            ->add('dateDepart', DateType::class, [
                'widget' => 'single_text',
                'html5' => 'true',
            ])
            ->add('dateRetour', DateType::class, [
                'widget' => 'single_text',
                'html5' => 'true',
            ])
            ->add('numMissionOrder')
            
            ->add('nomChef', EntityType::class, [
                'class' => Personne::class,
                'placeholder' => 'Choisissez la caisse' 
            ])
            ->add('passager', EntityType::class, [
                'class' => Personne::class,
                'multiple' => true,
                'expanded' => true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => MissionOrder::class,
        ]);
    }
}
